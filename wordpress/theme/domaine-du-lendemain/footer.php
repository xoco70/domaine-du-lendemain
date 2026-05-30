<?php
/**
 * Pied de page du thème — repris de la maquette.
 *
 * @package Domaine_du_Lendemain
 */

$home      = home_url( '/' );
$logo      = get_template_directory_uri() . '/assets/img/logo-domaine-du-lendemain.jpg';
$visites   = ddl_visites_url();
$instagram = 'https://www.instagram.com/domainedulendemain/';
$facebook  = 'https://www.facebook.com/domainedulendemainmireilleribiere/?locale=fr_FR';
?>
<footer class="bg-terre-800 text-terre-200 py-12 px-5">
	<div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 items-start">
		<div>
			<div class="flex items-center gap-3 mb-4">
				<img src="<?php echo esc_url( $logo ); ?>" alt="" class="h-12 w-12 rounded-full object-cover border border-terre-600" />
				<span class="serif text-2xl text-terre-50"><?php bloginfo( 'name' ); ?></span>
			</div>
			<p class="text-sm text-terre-300 leading-relaxed"><?php esc_html_e( 'Vins biodynamiques sur le terroir des Aspres — Catalogne Nord.', 'domaine-du-lendemain' ); ?></p>
		</div>
		<div>
			<h4 class="serif text-lg text-terre-50 mb-3"><?php esc_html_e( 'Navigation', 'domaine-du-lendemain' ); ?></h4>
			<ul class="space-y-2 text-sm">
				<li><a href="<?php echo esc_url( $home . '#domaine' ); ?>" class="hover:text-terre-50"><?php esc_html_e( 'Le Domaine', 'domaine-du-lendemain' ); ?></a></li>
				<li><a href="<?php echo esc_url( $home . '#engagements' ); ?>" class="hover:text-terre-50"><?php esc_html_e( 'Nos Engagements', 'domaine-du-lendemain' ); ?></a></li>
				<li><a href="<?php echo esc_url( $home . '#vins' ); ?>" class="hover:text-terre-50"><?php esc_html_e( 'Nos Vins', 'domaine-du-lendemain' ); ?></a></li>
				<li><a href="<?php echo esc_url( $visites ); ?>" class="hover:text-terre-50"><?php esc_html_e( 'Visites', 'domaine-du-lendemain' ); ?></a></li>
				<?php
				foreach ( array( 'mentions-legales', 'politique-confidentialite' ) as $slug ) {
					$page = get_page_by_path( $slug );
					if ( $page ) {
						printf(
							'<li><a href="%1$s" class="hover:text-terre-50">%2$s</a></li>',
							esc_url( get_permalink( $page->ID ) ),
							esc_html( get_the_title( $page->ID ) )
						);
					}
				}
				?>
			</ul>
		</div>
		<div>
			<h4 class="serif text-lg text-terre-50 mb-3"><?php esc_html_e( 'Suivez-nous', 'domaine-du-lendemain' ); ?></h4>
			<p class="text-sm text-terre-300 mb-3"><?php esc_html_e( 'Suivez l\'actualité du domaine.', 'domaine-du-lendemain' ); ?></p>
			<div class="flex gap-4">
				<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram" class="h-10 w-10 rounded-full border border-terre-600 hover:bg-terre-700 flex items-center justify-center transition">
					<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.5.9.4.4.7.9.9 1.5.2.4.4 1 .4 2.2.1 1.2.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.5-.4.4-.9.7-1.5.9-.4.2-1 .4-2.2.4-1.2.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.5-.9-.4-.4-.7-.9-.9-1.5-.2-.4-.4-1-.4-2.2-.1-1.2-.1-1.6-.1-4.8s0-3.6.1-4.8c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.5.4-.4.9-.7 1.5-.9.4-.2 1-.4 2.2-.4 1.2-.1 1.6-.1 4.8-.1zm0 8.1a4.9 4.9 0 100 9.8 4.9 4.9 0 000-9.8zm0 8.1a3.2 3.2 0 110-6.4 3.2 3.2 0 010 6.4zm6.2-8.3a1.1 1.1 0 11-2.2 0 1.1 1.1 0 012.2 0z" /></svg>
				</a>
				<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook" class="h-10 w-10 rounded-full border border-terre-600 hover:bg-terre-700 flex items-center justify-center transition">
					<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.6 9.9v-7H8v-2.9h2.4V9.8c0-2.4 1.4-3.7 3.6-3.7 1 0 2.1.2 2.1.2v2.3h-1.2c-1.2 0-1.5.7-1.5 1.5v1.8H16l-.4 2.9h-2.2v7A10 10 0 0022 12z" /></svg>
				</a>
			</div>
		</div>
	</div>
	<div class="max-w-6xl mx-auto mt-10 pt-6 border-t border-terre-700 text-xs text-terre-400 flex flex-col sm:flex-row justify-between gap-2">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> — Mireille Ribière</p>
		<p><?php esc_html_e( 'Les Aspres · Roussillon · Catalogne Nord', 'domaine-du-lendemain' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
