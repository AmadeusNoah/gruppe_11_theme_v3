<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charityup
 */

get_header();
$page_title = get_theme_mod( 'charityup_your_latest_posts_title', __( 'Blogs', 'charityup' ) );
?>

	<main id="primary" class="site-main">

		<section class="header-banner" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
			<div class="container">
				<header>
					<h1 class="page-title"><?php echo esc_html( $page_title ); ?></h1>
				</header>
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

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

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
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
