<?php

if ( ! get_theme_mod( 'charityup_enable_blog_section', false ) ) {
	return;
}

$blog_count = get_theme_mod( 'charityup_blog_count', 3 );

$content_ids = $section_content = array();

for ( $i = 1; $i <= $blog_count; $i++ ) {
	$content_ids[] = get_theme_mod( 'charityup_blog_content_post_' . $i );
}

$args = array(
	'post_type'           => 'post',
	'post__in'            => $content_ids,
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( $blog_count ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$data['id']            = get_the_ID();
		$data['title']         = get_the_title();
		$data['excerpt']       = get_the_excerpt();
		$data['content']       = get_the_content();
		$data['permalink']     = get_the_permalink();
		$data['thumbnail_url'] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		array_push( $section_content, $data );
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'charityup_blog_section_content', $section_content );

	charityup_render_blog_section( $section_content );
endif;

function charityup_render_blog_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}

	$section_class     = 'news ptb';
	$blog_title        = get_theme_mod( 'charityup_blog_title', 'News and Updates' );
	$blog_button_label = get_theme_mod( 'charityup_blog_button_label' );
	if ( ! empty( $blog_button_label ) ) {
		$section_class = 'news ptb has-custom-btn';
	}
	$blog_button_link   = get_theme_mod( 'charityup_blog_button_link' );
	$blog_button_link   = ! empty( $blog_button_link ) ? $blog_button_link : '#';
	$read_more_btn_text = get_theme_mod( 'charityup_excerpt_more_text', 'Read More' );
	?>
	<section id="charityup_blog_section" class="<?php echo esc_attr( $section_class ); ?>">
		<?php
		if ( is_customize_preview() ) :
			charityup_section_link( 'charityup_blog_section' );
		endif;
		?>
		<div class="container">
			<div class="section-title mb-60">
				<h2><?php echo esc_html( $blog_title ); ?></h2>
			</div>
			<div class="news-carousel">
				<?php
				foreach ( $section_content as $content ) {
					$published_date = get_the_date( '', $content['id'] );
					$month          = date( 'M', strtotime( $published_date ) );
					$day            = date( 'd', strtotime( $published_date ) );
					?>
					<div class="slide-item">
						<div class="inner">
							<figure>
								<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
								<figcaption>
									<?php
									$cause_cat = get_the_category( $content['id'] );
									echo '<span>' . esc_html( $cause_cat[0]->name ) . '</span>';
									?>
								</figcaption>
							</figure>
							<div class="news-content-wrap">
								<div class="date">
									<span class="month"><mark><?php echo esc_html( $month ); ?></mark></span>
									<span class="day"><?php echo esc_html( $day ); ?></span >
								</div>
								<div class="news-content">
									<h3 class="news-title"><?php echo esc_html( $content['title'] ); ?></h3>
									<div class="read-more mt-30">
										<a href="<?php echo esc_url( $content['permalink'] ); ?>"><?php echo esc_html( $read_more_btn_text ); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			
			<?php if ( ! empty( $blog_button_label ) ) : ?>
				<div class="custom-btn">
					<a href="<?php echo esc_url( $blog_button_link ); ?>" class="btn btn-transparent"><?php echo esc_html( $blog_button_label ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section><!-- .news -->
	<?php
}
?>
