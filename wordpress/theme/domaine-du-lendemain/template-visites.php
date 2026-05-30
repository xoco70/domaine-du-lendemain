<?php
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
<!-- HERO -->
    <section
      id="top"
      class="relative h-[70vh] min-h-[480px] flex items-center justify-center overflow-hidden mt-[64px]"
    >
      <img
        src="<?php echo $img; ?>/vignes.webp"
        alt="Vignes en gobelet sur le terroir des Aspres"
        class="absolute inset-0 w-full h-full object-cover"
      />
      <div
        class="absolute inset-0 bg-gradient-to-b from-terre-900/55 via-terre-900/25 to-terre-900/70"
      ></div>
      <div class="relative z-10 text-center text-terre-50 px-6 max-w-3xl">
        <p class="uppercase tracking-[0.4em] text-xs md:text-sm mb-6 opacity-90">
          Œnotourisme · Aspres · Roussillon
        </p>
        <h1 class="serif text-4xl md:text-6xl mb-6 leading-tight">
          Visite & dégustation au Domaine du Lendemain
        </h1>
        <p class="serif text-lg md:text-xl mb-8 text-terre-100">
          Une heure et demie entre vignes, plantes médicinales et vins vivants.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
          <a
            href="#reservation"
            class="bg-terre-50 text-terre-800 hover:bg-terre-200 px-7 py-3 rounded-full transition"
            >Réserver une date</a
          >
          <a
            href="#experience"
            class="border border-terre-50/80 text-terre-50 hover:bg-terre-50/10 px-7 py-3 rounded-full transition"
            >Découvrir l'expérience</a
          >
        </div>
      </div>
    </section>

    <!-- INFOS PRATIQUES -->
    <section class="py-14 px-5 bg-terre-50 border-b border-terre-200">
      <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 fade-in">
        <div class="bg-terre-100 border border-terre-200 rounded-lg p-5 text-center">
          <div class="flex justify-center mb-3 text-terre-600">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="9" stroke-width="1.5"/><path stroke-linecap="round" stroke-width="1.5" d="M12 7v5l3 2"/></svg>
          </div>
          <div class="text-terre-500 text-xs uppercase tracking-widest mb-1">Durée</div>
          <div class="serif text-lg text-terre-700">Environ 1h30</div>
        </div>
        <div class="bg-terre-100 border border-terre-200 rounded-lg p-5 text-center">
          <div class="flex justify-center mb-3 text-terre-600">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 014-4h0a4 4 0 014 4v2m-2-12a4 4 0 11-8 0 4 4 0 018 0zm6 4a3 3 0 100-6 3 3 0 000 6z"/></svg>
          </div>
          <div class="text-terre-500 text-xs uppercase tracking-widest mb-1">Groupe</div>
          <div class="serif text-lg text-terre-700">14 personnes max</div>
        </div>
        <div class="bg-terre-100 border border-terre-200 rounded-lg p-5 text-center">
          <div class="flex justify-center mb-3 text-terre-600">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="9" stroke-width="1.5"/><path stroke-linecap="round" stroke-width="1.5" d="M3 12h18M12 3a13 13 0 010 18M12 3a13 13 0 000 18"/></svg>
          </div>
          <div class="text-terre-500 text-xs uppercase tracking-widest mb-1">Langues</div>
          <div class="serif text-lg text-terre-700">FR · EN · ES</div>
        </div>
        <div class="bg-terre-100 border border-terre-200 rounded-lg p-5 text-center">
          <div class="flex justify-center mb-3 text-terre-600">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div class="text-terre-500 text-xs uppercase tracking-widest mb-1">Annulation</div>
          <div class="serif text-lg text-terre-700">Gratuite jusqu'à J-1</div>
        </div>
      </div>
    </section>

    <!-- EXPÉRIENCE -->
    <section id="experience" class="py-24 px-5 bg-terre-100 grain">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-14 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            L'expérience
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Une rencontre avec le vivant
          </h2>
        </div>

        <div class="space-y-6 leading-relaxed text-lg fade-in">
          <p>
            Le Domaine du Lendemain s'étend sur 9 hectares au pied des Pyrénées,
            sur les coteaux argilo-calcaires des Aspres. J'y cultive des cépages
            patrimoniaux de la Catalogne Nord — Grenache, Carignan, Lledoner
            pelut — dans le respect d'une viticulture biodynamique exigeante.
            Mon parcours d'herbaliste m'a appris à lire la vigne autrement : à
            écouter ce que les plantes alentours nous disent du sol, du climat,
            des équilibres à trouver.
          </p>
          <p>
            Lors de la visite, je vous emmène entre les rangs pour vous montrer
            le travail au quotidien : les très vieilles vignes sauvées de
            l'arrachage, les haies nourricières que nous replantons, les
            tisanes de saule, d'ortie et de prêle qui remplacent ici les
            produits de synthèse. Vous comprendrez comment le rythme lunaire
            guide nos interventions et pourquoi chaque cuvée porte un nom
            emprunté à la phytothérapie.
          </p>
          <p>
            La dégustation se fait sans pression, autour de quatre vins choisis
            pour raconter le millésime. Levures indigènes, vinifications par
            gravité, élevages doux : ce sont des vins qui prennent le temps. Ce
            que je vous propose ici, ce n'est pas un défilé d'étiquettes — c'est
            un moment partagé, à hauteur d'écosystème.
          </p>
        </div>
      </div>
    </section>

    <!-- CE QUI VOUS ATTEND -->
    <section class="py-24 px-5 bg-terre-50">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Au programme
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Ce qui vous attend
          </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-5 fade-in">
          <div class="bg-terre-100 border border-terre-200 rounded-xl p-6 flex gap-5">
            <div class="serif text-3xl text-terre-600 leading-none mt-1">01</div>
            <div>
              <h3 class="serif text-xl text-terre-700 mb-2">Promenade dans le vignoble</h3>
              <p class="text-sm text-terre-600 leading-relaxed">
                Découverte des parcelles et rencontre avec les très vieilles
                vignes — Grenache de 1900, Carignan centenaire — préservées de
                l'arrachage.
              </p>
            </div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-xl p-6 flex gap-5">
            <div class="serif text-3xl text-terre-600 leading-none mt-1">02</div>
            <div>
              <h3 class="serif text-xl text-terre-700 mb-2">Bio, biodynamie, agroécologie</h3>
              <p class="text-sm text-terre-600 leading-relaxed">
                Lecture des pratiques en place sur le domaine : sols vivants,
                haies, verger méditerranéen, gestion sans intrants chimiques.
              </p>
            </div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-xl p-6 flex gap-5">
            <div class="serif text-3xl text-terre-600 leading-none mt-1">03</div>
            <div>
              <h3 class="serif text-xl text-terre-700 mb-2">Cycles lunaires & plantes</h3>
              <p class="text-sm text-terre-600 leading-relaxed">
                Comment le calendrier biodynamique rythme le travail, et
                pourquoi nous pulvérisons décoctions, purins et hydrolats
                préparés sur place.
              </p>
            </div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-xl p-6 flex gap-5">
            <div class="serif text-3xl text-terre-600 leading-none mt-1">04</div>
            <div>
              <h3 class="serif text-xl text-terre-700 mb-2">Vinification naturelle</h3>
              <p class="text-sm text-terre-600 leading-relaxed">
                Levures indigènes, vinifications par gravité, élevages sans
                produit de synthèse : un aperçu des choix faits à la cave.
              </p>
            </div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-xl p-6 flex gap-5 md:col-span-2">
            <div class="serif text-3xl text-terre-600 leading-none mt-1">05</div>
            <div>
              <h3 class="serif text-xl text-terre-700 mb-2">Dégustation commentée — 4 cuvées</h3>
              <p class="text-sm text-terre-600 leading-relaxed">
                Quatre vins du domaine, choisis pour refléter la diversité des
                cépages et des millésimes. Cuvées dont les noms s'inspirent de
                la phytothérapie, à l'image du travail mené dans les rangs.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- GALERIE -->
    <section class="py-20 px-5 bg-terre-100 grain">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-10 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Aperçu
          </p>
          <h2 class="serif text-3xl md:text-4xl text-terre-700 section-title center inline-block">
            Le domaine en images
          </h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 fade-in">
          <img src="<?php echo $img; ?>/vignes.webp" alt="Vignes en gobelet sur le terroir des Aspres" class="rounded-lg w-full h-44 md:h-64 object-cover border border-terre-200" loading="lazy" />
          <img src="<?php echo $img; ?>/aspres1.webp" alt="Paysage des Aspres au pied des Pyrénées" class="rounded-lg w-full h-44 md:h-64 object-cover border border-terre-200" loading="lazy" />
          <img src="<?php echo $img; ?>/petit-matin.webp" alt="Lumière matinale sur le vignoble" class="rounded-lg w-full h-44 md:h-64 object-cover border border-terre-200" loading="lazy" />
          <img src="<?php echo $img; ?>/vendange.webp" alt="Vendanges manuelles au domaine" class="rounded-lg w-full h-44 md:h-64 object-cover border border-terre-200" loading="lazy" />
          <img src="<?php echo $img; ?>/encuvage.webp" alt="Encuvage en douceur en cave" class="rounded-lg w-full h-44 md:h-64 object-cover border border-terre-200" loading="lazy" />
          <img src="<?php echo $img; ?>/rencontre.webp" alt="Visite et dégustation au Domaine du Lendemain" class="rounded-lg w-full h-44 md:h-64 object-cover border border-terre-200" loading="lazy" />
        </div>
      </div>
    </section>

    <!-- RESERVATION -->
    <section id="reservation" class="py-24 px-5 bg-terre-50 scroll-mt-24">
      <div class="max-w-3xl mx-auto">
        <div class="text-center mb-12 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Réservation
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Choisir une date
          </h2>
          <p class="mt-6 leading-relaxed">
            À partir de <strong>15&nbsp;€ par adulte</strong>. Réservation
            sécurisée via notre partenaire Viny'aquí, paiement en ligne,
            confirmation immédiate.
          </p>
        </div>

        <div class="bg-terre-100 border border-terre-200 rounded-xl p-5 md:p-8 fade-in vinyaqui-wrap">
          <!-- Widget de réservation Vinyaqui -->
          <div id="vinyaqui-widget"></div>
          <a class="vinyaqui-backlink" href="https://vinyaqui.com/activities/visite-dans-les-vignes-et-degustation-de-vins-biodynamiques-au-domaine-du-lendemain" target="_blank" rel="noopener noreferrer">Réservez cette expérience sur Viny'aquí</a>
          <link rel="stylesheet" href="https://vinyaqui.com/widget/booking-widget.css?v=1.3">
          <script
            src="https://vinyaqui.com/widget/booking-widget.js?v=1.3"
            data-api-base="https://vinyaqui.com/api"
            data-activity="visite-dans-les-vignes-et-degustation-de-vins-biodynamiques-au-domaine-du-lendemain"
            data-api-key="vk_rxeFAYenwYyHvQ2NAq3ncwzaU67jVGReo2tt6fTL5xHildOeKCZdq4hqHryW"
            data-target="#vinyaqui-widget"
          ></script>
        </div>
      </div>
    </section>

    <!-- ACCES / CONTACT -->
    <section class="py-20 px-5 bg-terre-100 grain">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-10 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Nous trouver
          </p>
          <h2 class="serif text-3xl md:text-4xl text-terre-700 section-title center inline-block">
            Accès au domaine
          </h2>
          <p class="mt-6 leading-relaxed max-w-2xl mx-auto">
            Le domaine se situe à Fourques (66300), à 15 km au sud de Perpignan.
            Une question avant de venir ? Écrivez-nous ou appelez directement.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-6 fade-in">
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6 text-center">
            <div class="text-terre-500 text-xs uppercase tracking-widest mb-2">Téléphone</div>
            <a href="tel:+33685820452" class="serif text-2xl text-terre-700 hover:text-terre-800">
              06 85 82 04 52
            </a>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6 text-center">
            <div class="text-terre-500 text-xs uppercase tracking-widest mb-2">Email</div>
            <a
              href="mailto:mireilleribiere8@gmail.com"
              class="serif text-xl text-terre-700 hover:text-terre-800 break-all"
            >
              mireilleribiere8@gmail.com
            </a>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6 text-center">
            <div class="text-terre-500 text-xs uppercase tracking-widest mb-2">Adresse</div>
            <a
              href="https://maps.google.com/?q=102+Route+de+Trouillas+66300+Fourques"
              target="_blank"
              rel="noopener"
              class="serif text-lg text-terre-700 hover:text-terre-800 leading-snug block"
            >
              102 Route de Trouillas<br />66300 Fourques
            </a>
          </div>
        </div>
      </div>
    </section>
</main>

<?php
get_footer();
