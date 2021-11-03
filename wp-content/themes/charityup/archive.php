<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charityup
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="header-banner" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
			<div class="container">
				<?php do_action( 'charityup_breadcrumb' ); ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			</div>
		</section>
		<div class="container">
			<div class="wrapper">
				<div class="left-side">
					<?php if ( have_posts() ) : ?>


						<?php
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
