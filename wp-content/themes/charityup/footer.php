<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package charityup
 */

?>

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
			<div class="top-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="gallery-box">
								<?php dynamic_sidebar( 'footer-widget-1' ); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="box">
								<?php dynamic_sidebar( 'footer-widget-2' ); ?>
							</div>
						</div>
						<div class="col-lg-2 col-md-6">
							<div class="box">
								<?php dynamic_sidebar( 'footer-widget-3' ); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="box">
								<?php dynamic_sidebar( 'footer-widget-4' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="bottom-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 order-lg-1 order-12">
						<?php
						/**
						 * charityup_footer_copyright hook.
						 *
						 * @hooked - charityup_output_footer_copyright_content - 10
						 */
						do_action( 'charityup_footer_copyright' );
						?>
					</div>
					<div class="col-lg-3 order-lg-12 order-1">
						<?php
						if ( has_nav_menu( 'social' ) ) {
							wp_nav_menu(
								array(
									'menu_class'     => 'menu social-icons',
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
									'theme_location' => 'social',
								)
							);
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
		$is_scroll_top_active = get_theme_mod( 'charityup_scroll_to_top', true );
		if ( $is_scroll_top_active ) :
			?>
			<a href="#" id="back-top" class="scroll-top">
				<span class="content">
					<i class="fas fa-chevron-up"></i>
				</span>
			</a>
			<?php
		endif;
		?>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
