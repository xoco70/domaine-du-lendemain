# Domaine du Lendemain — Thème WordPress + scripts de provisioning

Conversion en thème WordPress de la maquette HTML / Tailwind / JS vanilla du
site **[domainedulendemain.com](https://domainedulendemain.com/)** (vins
biodynamiques en Roussillon — Mireille Ribière, Fourques).

```
wordpress/
├── theme/domaine-du-lendemain/   ← le thème WordPress
│   ├── style.css                 ← en-tête de thème + styles repris de la maquette + CF7
│   ├── functions.php             ← réglages, Tailwind CDN, favicons, CF7, GA, helpers
│   ├── header.php / footer.php   ← navigation et pied de page de la maquette
│   ├── front-page.php            ← page d'accueil one-page (généré depuis index.html)
│   ├── template-visites.php      ← page « Visites & Dégustations » (widget Viny'aquí)
│   ├── page.php / single.php / index.php
│   └── assets/                   ← images .webp, favicon, logo, main.js
├── scripts/
│   ├── wp_api.py                 ← mini client REST (Application Password)
│   ├── content.py                ← contenu des pages + structure du menu
│   ├── provision.py              ← crée pages, menu, CF7, réglages (idempotent)
│   ├── build_templates.py        ← régénère front-page.php / template-visites.php
│   └── build_theme_zip.sh        ← fabrique le zip installable
└── dist/
    └── domaine-du-lendemain.zip  ← thème prêt à téléverser
```

## Ce qui est reproduit

- **Accueil** (`front-page.php`) : hero, Le Domaine + timeline, Terroirs, Cépages,
  bannière VIN, Nos engagements, Nos Vins, Huile d'olive, Nous rencontrer,
  Partenaires, CTA boutique — **+ une section Contact (Contact Form 7)** ajoutée.
- **Visites & Dégustations** (`template-visites.php`) : hero, infos pratiques,
  expérience, programme, galerie, **widget de réservation Viny'aquí**, accès.
- Palette Tailwind (`terre` / `vigne` / `feuille`), polices Averia Serif Libre +
  Raleway, animations `fade-in`, menu mobile, favicons, Google Analytics.

> Les templates `front-page.php` et `template-visites.php` sont **générés** à
> partir de `../index.html` et `../visites/index.html` par `build_templates.py`.
> Pour modifier le contenu figé, éditez la maquette puis relancez le script.

---

## Prérequis

- WordPress 6.0+ avec l'API REST accessible.
- Un **Application Password** (Utilisateurs ▸ Profil ▸ Mots de passe d'application).
- Python 3 (aucune dépendance externe : stdlib uniquement).
- `zip` (pour `build_theme_zip.sh`).

> ⚠️ **Identifiant de connexion** : pour l'API REST, `WP_USER` doit être le
> **login WordPress** (p. ex. `johe6239`), **pas** l'adresse email.

---

## Installation — pas à pas

### 1. Construire le zip du thème

```bash
bash wordpress/scripts/build_theme_zip.sh
# → wordpress/dist/domaine-du-lendemain.zip
```

### 2. Installer et activer le thème

Dans l'admin WordPress : **Apparence ▸ Thèmes ▸ Ajouter ▸ Téléverser un thème**,
choisir `domaine-du-lendemain.zip`, puis **Activer**.

### 3. Provisionner pages, menu et formulaire de contact

```bash
export WP_SITE_URL="https://dev.johe6239.odns.fr"
export WP_USER="johe6239"                       # login, pas l'email
export WP_APP_PASSWORD="3NiP uodD nQt1 WacQ jI1j vtiM"

# Aperçu sans rien écrire :
python3 wordpress/scripts/provision.py --dry-run

# Exécution réelle :
python3 wordpress/scripts/provision.py
```

Le script (idempotent) :

1. installe + active **Contact Form 7** ;
2. crée le **formulaire de contact** (français) ;
3. crée les pages **Accueil**, **Visites & Dégustations**, **Mentions légales**,
   **Politique de confidentialité** ;
4. définit l'**accueil statique**, le **titre du site** et l'option `ddl_cf7_id` ;
5. crée le **menu principal** et l'assigne à l'emplacement *primary*.

> 💡 Ordre conseillé : **activez d'abord le thème (étape 2), puis lancez le
> script**. Ainsi le template de la page Visites et l'option `ddl_cf7_id` sont
> appliqués du premier coup. Le script reste **rejouable** sans créer de
> doublons : relancez-le si vous activez le thème après coup.

### 4. Vérifier

- Page d'accueil = rendu de `front-page.php`.
- `/visites/` = page « Visites & Dégustations » avec le widget Viny'aquí.
- Section **Contact** de l'accueil = formulaire Contact Form 7 fonctionnel.

---

## Test rapide de connexion

```bash
python3 wordpress/scripts/wp_api.py
# ✅ Connecté : ... (id N) — Administrateur : True
```

---

## Notes

- **Tailwind via CDN** : la maquette d'origine charge Tailwind par CDN ; le thème
  conserve ce fonctionnement (avec la même configuration de palette/polices) pour
  un rendu identique. Pour la production, on pourra compiler une feuille Tailwind
  statique afin de supprimer la dépendance au CDN.
- **Contact Form 7** : si l'option `ddl_cf7_id` n'est pas définie, le thème
  détecte automatiquement le formulaire CF7 le plus ancien. En l'absence totale
  de CF7, un formulaire statique de repli s'affiche.
- **Widget Viny'aquí** : la clé d'API du widget de réservation est publique
  (déjà présente côté front dans la maquette) ; elle est conservée telle quelle
  dans `template-visites.php`.
- **Réglages filtrables** : URL boutique (`ddl_boutique_url`), identifiant
  Google Analytics (`ddl_ga_id`, renvoyer `''` pour désactiver), formules de
  visite (`ddl_visites_formules` — non utilisé si le contenu vient de la maquette).
