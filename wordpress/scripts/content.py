#!/usr/bin/env python3
"""Contenu des pages du site Domaine du Lendemain (vins biodynamiques).

L'accueil (front-page.php) et la page « Visites » (template-visites.php)
portent l'essentiel de leur contenu dans le thème lui-même : on ne crée ici
que les pages WordPress nécessaires (accueil, visites, pages légales) et
l'ossature du menu.

Chaque page :
    slug, title, subtitle (excerpt), content (HTML éditeur),
    template (fichier de template optionnel), front_page (bool), menu_order.
"""

PAGES = [
    {
        "slug": "accueil",
        "title": "Accueil",
        "subtitle": "Vins biodynamiques en Roussillon",
        "content": (
            "<p>Page d'accueil du Domaine du Lendemain. Le contenu est géré par "
            "le gabarit <code>front-page.php</code> du thème.</p>"
        ),
        "front_page": True,
        "menu_order": 0,
    },
    {
        "slug": "visites",
        "title": "Visites & Dégustations",
        "subtitle": "Découvrez notre domaine et nos vins biodynamiques",
        # Contenu éditable optionnel affiché en complément du template.
        "content": "",
        "template": "template-visites.php",
        "menu_order": 10,
    },
    {
        "slug": "mentions-legales",
        "title": "Mentions légales",
        "subtitle": "Informations légales du site",
        "content": (
            "<h2>Éditeur du site</h2>"
            "<p>Domaine du Lendemain — Mireille Ribière<br>"
            "102 Route de Trouillas, 66300 Fourques (Pyrénées-Orientales)<br>"
            "Téléphone : 06 85 82 04 52<br>"
            "Email : mireilleribiere8@gmail.com</p>"
            "<h2>Directrice de la publication</h2>"
            "<p>Mireille Ribière.</p>"
            "<h2>Hébergement</h2>"
            "<p>Ce site est hébergé par l'hébergeur du Domaine du Lendemain.</p>"
            "<h2>Propriété intellectuelle</h2>"
            "<p>L'ensemble des contenus (textes, photographies, logos) présents sur "
            "ce site est la propriété du Domaine du Lendemain, sauf mention contraire. "
            "Toute reproduction sans autorisation préalable est interdite.</p>"
            "<h2>Vente d'alcool</h2>"
            "<p>L'abus d'alcool est dangereux pour la santé, à consommer avec "
            "modération. La vente d'alcool est interdite aux mineurs de moins de "
            "18 ans.</p>"
        ),
        "menu_order": 100,
    },
    {
        "slug": "politique-confidentialite",
        "title": "Politique de confidentialité",
        "subtitle": "Protection de vos données personnelles",
        "content": (
            "<p>Le Domaine du Lendemain attache une grande importance à la protection "
            "de vos données personnelles, conformément au Règlement Général sur la "
            "Protection des Données (RGPD).</p>"
            "<h2>Données collectées</h2>"
            "<p>Les informations transmises via le formulaire de contact (nom, email, "
            "message) sont utilisées uniquement pour répondre à votre demande et ne "
            "sont jamais cédées à des tiers.</p>"
            "<h2>Durée de conservation</h2>"
            "<p>Vos données sont conservées le temps nécessaire au traitement de votre "
            "demande, puis supprimées.</p>"
            "<h2>Vos droits</h2>"
            "<p>Vous disposez d'un droit d'accès, de rectification et de suppression "
            "de vos données. Pour l'exercer, écrivez à mireilleribiere8@gmail.com.</p>"
            "<h2>Cookies</h2>"
            "<p>Ce site utilise des cookies techniques nécessaires à son "
            "fonctionnement ainsi que, le cas échéant, des cookies de mesure "
            "d'audience (Google Analytics) et des widgets tiers (réservation "
            "Viny'aquí).</p>"
        ),
        "menu_order": 110,
    },
]

# Menu principal — reproduit la navigation de la maquette.
# type "anchor" : lien personnalisé vers home_url + fragment.
# type "page"   : lien vers la page du slug indiqué.
# type "custom" : lien externe (url absolue).
PRIMARY_MENU = [
    {"label": "Le Domaine", "type": "anchor", "fragment": "#domaine"},
    {"label": "Nos Engagements", "type": "anchor", "fragment": "#engagements"},
    {"label": "Nos Vins", "type": "anchor", "fragment": "#vins"},
    {"label": "Nous Rencontrer", "type": "anchor", "fragment": "#rencontrer"},
    {"label": "Visites", "type": "page", "slug": "visites"},
    {"label": "Contact", "type": "anchor", "fragment": "#contact"},
    {"label": "Boutique", "type": "custom",
     "url": "https://commande.kuupanda.com/producteur/4079/particulier"},
]
