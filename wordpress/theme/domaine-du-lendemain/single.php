<?php
/**
 * Gabarit d'un article.
 *
 * @package Domaine_du_Lendemain
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main">

		<section class="bg-terre-800 text-terre-50 pt-28 pb-16 px-5">
			<div class="max-w-4xl mx-auto text-center">
				<h1 class="serif text-4xl md:text-5xl mb-4"><?php the_title(); ?></h1>
				<p class="text-terre-300 text-sm"><?php echo esc_html( get_the_date() ); ?></p>
			</div>
		</section>

		<section class="py-16 px-5 bg-terre-50">
			<div class="max-w-3xl mx-auto">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="mb-8"><?php the_post_thumbnail( 'large', array( 'class' => 'rounded-lg w-full' ) ); ?></div>
				<?php endif; ?>
				<article <?php post_class( 'ddl-prose text-terre-800' ); ?>>
					<?php the_content(); ?>
				</article>

				<nav class="ddl-prose mt-12 flex justify-between" aria-label="<?php esc_attr_e( 'Navigation des articles', 'domaine-du-lendemain' ); ?>">
					<?php
					previous_post_link( '<span>« %link</span>' );
					next_post_link( '<span>%link »</span>' );
					?>
				</nav>
			</div>
		</section>

	</main>
	<?php
endwhile;

get_footer();
