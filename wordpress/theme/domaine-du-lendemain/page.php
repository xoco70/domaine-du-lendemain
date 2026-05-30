<?php
/**
 * Gabarit générique des pages internes (mentions légales, RGPD, etc.).
 *
 * Les pages « Visites » utilisent le template dédié (template-visites.php) ;
 * la page d'accueil utilise front-page.php.
 *
 * @package Domaine_du_Lendemain
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main">

		<!-- Décalage sous la barre fixe -->
		<section class="bg-terre-800 text-terre-50 pt-28 pb-16 px-5">
			<div class="max-w-4xl mx-auto text-center">
				<h1 class="serif text-4xl md:text-6xl mb-4"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="text-lg md:text-xl text-terre-200"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</div>
		</section>

		<section class="py-16 px-5 bg-terre-50">
			<div class="max-w-3xl mx-auto">
				<article <?php post_class( 'ddl-prose text-terre-800' ); ?>>
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages :', 'domaine-du-lendemain' ),
							'after'  => '</div>',
						)
					);
					?>
				</article>
			</div>
		</section>

	</main>
	<?php
endwhile;

get_footer();
