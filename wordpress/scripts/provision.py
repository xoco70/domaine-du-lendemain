#!/usr/bin/env python3
"""Provisioning du site WordPress « Domaine du Lendemain » (vins biodynamiques).

Idempotent. Via l'API REST, le script :
  1. installe + active Contact Form 7 (si nécessaire) ;
  2. crée / met à jour le formulaire de contact (français) ;
  3. crée les pages (accueil, visites, mentions légales, RGPD) ;
  4. règle la page d'accueil statique + l'option ddl_cf7_id + titre du site ;
  5. crée le menu principal et l'assigne à l'emplacement « primary ».

Usage :
    export WP_SITE_URL="https://dev.johe6239.odns.fr"
    export WP_USER="johe6239"
    export WP_APP_PASSWORD="xxxx xxxx xxxx xxxx xxxx xxxx"
    python3 provision.py [--dry-run]

NB : le thème « Domaine du Lendemain » doit être installé et activé pour que
le template de la page Visites et l'option ddl_cf7_id soient pris en compte.
Le script est rejouable : relancez-le après activation du thème.
"""

import sys
from urllib.parse import urlparse

from wp_api import WPClient
import content

DRY_RUN = "--dry-run" in sys.argv
THEME_SLUG = "domaine-du-lendemain"


def log(msg):
    print(msg, flush=True)


# --------------------------------------------------------------------------
# Contact Form 7
# --------------------------------------------------------------------------
def ensure_cf7(wp):
    status, plugins = wp.get("/wp/v2/plugins")
    cf7 = None
    if isinstance(plugins, list):
        cf7 = next((p for p in plugins if str(p.get("plugin", "")).startswith("contact-form-7/")), None)

    if cf7 and cf7.get("status") == "active":
        log("✅ Contact Form 7 déjà actif.")
        return True
    if DRY_RUN:
        log("· [dry-run] installerait/activerait Contact Form 7.")
        return True

    log("→ Installation / activation de Contact Form 7…")
    status, body = wp.post("/wp/v2/plugins", {"slug": "contact-form-7", "status": "active"})
    if status in (200, 201):
        log("✅ Contact Form 7 installé et activé.")
        return True
    if cf7:
        status, body = wp.put(f"/wp/v2/plugins/{cf7['plugin']}", {"status": "active"})
        if status == 200:
            log("✅ Contact Form 7 activé.")
            return True
    log(f"⚠️  Échec installation/activation CF7 (HTTP {status}) : {body}")
    return False


def cf7_properties(recipient, site_host):
    form = (
        '<div class="space-y-4">\n'
        '[text* votre-nom autocomplete:name placeholder "Votre nom"]\n'
        '[email* votre-email autocomplete:email placeholder "Votre email"]\n'
        '[text votre-sujet placeholder "Sujet"]\n'
        '[textarea votre-message x4 placeholder "Votre message"]\n'
        '[submit "Envoyer"]\n'
        '</div>'
    )
    mail = {
        "active": True,
        "subject": "[_site_title] — Message de [votre-nom]",
        "sender": f"[_site_title] <wordpress@{site_host}>",
        "recipient": recipient,
        "additional_headers": "Reply-To: [votre-email]",
        "body": (
            "Nouveau message depuis le site du Domaine du Lendemain.\n\n"
            "Nom : [votre-nom]\n"
            "Email : [votre-email]\n"
            "Sujet : [votre-sujet]\n\n"
            "Message :\n[votre-message]\n\n"
            "-- \nEnvoyé depuis [_site_title] ([_site_url])"
        ),
        "attachments": "",
        "use_html": False,
        "exclude_blank": False,
    }
    mail_2 = {
        "active": False, "subject": "", "sender": "", "recipient": "",
        "additional_headers": "", "body": "", "attachments": "",
        "use_html": False, "exclude_blank": False,
    }
    messages = {
        "mail_sent_ok": "Merci, votre message a bien été envoyé.",
        "mail_sent_ng": "Une erreur s'est produite. Veuillez réessayer plus tard.",
        "validation_error": "Une ou plusieurs saisies sont erronées. Merci de vérifier.",
        "spam": "Une erreur s'est produite. Veuillez réessayer plus tard.",
        "invalid_required": "Ce champ est obligatoire.",
        "invalid_email": "L'adresse email n'est pas valide.",
    }
    return {"form": form, "mail": mail, "mail_2": mail_2, "messages": messages,
            "additional_settings": ""}


def ensure_contact_form(wp, recipient, site_host):
    title = "Formulaire de contact — Domaine du Lendemain"
    status, forms = wp.get("/contact-form-7/v1/contact-forms")
    if status != 200:
        log(f"ℹ️  Endpoint CF7 indisponible (HTTP {status}). Le formulaire sera à "
            "créer une fois CF7 actif (relancez le script).")
        return 0

    existing = None
    if isinstance(forms, list):
        existing = next((f for f in forms if f.get("title") == title), None)

    payload = {
        "title": title,
        "locale": "fr_FR",
        "status": "publish",
        "properties": cf7_properties(recipient, site_host),
    }
    if DRY_RUN:
        log(f"· [dry-run] créerait/mettrait à jour le formulaire CF7 « {title} ».")
        return existing.get("id") if existing else 0

    if existing:
        fid = existing.get("id")
        wp.post(f"/contact-form-7/v1/contact-forms/{fid}", payload)
        log(f"✅ Formulaire CF7 mis à jour (id {fid}).")
        return fid

    status, body = wp.post("/contact-form-7/v1/contact-forms", payload)
    if status in (200, 201) and isinstance(body, dict):
        fid = body.get("id")
        log(f"✅ Formulaire CF7 créé (id {fid}).")
        return fid
    log(f"⚠️  Échec création formulaire CF7 (HTTP {status}) : {body}")
    return 0


# --------------------------------------------------------------------------
# Pages
# --------------------------------------------------------------------------
def find_page(wp, slug):
    status, pages = wp.get(f"/wp/v2/pages?slug={slug}&status=publish,draft&per_page=10")
    if isinstance(pages, list) and pages:
        return pages[0]
    return None


def upsert_page(wp, node, theme_active):
    slug = node["slug"]
    payload = {
        "title": node["title"],
        "slug": slug,
        "content": node.get("content", ""),
        "excerpt": node.get("subtitle", ""),
        "status": "publish",
        "menu_order": node.get("menu_order", 0),
    }
    if node.get("template") and theme_active:
        payload["template"] = node["template"]

    existing = find_page(wp, slug)
    if DRY_RUN:
        log(f"· [dry-run] {'mettrait à jour' if existing else 'créerait'} « {node['title']} » (/{slug}).")
        return existing.get("id") if existing else 0

    if existing:
        pid = existing["id"]
        status, body = wp.put(f"/wp/v2/pages/{pid}", payload)
        verb = "mise à jour"
    else:
        status, body = wp.post("/wp/v2/pages", payload)
        verb = "créée"

    if status in (200, 201) and isinstance(body, dict):
        pid = body.get("id")
        extra = ""
        if node.get("template"):
            extra = f" [template: {node['template']}]" if theme_active else " [template à assigner après activation du thème]"
        log(f"✅ Page {verb} : « {node['title']} » (id {pid}){extra}.")
        return pid
    log(f"⚠️  Échec page « {node['title']} » (HTTP {status}) : {body}")
    return 0


def create_pages(wp, theme_active):
    ids = {}
    front = None
    for node in content.PAGES:
        pid = upsert_page(wp, node, theme_active)
        ids[node["slug"]] = pid
        if node.get("front_page"):
            front = pid
    return ids, front


# --------------------------------------------------------------------------
# Réglages
# --------------------------------------------------------------------------
def configure_settings(wp, front_id, cf7_id):
    settings = {
        "title": "Domaine du Lendemain",
        "description": "Vins biodynamiques en Roussillon — Fourques",
    }
    if front_id:
        settings["show_on_front"] = "page"
        settings["page_on_front"] = front_id

    if DRY_RUN:
        log(f"· [dry-run] réglages : {settings} (+ ddl_cf7_id={cf7_id}).")
        return

    status, body = wp.put("/wp/v2/settings", settings)
    if status == 200:
        log("✅ Réglages du site mis à jour (titre, page d'accueil statique).")
    else:
        log(f"⚠️  Réglages partiels (HTTP {status}) : {body}")

    if cf7_id:
        st, _ = wp.put("/wp/v2/settings", {"ddl_cf7_id": cf7_id})
        if st == 200:
            log(f"✅ Option ddl_cf7_id = {cf7_id}.")
        else:
            log("ℹ️  ddl_cf7_id non enregistrée (thème pas encore actif). "
                "Le thème détectera automatiquement le formulaire CF7.")


# --------------------------------------------------------------------------
# Menu
# --------------------------------------------------------------------------
def create_primary_menu(wp, ids, home_url):
    if DRY_RUN:
        log(f"· [dry-run] créerait le menu principal ({len(content.PRIMARY_MENU)} entrées).")
        return

    slug = "menu-principal"
    status, menus = wp.get("/wp/v2/menus?per_page=100")
    if isinstance(menus, list):
        for m in menus:
            if m.get("slug") == slug:
                wp.delete(f"/wp/v2/menus/{m['id']}?force=true")

    status, menu = wp.post("/wp/v2/menus", {"name": "Menu principal", "slug": slug,
                                            "locations": ["primary"]})
    if status not in (200, 201) or not isinstance(menu, dict):
        log(f"⚠️  Échec création du menu (HTTP {status}) : {menu}. "
            "(L'endpoint /menus nécessite WordPress 5.9+ ; sinon créez le menu "
            "à la main dans Apparence ▸ Menus.)")
        return
    menu_id = menu["id"]

    order = 1
    for entry in content.PRIMARY_MENU:
        if entry["type"] == "page":
            pid = ids.get(entry["slug"])
            if not pid:
                continue
            item = {"title": entry["label"], "status": "publish", "type": "post_type",
                    "object": "page", "object_id": pid, "menus": menu_id, "menu_order": order}
        elif entry["type"] == "custom":
            item = {"title": entry["label"], "status": "publish", "type": "custom",
                    "url": entry["url"], "menus": menu_id, "menu_order": order,
                    "target": "_blank"}
        else:  # anchor
            item = {"title": entry["label"], "status": "publish", "type": "custom",
                    "url": home_url.rstrip("/") + "/" + entry["fragment"],
                    "menus": menu_id, "menu_order": order}
        st, body = wp.post("/wp/v2/menu-items", item)
        if st not in (200, 201):
            log(f"   ⚠️  entrée « {entry['label']} » non ajoutée (HTTP {st}) : {body}")
        order += 1

    log(f"✅ Menu principal créé et assigné (« primary »), {order - 1} entrées.")


# --------------------------------------------------------------------------
# Programme principal
# --------------------------------------------------------------------------
def main():
    wp = WPClient()

    status, me = wp.get("/wp/v2/users/me?context=edit")
    if status != 200:
        log(f"❌ Authentification impossible (HTTP {status}) : {me}")
        sys.exit(1)
    admin_email = me.get("email") or "wordpress@localhost"
    site_host = urlparse(wp.site).netloc or "localhost"
    log(f"✅ Connecté : {me.get('name')} ({admin_email}).")
    if DRY_RUN:
        log("ℹ️  Mode --dry-run : aucune écriture.\n")

    theme_active = False
    st, themes = wp.get("/wp/v2/themes?status=active")
    if isinstance(themes, list):
        theme_active = any(t.get("stylesheet") == THEME_SLUG for t in themes)
    log(f"ℹ️  Thème « {THEME_SLUG} » actif : {theme_active}")

    ensure_cf7(wp)
    cf7_id = ensure_contact_form(wp, admin_email, site_host)
    ids, front_id = create_pages(wp, theme_active)
    configure_settings(wp, front_id, cf7_id)
    create_primary_menu(wp, ids, wp.site + "/")

    log("\n🎉 Provisioning terminé.")
    log(f"   Site  : {wp.site}")
    log(f"   Pages : {', '.join(f'{k}#{v}' for k, v in ids.items() if v)}")
    if cf7_id:
        log(f"   CF7   : formulaire id {cf7_id}")
    if not theme_active:
        log("\n⚠️  Le thème « Domaine du Lendemain » n'est pas encore actif.")
        log("   1) Téléversez wordpress/dist/domaine-du-lendemain.zip")
        log("      (Apparence ▸ Thèmes ▸ Ajouter ▸ Téléverser).")
        log("   2) Activez-le, puis relancez ce script pour assigner le")
        log("      template de la page Visites et l'option ddl_cf7_id.")


if __name__ == "__main__":
    main()
