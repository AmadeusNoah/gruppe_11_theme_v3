<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php
				if ( 'post' === get_post_type() ) :
					setup_postdata( get_post() );
					?>
					<div class="entry-meta">
						<?php
						$hide_date   = get_theme_mod( 'charityup_post_hide_date', false );
						$hide_author = get_theme_mod( 'charityup_post_hide_author', false );

						if ( ! $hide_date ) {
							charityup_posted_on();
						}
						if ( ! $hide_author ) {
							charityup_posted_by();
						}
						?>
					</div><!-- .entry-meta -->
					<?php
				endif;
				?>
			</div>
		</section>
		
		<div class="container">
			<div class="wrapper">
				<div class="left-side">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single' );

						do_action( 'charityup_post_navigation' );

						$related_posts_label = get_theme_mod( 'charityup_post_related_post_label', __( 'Related Posts', 'charityup' ) );
						$cat_content_id      = get_the_category( $post->ID )[0]->term_id;
						$args                = array(
							'cat'            => $cat_content_id,
							'posts_per_page' => 3,
						);
						$query               = new WP_Query( $args );

						if ( $query->have_posts() ) :
							?>
							<div class="related-posts">
								<?php
								if ( get_theme_mod( 'charityup_post_hide_related_posts', true ) === false ) :
									?>
									<h2><?php echo esc_html( $related_posts_label ); ?></h2>
									<div class="row">
										<?php
										while ( $query->have_posts() ) :
											$query->the_post();
											?>
											<div class="col-lg-4 col-md-6">
												<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
													<?php charityup_post_thumbnail(); ?>
													<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
													<?php the_excerpt(); ?>
												</article>
											</div>
											<?php
										endwhile;
										wp_reset_postdata();
										?>
									</div>
									<?php
								endif;
								?>
							</div>
							<?php
						endif;

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
