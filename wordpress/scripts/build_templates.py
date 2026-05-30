#!/usr/bin/env python3
"""Génère front-page.php et template-visites.php à partir de la maquette HTML.

On extrait le corps (entre </header> et <!-- FOOTER -->) de index.html et de
visites/index.html, on réécrit les chemins d'images vers le thème, on
remplace les liens « visites » par le permalien WordPress, et on injecte le
formulaire Contact Form 7 sur la page d'accueil.

Lancer depuis n'importe où :
    python3 wordpress/scripts/build_templates.py
"""

import os
import re

ROOT = os.path.abspath(os.path.join(os.path.dirname(__file__), "..", ".."))
THEME = os.path.join(ROOT, "wordpress", "theme", "domaine-du-lendemain")


def slice_body(html):
    """Retourne le contenu entre la fin du <header> et le commentaire FOOTER."""
    start = html.index("</header>") + len("</header>")
    end = html.index("<!-- FOOTER -->")
    return html[start:end].strip()


def fix_home(body):
    body = body.replace('src="img/', 'src="<?php echo $img; ?>/')
    body = body.replace("url('img/", "url('<?php echo $img; ?>/")
    body = body.replace('href="./visites/index.html"', 'href="<?php echo esc_url( ddl_visites_url() ); ?>"')
    body = body.replace('href="/visites/"', 'href="<?php echo esc_url( ddl_visites_url() ); ?>"')
    return body


def fix_visites(body):
    body = body.replace('src="/img/', 'src="<?php echo $img; ?>/')
    body = body.replace('src="img/', 'src="<?php echo $img; ?>/')
    # Lien « Visites » pointant sur elle-même -> ancre haut de page.
    body = body.replace('href="/visites/"', 'href="#top"')
    return body


# Bloc « Formulaire de contact » (Contact Form 7) ajouté sur l'accueil,
# juste avant le pied de page.
CONTACT_SECTION = '''
    <!-- CONTACT (Contact Form 7) -->
    <section id="contact" class="py-24 px-5 bg-terre-100 grain scroll-mt-24">
      <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">Écrivez-nous</p>
          <h2 class="serif text-3xl md:text-4xl text-terre-700 section-title center inline-block">Formulaire de contact</h2>
        </div>
        <div class="bg-terre-50 border border-terre-200 rounded-xl p-6 md:p-8 fade-in">
          <?php ddl_contact_form( true ); ?>
        </div>
      </div>
    </section>
'''

FRONT_HEADER = '''<?php
/**
 * Page d'accueil one-page — convertie depuis index.html (maquette d'origine).
 *
 * Généré par wordpress/scripts/build_templates.py — ne pas éditer à la main,
 * modifier la maquette source puis relancer le script.
 *
 * @package Domaine_du_Lendemain
 */

get_header();
$img = get_template_directory_uri() . '/assets/img';
?>

<main id="main">
'''

FRONT_FOOTER = '''
</main>

<?php
get_footer();
'''

VISITES_HEADER = '''<?php
/**
 * Template Name: Visites & Dégustations
 *
 * Converti depuis visites/index.html (maquette d'origine). Inclut le widget
 * de réservation Viny'aquí.
 *
 * Généré par wordpress/scripts/build_templates.py — ne pas éditer à la main,
 * modifier la maquette source puis relancer le script.
 *
 * @package Domaine_du_Lendemain
 */

get_header();
$img = get_template_directory_uri() . '/assets/img';
?>

<main id="main">
'''


def main():
    with open(os.path.join(ROOT, "index.html"), encoding="utf-8") as f:
        index_html = f.read()
    with open(os.path.join(ROOT, "visites", "index.html"), encoding="utf-8") as f:
        visites_html = f.read()

    # --- front-page.php ---
    home_body = fix_home(slice_body(index_html))
    home_body += "\n" + CONTACT_SECTION
    front = FRONT_HEADER + home_body + FRONT_FOOTER
    with open(os.path.join(THEME, "front-page.php"), "w", encoding="utf-8") as f:
        f.write(front)
    print("✅ front-page.php généré (%d octets)" % len(front))

    # --- template-visites.php ---
    visites_body = fix_visites(slice_body(visites_html))
    visites = VISITES_HEADER + visites_body + FRONT_FOOTER
    with open(os.path.join(THEME, "template-visites.php"), "w", encoding="utf-8") as f:
        f.write(visites)
    print("✅ template-visites.php généré (%d octets)" % len(visites))


if __name__ == "__main__":
    main()
