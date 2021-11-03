<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package charityup
 */

get_header();
?>
	<main id="primary" class="site-main">
		<div class="container">
			<div class="wrapper">
				<section class="error-404 text-center w-100">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'charityup' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'charityup' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();
