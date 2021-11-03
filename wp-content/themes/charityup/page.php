<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charityup
 */

get_header();

global $post;
?>

	<main id="primary" class="site-main">

		<section class="header-banner" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
			<div class="container">
				<?php do_action( 'charityup_breadcrumb' ); ?>
				<header class="entry-header">
					<h1 class="entry-title"><?php echo esc_html( $post->post_title ); ?></h1>
				</header>
			</div>
		</section>
		
		<div class="container">
			<div class="wrapper">
				<div class="left-side">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
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
