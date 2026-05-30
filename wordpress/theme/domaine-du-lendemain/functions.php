<?php
/**
 * Domaine du Lendemain — fonctions du thème.
 *
 * Thème converti depuis la maquette HTML/Tailwind/JS de
 * https://domainedulendemain.com/ (vins biodynamiques en Roussillon).
 *
 * @package Domaine_du_Lendemain
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DDL_VERSION', '1.0.0' );

/* -------------------------------------------------------------------------
 * Réglages du thème
 * ---------------------------------------------------------------------- */
function ddl_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'domaine-du-lendemain' ),
		)
	);
	load_theme_textdomain( 'domaine-du-lendemain', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ddl_setup' );

/* -------------------------------------------------------------------------
 * Styles & scripts
 *
 * La maquette repose sur Tailwind via CDN : on conserve ce fonctionnement
 * pour un rendu strictement identique. La configuration Tailwind (palettes
 * terre / vigne / feuille + polices) est injectée dans le <head>.
 * ---------------------------------------------------------------------- */
function ddl_enqueue_assets() {
	wp_enqueue_style(
		'ddl-fonts',
		'https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300;400;700&family=Raleway:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'ddl-style', get_stylesheet_uri(), array( 'ddl-fonts' ), DDL_VERSION );
	wp_enqueue_script( 'ddl-tailwind', 'https://cdn.tailwindcss.com', array(), null, false );
	wp_enqueue_script( 'ddl-main', get_template_directory_uri() . '/assets/js/main.js', array(), DDL_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ddl_enqueue_assets' );

/**
 * Préconnexion polices.
 */
function ddl_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => '',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'ddl_resource_hints', 10, 2 );

/**
 * Configuration Tailwind (identique à la maquette d'origine).
 */
function ddl_print_tailwind_config() {
	?>
	<script>
		window.tailwind = window.tailwind || {};
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						terre: {
							50: "#faf7f1", 100: "#f1ebe0", 200: "#e7dfd4", 300: "#d4c4b0",
							400: "#b59880", 500: "#9a7758", 600: "#7a5638", 700: "#5a4028",
							800: "#3d2c1c", 900: "#22180f"
						},
						vigne: { 400: "#a8693a", 500: "#8a4f2a", 600: "#6b3b1f" },
						feuille: { 500: "#6b7a4f", 600: "#525e3c" }
					},
					fontFamily: {
						serif: ['"Averia Serif Libre"', "Georgia", "serif"],
						sans: ['"Raleway"', "system-ui", "sans-serif"]
					}
				}
			}
		};
	</script>
	<?php
}
add_action( 'wp_head', 'ddl_print_tailwind_config', 1 );

/**
 * Favicons (repris de la maquette).
 */
function ddl_favicons() {
	$base = get_template_directory_uri() . '/assets/img/favicon';
	if ( ! file_exists( get_template_directory() . '/assets/img/favicon/favicon.svg' ) ) {
		return;
	}
	echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( $base . '/favicon.svg' ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="96x96" href="' . esc_url( $base . '/favicon-96x96.png' ) . '">' . "\n";
	echo '<link rel="shortcut icon" href="' . esc_url( $base . '/favicon.ico' ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $base . '/apple-touch-icon.png' ) . '">' . "\n";
}
add_action( 'wp_head', 'ddl_favicons', 2 );

/* -------------------------------------------------------------------------
 * Liens utilitaires
 * ---------------------------------------------------------------------- */

/**
 * URL de la page « Visites & Dégustations » (ou ancre de repli).
 *
 * @return string
 */
function ddl_visites_url() {
	$page = get_page_by_path( 'visites' );
	return $page ? get_permalink( $page->ID ) : home_url( '/visites/' );
}

/**
 * URL de la boutique en ligne (Kuupanda). Filtrable.
 *
 * @return string
 */
function ddl_boutique_url() {
	return apply_filters( 'ddl_boutique_url', 'https://commande.kuupanda.com/producteur/4079/particulier' );
}

/* -------------------------------------------------------------------------
 * Contact Form 7
 * ---------------------------------------------------------------------- */

/**
 * Enregistre l'option « ddl_cf7_id » + l'expose à l'API REST pour que le
 * script de provisioning puisse y écrire l'identifiant du formulaire.
 */
function ddl_register_settings() {
	register_setting(
		'options',
		'ddl_cf7_id',
		array(
			'type'         => 'integer',
			'description'  => __( 'Identifiant du formulaire Contact Form 7 du site.', 'domaine-du-lendemain' ),
			'default'      => 0,
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'ddl_register_settings' );

/**
 * Identifiant du formulaire CF7 (option, sinon détection automatique).
 *
 * @return int
 */
function ddl_get_cf7_id() {
	$id = (int) get_option( 'ddl_cf7_id' );
	if ( $id ) {
		return $id;
	}
	if ( ! post_type_exists( 'wpcf7_contact_form' ) ) {
		return 0;
	}
	$forms = get_posts(
		array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => 1,
			'orderby'        => 'ID',
			'order'          => 'ASC',
			'fields'         => 'ids',
		)
	);
	return $forms ? (int) $forms[0] : 0;
}

/**
 * Affiche le formulaire de contact : Contact Form 7 si disponible, sinon un
 * repli statique. La variante « claire » s'utilise sur fond clair.
 *
 * @param bool $light Variante claire (fond clair).
 */
function ddl_contact_form( $light = true ) {
	echo '<div class="ddl-contact-form' . ( $light ? ' ddl-contact-form--light' : '' ) . '">';

	$cf7_id = ddl_get_cf7_id();
	if ( $cf7_id && shortcode_exists( 'contact-form-7' ) ) {
		echo do_shortcode( '[contact-form-7 id="' . absint( $cf7_id ) . '"]' );
	} else {
		?>
		<form class="space-y-4" onsubmit="return false;">
			<input type="text" placeholder="<?php esc_attr_e( 'Votre nom', 'domaine-du-lendemain' ); ?>" />
			<input type="email" placeholder="<?php esc_attr_e( 'Votre email', 'domaine-du-lendemain' ); ?>" />
			<textarea rows="4" placeholder="<?php esc_attr_e( 'Votre message', 'domaine-du-lendemain' ); ?>"></textarea>
			<button type="submit" class="wpcf7-submit"><?php esc_html_e( 'Envoyer', 'domaine-du-lendemain' ); ?></button>
		</form>
		<?php
	}

	echo '</div>';
}

/**
 * Google Analytics (identifiant repris de la maquette). Filtrable ; renvoyer
 * une chaîne vide via le filtre pour désactiver le suivi.
 */
function ddl_analytics() {
	$ga_id = apply_filters( 'ddl_ga_id', 'G-6D0EYG8Q0G' );
	if ( ! $ga_id || is_admin() ) {
		return;
	}
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ga_id ); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo esc_js( $ga_id ); ?>');
	</script>
	<?php
}
add_action( 'wp_head', 'ddl_analytics', 20 );
