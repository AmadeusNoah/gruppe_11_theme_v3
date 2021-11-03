<?php

if ( ! get_theme_mod( 'charityup_enable_banner_section', false ) ) {
	return;
}

$content_id   = $subtitle = $btn_label = $btn_link = array();
$content_type = get_theme_mod( 'charityup_banner_content', 'page' );

if ( ! in_array( $content_type, array( 'post', 'page' ) ) ) {
	return;
}

if ( 'post' === $content_type ) {
	$banner_id               = get_theme_mod( 'charityup_banner_content_post' );
	$content_id[]            = $banner_id;
	$subtitle[ $banner_id ]  = get_theme_mod( 'charityup_banner_subtitle' );
	$btn_label[ $banner_id ] = get_theme_mod( 'charityup_banner_button_label' );
	$btn_link[ $banner_id ]  = get_theme_mod( 'charityup_banner_button_link' );
} else {
	$banner_id               = get_theme_mod( 'charityup_banner_content_page' );
	$content_id[]            = $banner_id;
	$subtitle[ $banner_id ]  = get_theme_mod( 'charityup_banner_subtitle' );
	$btn_label[ $banner_id ] = get_theme_mod( 'charityup_banner_button_label' );
	$btn_link[ $banner_id ]  = get_theme_mod( 'charityup_banner_button_link' );
}
?>

<section id="charityup_banner_section">
	<?php
	if ( is_customize_preview() ) :
		charityup_section_link( 'charityup_banner_section' );
	endif;

	$args = array(
		'post_type'      => $content_type,
		'post__in'       => (array) $content_id,
		'orderby'        => 'post__in',
		'posts_per_page' => 1,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		?>
		<div class="home-banner">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$banner_id              = get_the_ID();
				$btn_link[ $banner_id ] = ! empty( $btn_link[ $banner_id ] ) ? $btn_link[ $banner_id ] : get_the_permalink();
				?>
				<div class="bg-img" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
					<div class="container">
						<div class="content-wrap">
							<div class="content">
								<?php
								if ( $subtitle[ $banner_id ] ) :
									echo '<h5>' . esc_html( $subtitle[ $banner_id ] ) . '</h5>';
								endif;
								?>
								<h1><?php echo esc_html( get_the_title() ); ?></h1>

								<?php if ( $btn_label[ $banner_id ] ) : ?>
									<div class="custom-btn mt-55">
										<a href="<?php echo esc_url( $btn_link[ $banner_id ] ); ?>" class="btn primary-btn"><?php echo esc_html( $btn_label[ $banner_id ] ); ?></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div><!-- .home-banner -->
		<?php
	endif;
	?>
</section>
