<?php
/**
 * Gabarit de repli (blog, archives, recherche).
 *
 * @package Domaine_du_Lendemain
 */

get_header();
?>

<main id="main">

	<section class="bg-terre-800 text-terre-50 pt-28 pb-16 px-5">
		<div class="max-w-4xl mx-auto text-center">
			<h1 class="serif text-4xl md:text-5xl">
				<?php
				if ( is_search() ) {
					/* translators: %s: recherche. */
					printf( esc_html__( 'Résultats pour : %s', 'domaine-du-lendemain' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
				} elseif ( is_archive() ) {
					the_archive_title();
				} else {
					$ddl_title = single_post_title( '', false );
					echo esc_html( $ddl_title ? $ddl_title : __( 'Actualités', 'domaine-du-lendemain' ) );
				}
				?>
			</h1>
		</div>
	</section>

	<section class="py-16 px-5 bg-terre-50">
		<div class="max-w-6xl mx-auto">
			<?php if ( have_posts() ) : ?>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<article class="bg-terre-100 border border-terre-200 rounded-xl overflow-hidden">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" class="block h-48 overflow-hidden"><?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?></a>
							<?php endif; ?>
							<div class="p-6">
								<p class="text-xs uppercase tracking-widest text-terre-500 mb-2"><?php echo esc_html( get_the_date() ); ?></p>
								<h2 class="serif text-xl text-terre-700 mb-2"><a href="<?php the_permalink(); ?>" class="hover:text-terre-800"><?php the_title(); ?></a></h2>
								<p class="text-sm text-terre-600"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
							</div>
						</article>
						<?php
					endwhile;
					?>
				</div>
				<div class="mt-12 text-center ddl-prose"><?php the_posts_pagination(); ?></div>
			<?php else : ?>
				<div class="ddl-prose text-center"><p><?php esc_html_e( 'Aucun contenu pour le moment.', 'domaine-du-lendemain' ); ?></p></div>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php
get_footer();
