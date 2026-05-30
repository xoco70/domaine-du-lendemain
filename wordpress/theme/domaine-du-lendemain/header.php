<?php
/**
 * En-tête du thème — reprend la barre de navigation de la maquette.
 *
 * Les ancres pointent vers la page d'accueil (home_url) afin de fonctionner
 * aussi bien depuis l'accueil que depuis les pages internes.
 *
 * @package Domaine_du_Lendemain
 */

$home    = home_url( '/' );
$logo    = get_template_directory_uri() . '/assets/img/logo-domaine-du-lendemain.jpg';
$visites = ddl_visites_url();
$shop    = ddl_boutique_url();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-terre-100 text-terre-800' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Aller au contenu', 'domaine-du-lendemain' ); ?></a>

<!-- NAV -->
<header class="fixed top-0 left-0 right-0 z-50 bg-terre-50/85 backdrop-blur border-b border-terre-200">
	<div class="max-w-6xl mx-auto px-5 py-3 flex items-center justify-between">
		<a href="<?php echo esc_url( $home ); ?>" class="flex items-center gap-3">
			<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-10 w-10 rounded-full object-cover border border-terre-300" />
			<span class="serif text-terre-700 text-xl leading-tight"><?php bloginfo( 'name' ); ?></span>
		</a>

		<nav class="hidden lg:flex items-center gap-7 text-sm tracking-wide text-terre-700" aria-label="<?php esc_attr_e( 'Navigation principale', 'domaine-du-lendemain' ); ?>">
			<a href="<?php echo esc_url( $home . '#domaine' ); ?>" class="nav-link"><?php esc_html_e( 'Le Domaine', 'domaine-du-lendemain' ); ?></a>
			<a href="<?php echo esc_url( $home . '#engagements' ); ?>" class="nav-link"><?php esc_html_e( 'Nos Engagements', 'domaine-du-lendemain' ); ?></a>
			<div class="relative group">
				<button class="nav-link inline-flex items-center gap-1" type="button">
					<?php esc_html_e( 'Nos Produits', 'domaine-du-lendemain' ); ?>
					<svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
				</button>
				<div class="absolute left-0 top-full pt-3 hidden group-hover:block">
					<div class="bg-terre-50 border border-terre-200 rounded-lg shadow-lg py-2 min-w-[220px]">
						<a href="<?php echo esc_url( $home . '#vins' ); ?>" class="block px-5 py-2 hover:bg-terre-100"><?php esc_html_e( 'Nos Vins', 'domaine-du-lendemain' ); ?></a>
						<a href="<?php echo esc_url( $home . '#huile' ); ?>" class="block px-5 py-2 hover:bg-terre-100"><?php esc_html_e( 'Notre Huile d\'olive', 'domaine-du-lendemain' ); ?></a>
					</div>
				</div>
			</div>
			<a href="<?php echo esc_url( $home . '#rencontrer' ); ?>" class="nav-link"><?php esc_html_e( 'Nous Rencontrer', 'domaine-du-lendemain' ); ?></a>
			<a href="<?php echo esc_url( $visites ); ?>" class="nav-link<?php echo is_page( 'visites' ) ? ' is-active' : ''; ?>"><?php esc_html_e( 'Visites', 'domaine-du-lendemain' ); ?></a>
			<a href="<?php echo esc_url( $shop ); ?>" target="_blank" rel="noopener" class="bg-terre-600 hover:bg-terre-700 text-terre-50 px-4 py-2 rounded-full transition"><?php esc_html_e( 'Boutique', 'domaine-du-lendemain' ); ?></a>
		</nav>

		<button id="mobile-toggle" class="lg:hidden text-terre-700" aria-label="<?php esc_attr_e( 'Menu', 'domaine-du-lendemain' ); ?>" aria-expanded="false" aria-controls="mobile-menu">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
			</svg>
		</button>
	</div>

	<div id="mobile-menu" class="hidden lg:hidden bg-terre-50 border-t border-terre-200 px-5 py-4 space-y-3 text-terre-700">
		<a href="<?php echo esc_url( $home . '#domaine' ); ?>" class="block"><?php esc_html_e( 'Le Domaine', 'domaine-du-lendemain' ); ?></a>
		<a href="<?php echo esc_url( $home . '#engagements' ); ?>" class="block"><?php esc_html_e( 'Nos Engagements', 'domaine-du-lendemain' ); ?></a>
		<a href="<?php echo esc_url( $home . '#vins' ); ?>" class="block"><?php esc_html_e( 'Nos Vins', 'domaine-du-lendemain' ); ?></a>
		<a href="<?php echo esc_url( $home . '#huile' ); ?>" class="block"><?php esc_html_e( 'Notre Huile d\'olive', 'domaine-du-lendemain' ); ?></a>
		<a href="<?php echo esc_url( $home . '#rencontrer' ); ?>" class="block"><?php esc_html_e( 'Nous Rencontrer', 'domaine-du-lendemain' ); ?></a>
		<a href="<?php echo esc_url( $visites ); ?>" class="block"><?php esc_html_e( 'Visites', 'domaine-du-lendemain' ); ?></a>
		<a href="<?php echo esc_url( $shop ); ?>" target="_blank" rel="noopener" class="block font-semibold"><?php esc_html_e( 'Boutique en ligne →', 'domaine-du-lendemain' ); ?></a>
	</div>
</header>
