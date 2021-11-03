<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package charityup
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="header-banner" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'charityup' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
			</div>
		</section>
		<div class="container">
			<div class="wrapper">
				<div class="left-side">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						do_action( 'charityup_posts_pagination' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<?php if ( charityup_is_sidebar_enabled() ) : ?>
					<div class="right-side">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
