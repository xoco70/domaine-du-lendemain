<?php
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
<!-- HERO -->
    <section
      id="top"
      class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden"
    >
      <img
        src="<?php echo $img; ?>/hero.webp"
        alt="Lumière matinale dans les vignes du Domaine du Lendemain"
        class="absolute inset-0 w-full h-full object-cover"
      />
      <div
        class="absolute inset-0 bg-gradient-to-b from-terre-900/45 via-terre-900/20 to-terre-900/70"
      ></div>
      <div class="relative z-10 text-center text-terre-50 px-6 max-w-3xl">
        <p class="uppercase tracking-[0.4em] text-xs md:text-sm mb-6 opacity-90">
          Vigneronne &amp; Herbaliste · Roussillon
        </p>
        <h1 class="serif text-5xl md:text-7xl mb-6 leading-tight">
          Domaine du Lendemain
        </h1>
        <p class="serif text-xl md:text-2xl mb-3 text-terre-100">
          Vins Naturellement Bio
        </p>
        <p class="text-sm md:text-base mb-10 text-terre-200 max-w-xl mx-auto">
          Au service de la nature pour des vins vivants depuis 2018.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
          <a
            href="<?php echo esc_url( ddl_visites_url() ); ?>"
            class="bg-terre-50 text-terre-800 hover:bg-terre-200 px-7 py-3 rounded-full transition"
            >Visiter le domaine</a
          >
          <a
            href="https://commande.kuupanda.com/producteur/4079/particulier"
            target="_blank"
            rel="noopener"
            class="border border-terre-50/80 text-terre-50 hover:bg-terre-50/10 px-7 py-3 rounded-full transition"
            >Boutique en ligne</a
          >
        </div>
      </div>
      <a
        href="#domaine"
        class="absolute bottom-8 left-1/2 -translate-x-1/2 text-terre-50/80 hover:text-terre-50 z-10"
        aria-label="Découvrir"
      >
        <svg class="h-7 w-7 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
      </a>
    </section>

    <!-- LE DOMAINE -->
    <section id="domaine" class="py-24 px-5 bg-terre-50">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Histoire & héritage
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Le Domaine
          </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center mb-20 fade-in">
          <div>
            <p class="serif text-2xl md:text-3xl text-terre-700 leading-snug mb-6">
              « J'ai laissé enfin s'exprimer le gène familial de vigneron. »
            </p>
            <p class="mb-4 leading-relaxed">
              Issue d'une famille où l'on travaille la terre depuis plusieurs
              générations, j'ai appris très tôt l'importance des cycles
              lunaires, des plantes, des minéraux et de l'observation. Agronome
              et diplômée Herbaliste en 2020 après 3 ans d'école, j'ai également
              développé une petite distillerie d'huiles essentielles et
              d'hydrolats.
            </p>
            <p class="leading-relaxed">
              Préserver les vieilles vignes, replanter des friches familiales,
              créer des haies nourricières… Le Domaine du Lendemain est un
              travail d'héritage, de soin et de transmission.
            </p>
          </div>
          <div class="relative">
            <img
              src="<?php echo $img; ?>/pere-fille.webp"
              alt="Petits échanges entre Mireille Ribière et son père Bruno"
              class="rounded-lg shadow-xl border border-terre-200 w-full"
            />
            <div
              class="hidden md:block absolute -bottom-6 -left-6 bg-terre-700 text-terre-50 px-5 py-3 rounded text-sm serif italic"
            >
              Mireille & Bruno Ribière
            </div>
          </div>
        </div>

        <!-- TIMELINE -->
        <div class="fade-in">
          <h3 class="serif text-2xl text-terre-700 mb-10 text-center">
            Les saisons du domaine
          </h3>
          <div class="relative max-w-3xl mx-auto pl-8 border-l-2 border-terre-300">
            <div class="mb-10 relative">
              <div class="timeline-dot absolute -left-[42px] top-1"></div>
              <div class="serif text-2xl text-terre-600">2017</div>
              <p class="mt-2 leading-relaxed">
                Premiers prélèvements de raisin sur le domaine de mon père pour
                démarrer de futures cuvées.
              </p>
            </div>
            <div class="mb-10 relative">
              <div class="timeline-dot absolute -left-[42px] top-1"></div>
              <div class="serif text-2xl text-terre-600">2018</div>
              <p class="mt-2 leading-relaxed">
                Création du Domaine du Lendemain. Sauvetage de 2 ha de très
                vieilles vignes de <strong>Grenache gris et blanc plantées en 1900</strong>.
              </p>
            </div>
            <div class="mb-10 relative">
              <div class="timeline-dot absolute -left-[42px] top-1"></div>
              <div class="serif text-2xl text-terre-600">2019</div>
              <p class="mt-2 leading-relaxed">
                3 ha de Carignan, Lledoner pelut et un brin de Muscat petits
                grains complètent l'encépagement. Les premières cuvées
                <em>Jeune Pousse 18</em> et <em>Petit Bourgeon 19</em> voient le
                jour — des noms inspirés de la phytothérapie, synonymes de
                régénérescence.
              </p>
            </div>
            <div class="mb-10 relative">
              <div class="timeline-dot absolute -left-[42px] top-1"></div>
              <div class="serif text-2xl text-terre-600">2020</div>
              <p class="mt-2 leading-relaxed">
                Mon père <strong>Bruno Ribière</strong> me rejoint après 30 ans
                de pratique sur son domaine, partageant la même envie de faire
                des vins libres, des vins qui nous ressemblent.
              </p>
            </div>
            <div class="mb-10 relative">
              <div class="timeline-dot absolute -left-[42px] top-1"></div>
              <div class="serif text-2xl text-terre-600">2024</div>
              <p class="mt-2 leading-relaxed">
                Mon frère rejoint le projet pour créer un cadre dynamique entre
                nature et culture, fort de ses connaissances acquises en
                Équateur sur l'agroécologie. Il met en place un verger
                diversifié méditerranéen, avec des espèces nourricières adaptées
                à la mouvance climatique.
              </p>
            </div>
            <div class="relative">
              <div class="timeline-dot absolute -left-[42px] top-1"></div>
              <div class="serif text-2xl text-terre-600">Aujourd'hui</div>
              <p class="mt-2 leading-relaxed">
                <strong>8 hectares en production</strong>, des rendements
                faibles mais riches en personnalité.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- TERROIRS -->
    <section id="terroirs" class="py-24 px-5 bg-terre-100 grain">
      <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div class="fade-in order-2 md:order-1">
            <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
              Les Aspres
            </p>
            <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title mb-8">
              Terroirs
            </h2>
            <p class="mb-4 leading-relaxed">
              Situé en Roussillon, à 15 km au sud de Perpignan, le domaine
              s'étend sur le terroir des <strong>Aspres</strong> — un paysage où
              la chaîne pyrénéenne rencontre la Méditerranée. Collines
              verdoyantes, terre rouge et ocre : ce décor unique façonne des
              vins de caractère.
            </p>
            <p class="mb-4 leading-relaxed">
              Les sols y sont variés : limono-argileux, argilo-caillouteux,
              schistes, quartz, calcaire… Les terrasses alluviales pyrénéennes
              apportent fraîcheur et pureté.
            </p>
            <p class="leading-relaxed">
              La <strong>tramontane</strong>, vent emblématique de la région,
              assainit et protège les vignes tout au long de l'année. Un climat
              sec, lumineux, venteux — les conditions idéales pour cultiver des
              cépages typiques du Roussillon, menés en gobelet ou cordon de
              Royat.
            </p>
          </div>
          <div class="grid grid-cols-2 gap-3 fade-in order-1 md:order-2">
            <img
              src="<?php echo $img; ?>/aspres1.webp"
              alt="Paysage des Aspres"
              class="rounded-lg w-full h-48 md:h-64 object-cover border border-terre-300"
            />
            <img
              src="<?php echo $img; ?>/aspres2.webp"
              alt="Collines des Aspres en Roussillon"
              class="rounded-lg w-full h-48 md:h-64 object-cover border border-terre-300 mt-6"
            />
            <img
              src="<?php echo $img; ?>/aspres3.webp"
              alt="Vignes au pied des Pyrénées"
              class="rounded-lg w-full h-48 md:h-64 object-cover border border-terre-300"
            />
            <img
              src="<?php echo $img; ?>/petit-matin.webp"
              alt="Petit matin sur le domaine"
              class="rounded-lg w-full h-48 md:h-64 object-cover border border-terre-300 mt-6"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- CEPAGES -->
    <section id="cepages" class="py-24 px-5 bg-terre-50">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Patrimoine catalan
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Cépages
          </h2>
          <p class="max-w-2xl mx-auto mt-6 leading-relaxed">
            Le domaine cultive des cépages historiques, enracinés dans le
            patrimoine catalan. La plus vieille vigne a été plantée en
            <strong>1878</strong>.
          </p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 fade-in">
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Grenache</div>
            <div class="text-sm text-terre-500 mt-1">gris · blanc · noir</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Carignan</div>
            <div class="text-sm text-terre-500 mt-1">cépage roi du Roussillon</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Lledoner pelut</div>
            <div class="text-sm text-terre-500 mt-1">cépage catalan ancien</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Syrah</div>
            <div class="text-sm text-terre-500 mt-1">élégance & épices</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Muscat petits grains</div>
            <div class="text-sm text-terre-500 mt-1">aromatique</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Muscat d'Alexandrie</div>
            <div class="text-sm text-terre-500 mt-1">méditerranéen</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Mourvèdre</div>
            <div class="text-sm text-terre-500 mt-1">structure & garde</div>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 hover:border-terre-600 transition">
            <div class="serif text-2xl text-terre-700">Mataro</div>
            <div class="text-sm text-terre-500 mt-1">tradition catalane</div>
          </div>
        </div>
        <div class="mt-12 fade-in">
          <img
            src="<?php echo $img; ?>/vignes.webp"
            alt="Vignes en gobelet sur le Domaine du Lendemain"
            class="rounded-lg w-full h-72 md:h-96 object-cover border border-terre-200"
          />
        </div>
      </div>
    </section>

    <!-- VIN TAGLINE BANNER -->
    <section class="py-20 px-5 bg-terre-200">
      <div class="max-w-4xl mx-auto text-center fade-in">
        <p class="uppercase tracking-[0.5em] text-xs text-terre-600 mb-6">
          Notre devise
        </p>
        <p class="serif text-4xl md:text-6xl text-terre-700 leading-tight">
          <span class="text-terre-600">VIN</span>
          <span class="text-terre-500"> · </span>
          <span class="italic">Véritable Invention Naturelle</span>
        </p>
      </div>
    </section>

    <!-- ENGAGEMENTS -->
    <section id="engagements" class="py-24 px-5 bg-terre-700 text-terre-50">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-300 mb-4">
            Bio · Biodynamie
          </p>
          <h2 class="serif text-4xl md:text-5xl section-title center inline-block">
            Nos engagements
          </h2>
          <p class="max-w-2xl mx-auto mt-6 leading-relaxed text-terre-100">
            L'ensemble du domaine est mené en Agriculture Biologique et
            biodynamique. Le travail de la vigne privilégie l'observation et le
            respect du vivant.
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-10 fade-in">
          <!-- VIGNE -->
          <div class="bg-terre-50/5 border border-terre-50/15 rounded-xl p-8 backdrop-blur">
            <div class="flex items-center gap-4 mb-6">
              <div class="h-12 w-12 rounded-full bg-terre-50/10 flex items-center justify-center">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2v6m0 0c-2 0-4 1-4 3s2 3 4 3 4-1 4-3-2-3-4-3zm0 6v14"/></svg>
              </div>
              <h3 class="serif text-3xl">L'art de la vigne</h3>
            </div>
            <ul class="space-y-3 text-terre-100">
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Favoriser le cycle naturellement biologique de la vigne</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Apport de minéraux et oligo-éléments depuis les décoctions de plantes</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Maîtrise de l'enherbement naturel</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Écocep et pioche sur le rang</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Vie et structure du sol via fumier composté et tisanes (saule, ortie, prêle, fougère…)</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Pulvérisation de purins, huiles essentielles et hydrolats en prophylaxie</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Soufre et cuivre selon les conditions météo</span></li>
            </ul>
          </div>

          <!-- CAVE -->
          <div class="bg-terre-50/5 border border-terre-50/15 rounded-xl p-8 backdrop-blur">
            <div class="flex items-center gap-4 mb-6">
              <div class="h-12 w-12 rounded-full bg-terre-50/10 flex items-center justify-center">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 2h8l-1 6a4 4 0 11-6 0L8 2zm4 10v8m-3 0h6"/></svg>
              </div>
              <h3 class="serif text-3xl">L'art de la cave</h3>
            </div>
            <ul class="space-y-3 text-terre-100">
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Vendanges manuelles</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Raisins sélectionnés</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Levures indigènes</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Vinifications naturelles, par gravité</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Hygiène rigoureuse, suivi sensoriel constant</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span>Aucun ajout de produit de synthèse</span></li>
              <li class="flex gap-3"><span class="text-terre-300">·</span><span><em>Chaque millésime est unique.</em></span></li>
            </ul>
          </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4 mt-12 fade-in">
          <img src="<?php echo $img; ?>/vendange.webp" alt="Arrivée des vendanges manuelles" class="rounded-lg w-full h-56 object-cover" />
          <img src="<?php echo $img; ?>/encuvage.webp" alt="Encuvage en douceur" class="rounded-lg w-full h-56 object-cover" />
          <img src="<?php echo $img; ?>/team.webp" alt="L'équipe Ribière" class="rounded-lg w-full h-56 object-cover" />
        </div>
      </div>
    </section>

    <!-- NOS PRODUITS -->
    <section id="produits" class="py-24 px-5 bg-terre-100 grain">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Vins vivants &amp; produits du domaine
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Nos Produits
          </h2>
        </div>

        <!-- VINS -->
        <div id="vins" class="mb-20 scroll-mt-24">
          <div class="flex items-end justify-between mb-8 fade-in">
            <h3 class="serif text-3xl md:text-4xl text-terre-700">Nos Vins</h3>
            <a
              href="https://commande.kuupanda.com/producteur/4079/particulier"
              target="_blank"
              rel="noopener"
              class="hidden md:inline-block text-sm text-terre-700 hover:text-terre-800"
              >Commander en ligne →</a
            >
          </div>
          <p class="max-w-3xl leading-relaxed mb-10 fade-in">
            Des cuvées aux noms inspirés de la phytothérapie, synonymes de
            régénérescence. Vinifications par gravité, levures indigènes, sans
            ajout de produit de synthèse. <em>Chaque millésime est unique.</em>
          </p>

          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 fade-in">
            <article class="bg-terre-50 border border-terre-200 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition">
              <div class="h-48 bg-cover bg-bottom" style="background-image: url('<?php echo $img; ?>/jeune-pousse.webp')"></div>
              <div class="p-6 flex-1 flex flex-col">
                <div class="text-xs uppercase tracking-widest text-terre-500 mb-1">Cuvée fondatrice</div>
                <h4 class="serif text-2xl text-terre-700 mb-2">Jeune Pousse</h4>
                <p class="text-sm text-terre-600 mb-4 flex-1">
                  Première cuvée née en 2018. Un vin de fraîcheur, expression
                  des très vieilles vignes du domaine.
                </p>
                <div class="text-xs text-terre-500 italic">Roussillon · Biodynamie</div>
              </div>
            </article>

            <article class="bg-terre-50 border border-terre-200 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition">
              <div class="h-48 bg-cover bg-bottom" style="background-image: url('<?php echo $img; ?>/petit-bourgeon.webp')"></div>
              <div class="p-6 flex-1 flex flex-col">
                <div class="text-xs uppercase tracking-widest text-terre-500 mb-1">Régénérescence</div>
                <h4 class="serif text-2xl text-terre-700 mb-2">Petit Bourgeon</h4>
                <p class="text-sm text-terre-600 mb-4 flex-1">
                  Cuvée 2019. Carignan, Lledoner pelut et Muscat petits grains.
                  Un vin de transmission.
                </p>
                <div class="text-xs text-terre-500 italic">Roussillon · Biodynamie</div>
              </div>
            </article>

            <article class="bg-terre-50 border border-terre-200 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition">
              <div class="h-48 bg-cover bg-bottom" style="background-image: url('<?php echo $img; ?>/les-centenaires.webp')"></div>
              <div class="p-6 flex-1 flex flex-col">
                <div class="text-xs uppercase tracking-widest text-terre-500 mb-1">Patrimoine</div>
                <h4 class="serif text-2xl text-terre-700 mb-2">Vieilles Vignes 1900</h4>
                <p class="text-sm text-terre-600 mb-4 flex-1">
                  Issu de Grenache gris et blanc plantés en 1900. Concentration
                  rare, profondeur du terroir des Aspres.
                </p>
                <div class="text-xs text-terre-500 italic">Cuvée parcellaire</div>
              </div>
            </article>
          </div>

          <div class="mt-10 text-center fade-in">
            <a
              href="https://commande.kuupanda.com/producteur/4079/particulier"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center gap-2 bg-terre-600 hover:bg-terre-700 text-terre-50 px-6 py-3 rounded-full transition"
            >
              Découvrir tous nos vins sur Kuupanda
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
          </div>
        </div>

        <!-- HUILE D'OLIVE -->
        <div id="huile" class="scroll-mt-24">
          <div class="grid md:grid-cols-2 gap-10 items-center bg-terre-50 border border-terre-200 rounded-2xl p-8 md:p-12 fade-in">
            <div>
              <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
                Verger méditerranéen
              </p>
              <h3 class="serif text-3xl md:text-4xl text-terre-700 mb-5">
                Notre Huile d'olive
              </h3>
              <p class="leading-relaxed mb-4">
                Issue du verger diversifié méditerranéen mis en place sur le
                domaine — espèces nourricières adaptées à la mouvance
                climatique, conduite en agroécologie.
              </p>
              <p class="leading-relaxed text-terre-600">
                Une huile de domaine, en quantités limitées, dans le même
                respect du vivant que nos vins.
              </p>
              <a
                href="https://commande.kuupanda.com/producteur/4079/particulier"
                target="_blank"
                rel="noopener"
                class="inline-block mt-5 text-sm text-terre-700 hover:text-terre-800"
                >Commander →</a
              >
            </div>
            <div>
              <img
                src="<?php echo $img; ?>/historique.webp"
                alt="Huile d'olive du Domaine du Lendemain"
                class="rounded-lg w-full h-72 md:h-80 object-cover border border-terre-200"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- NOUS RENCONTRER -->
    <section id="rencontrer" class="py-24 px-5 bg-terre-50">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Visites & dégustations
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Nous rencontrer
          </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-10 mb-12">
          <div class="fade-in relative">
            <img
              src="<?php echo $img; ?>/aspres1.webp"
              alt="Visite du Domaine du Lendemain"
              class="rounded-lg w-full h-full max-h-[500px] object-cover border border-terre-200"
            />
          </div>
          <div class="fade-in flex flex-col justify-center">
            <h3 class="serif text-3xl text-terre-700 mb-4">
              Visiter le domaine
            </h3>
            <p class="leading-relaxed mb-6">
              Visite dans les vignes, dégustation de vins biodynamiques au cœur
              des Aspres. Réservation simple et sécurisée via notre partenaire
              Viny'aquí.
            </p>
            <a
              href="https://vinyaqui.com/activities/visite-dans-les-vignes-et-degustation-de-vins-biodynamiques-au-domaine-du-lendemain"
              class="inline-flex items-center justify-center gap-2 bg-terre-600 hover:bg-terre-700 text-terre-50 px-7 py-3 rounded-full transition self-start"
            >
              Réserver une visite sur Viny'aquí
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
          </div>
        </div>

        <!-- CONTACT BLOCK -->
        <div class="grid md:grid-cols-3 gap-6 fade-in">
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 text-center">
            <div class="text-terre-500 text-xs uppercase tracking-widest mb-2">Téléphone</div>
            <a href="tel:+33685820452" class="serif text-2xl text-terre-700 hover:text-terre-800">
              06 85 82 04 52
            </a>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 text-center">
            <div class="text-terre-500 text-xs uppercase tracking-widest mb-2">Email</div>
            <a
              href="mailto:mireilleribiere8@gmail.com"
              class="serif text-xl text-terre-700 hover:text-terre-800 break-all"
            >
              mireilleribiere8@gmail.com
            </a>
          </div>
          <div class="bg-terre-100 border border-terre-200 rounded-lg p-6 text-center">
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

    <!-- PARTENAIRES -->
    <section id="partenaires" class="py-24 px-5 bg-terre-100 grain">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-14 fade-in">
          <p class="uppercase tracking-[0.3em] text-xs text-terre-500 mb-4">
            Réseau & complicités
          </p>
          <h2 class="serif text-4xl md:text-5xl text-terre-700 section-title center inline-block">
            Nos partenaires
          </h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 fade-in">
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              <a href="https://vinyaqui.com/activities/visite-dans-les-vignes-et-degustation-de-vins-biodynamiques-au-domaine-du-lendemain" target="_blank" rel="noopener" class="hover:text-terre-800">Viny'aquí</a>
            </h3>
            <p class="text-sm text-terre-600">Réservations de visites & dégustations</p>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              <a href="https://www.facebook.com/leclandepona/" target="_blank" rel="noopener" class="hover:text-terre-800">Clan d'Épona</a>
            </h3>
            <p class="text-sm text-terre-600">Ressource amendement organique (fumier…)</p>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              <a href="https://raisonance-cosmetiques.fr/" target="_blank" rel="noopener" class="hover:text-terre-800">Raisonance</a>
            </h3>
            <p class="text-sm text-terre-600">Cosmétiques sensoriels issus des marcs de raisins du domaine</p>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              <a href="mailto:amapaspres66@gmail.com" class="hover:text-terre-800">Les Pouces verts des Aspres</a>
            </h3>
            <p class="text-sm text-terre-600">AMAP & événements</p>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              <a href="https://energiecitoyenne66po.wordpress.com/" target="_blank" rel="noopener" class="hover:text-terre-800">Énergie citoyenne</a>
            </h3>
            <p class="text-sm text-terre-600">AMAP</p>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              Le Grain de Raisin
            </h3>
            <p class="text-sm text-terre-600">Atelier de dégustation</p>
          </div>
          <div class="bg-terre-50 border border-terre-200 rounded-lg p-6">
            <h3 class="serif text-xl text-terre-700 mb-2">
              <a href="https://park4night.com/" target="_blank" rel="noopener" class="hover:text-terre-800">park4night</a>
            </h3>
            <p class="text-sm text-terre-600">Stationnement camping-car en pleine nature</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA BOUTIQUE -->
    <section class="py-20 px-5 bg-terre-700 text-terre-50 text-center">
      <div class="max-w-3xl mx-auto fade-in">
        <p class="uppercase tracking-[0.3em] text-xs text-terre-300 mb-4">Boutique</p>
        <h2 class="serif text-4xl md:text-5xl mb-6">Commander nos vins</h2>
        <p class="text-terre-100 mb-8 leading-relaxed">
          Retrouvez l'ensemble de nos cuvées en commande directe sur Kuupanda —
          livraison ou retrait au domaine.
        </p>
        <a
          href="https://commande.kuupanda.com/producteur/4079/particulier"
          target="_blank"
          rel="noopener"
          class="inline-flex items-center gap-2 bg-terre-50 text-terre-800 hover:bg-terre-200 px-8 py-3 rounded-full transition"
        >
          Accéder à la boutique
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
      </div>
    </section>

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

</main>

<?php
get_footer();
