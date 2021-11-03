<?php

if ( ! get_theme_mod( 'charityup_enable_about_section', false ) ) {
	return;
}

$content_id    = $section_content = array();
$content_count = 1;

$content_type = get_theme_mod( 'charityup_about_content_type', 'page' );
if ( in_array( $content_type, array( 'post', 'page' ) ) ) {

	if ( 'post' === $content_type ) {
		$content_id[] = get_theme_mod( 'charityup_about_content_post' );

	} else {
		$content_id[] = get_theme_mod( 'charityup_about_content_page' );
	}
	$args = array(
		'post_type'           => $content_type,
		'post__in'            => $content_id,
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( $content_count ),
		'ignore_sticky_posts' => true,
	);

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			$section_content['id']            = get_the_ID();
			$section_content['title']         = get_the_title();
			$section_content['excerpt']       = get_the_excerpt();
			$section_content['content']       = get_the_content();
			$section_content['permalink']     = get_the_permalink();
			$section_content['thumbnail_url'] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		endwhile;
		wp_reset_postdata();

		$section_content = apply_filters( 'charityup_about_section_content', $section_content );

		charityup_render_about_section( $section_content );
	endif;
}

function charityup_render_about_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	$about_button_label = get_theme_mod( 'charityup_about_button_label' );
	?>
	<section id="charityup_about_section" class="about-panel ptb" style="background-image: url('<?php echo esc_url( $section_content['thumbnail_url'] ); ?>');">
		<?php
		if ( is_customize_preview() ) :
			charityup_section_link( 'charityup_about_section' );
		endif;
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="inner">
						<h2 class="mb-35"><?php echo esc_html( $section_content['title'] ); ?></h2>
						<?php echo esc_html( $section_content['excerpt'] ); ?>
						<?php if ( $about_button_label ) : ?>
							<div class="custom-btn mt-40">
								<a href="<?php echo esc_url( $section_content['permalink'] ); ?>" class="btn btn-more"><?php echo esc_html( $about_button_label ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- .about-panel -->
	<?php
}
?>
