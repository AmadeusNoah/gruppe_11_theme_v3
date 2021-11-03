<?php

if ( ! get_theme_mod( 'charityup_enable_event_section', false ) ) {
	return;
}

$content_ids   = array();
$content_count = 3;

$section_class      = 'event ptb';
$section_title      = get_theme_mod( 'charityup_event_title', 'Upcoming Events' );
$content_type       = get_theme_mod( 'charityup_event_content_type', 'page' );
$event_button_label = get_theme_mod( 'charityup_event_button_label' );
if ( ! empty( $event_button_label ) ) {
	$section_class = 'event ptb has-custom-btn';
}
$event_button_link = get_theme_mod( 'charityup_event_button_link' );
$event_button_link = ! empty( $event_button_link ) ? $event_button_link : '#';

if ( in_array( $content_type, array( 'post', 'page' ) ) ) {
	if ( 'post' === $content_type ) {
		for ( $i = 1; $i <= $content_count; $i++ ) {
			$content_ids[] = get_theme_mod( 'charityup_event_content_post_' . $i );
		}
	} else {
		for ( $i = 1; $i <= $content_count; $i++ ) {
			$content_ids[] = get_theme_mod( 'charityup_event_content_page_' . $i );
		}
	}
	$args = array(
		'post_type'           => $content_type,
		'post__in'            => $content_ids,
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( $content_count ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'charityup_event_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( $content_count ),
	);
}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	?>
	<section id="charityup_event_section" class="<?php echo esc_attr( $section_class ); ?>">
		<?php
		if ( is_customize_preview() ) :
			charityup_section_link( 'charityup_event_section' );
		endif;
		?>
		<div class="container">
			<div class="section-title mb-60">
				<h2><?php echo esc_html( $section_title ); ?></h2>
			</div>
			<div class="row">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					$published_date = get_the_date();
					$month          = date( 'M', strtotime( $published_date ) );
					$day            = date( 'd', strtotime( $published_date ) );
					?>
					<div class="col-lg-4 col-md-6">
						<div class="event-inner">
							<figure>
								<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
							</figure>
							<div class="event-content-wrap">
								<div class="date">
									<span><mark><?php echo esc_html( $month ); ?></mark></span>
									<h4><?php echo esc_html( $day ); ?></h4>
								</div>
								<div class="event-content">
									<h5 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<?php if ( ! empty( $event_button_label ) ) : ?>
				<div class="custom-btn">
					<a href="<?php echo esc_url( $event_button_link ); ?>" class="btn btn-transparent"><?php echo esc_html( $event_button_label ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section><!-- .event -->
	<?php
endif;
?>
