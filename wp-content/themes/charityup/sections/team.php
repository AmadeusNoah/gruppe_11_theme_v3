<?php

if ( ! get_theme_mod( 'charityup_enable_team_section', false ) ) {
	return;
}

$content_id    = $designation = $section_content = array();
$content_count = 3;
$content_type  = get_theme_mod( 'charityup_team_content_type', 'page' );

if ( 'post' === $content_type ) {
	for ( $i = 1; $i <= $content_count; $i++ ) {
		$team_id                 = get_theme_mod( 'charityup_team_content_post_' . $i );
		$content_id[]            = $team_id;
		$designation[ $team_id ] = get_theme_mod( 'charityup_team_position_' . $i );
	}
} else {
	for ( $i = 1; $i <= $content_count; $i++ ) {
		$team_id                 = get_theme_mod( 'charityup_team_content_page_' . $i );
		$content_id[]            = $team_id;
		$designation[ $team_id ] = get_theme_mod( 'charityup_team_position_' . $i );
	}
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
		$data['id']            = get_the_ID();
		$data['title']         = get_the_title();
		$data['excerpt']       = get_the_excerpt();
		$data['content']       = get_the_content();
		$data['permalink']     = get_the_permalink();
		$data['thumbnail_url'] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		array_push( $section_content, $data );
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'charityup_team_section_content', $section_content );

	charityup_render_team_section( $section_content, $designation );
endif;

function charityup_render_team_section( $section_content, $designation ) {
	if ( empty( $section_content ) ) {
		return;
	}

	$section_class     = 'team ptb';
	$section_title     = get_theme_mod( 'charityup_team_section_title', 'Our Team' );
	$team_button_label = get_theme_mod( 'charityup_team_button_label' );
	if ( ! empty( $team_button_label ) ) {
		$section_class = 'team ptb has-custom-btn';
	}
	$team_button_link = get_theme_mod( 'charityup_team_button_link' );
	$team_button_link = ! empty( $team_button_link ) ? $team_button_link : '#';
	?>
	<section id="charityup_team_section" class="<?php echo esc_attr( $section_class ); ?>">
		<?php
		if ( is_customize_preview() ) :
			charityup_section_link( 'charityup_team_section' );
		endif;
		?>
		<div class="container">
			<?php if ( ! empty( $section_title ) ) : ?>
				<div class="section-title mb-60">
					<h2><?php echo esc_html( $section_title ); ?></h2>
				</div>
			<?php endif; ?>
			<div class="row">
				<?php
				foreach ( $section_content as $content ) {
					$post_id = $content['id'];
					?>
					<div class="col-lg-4 col-md-6">
						<div class="team-info">
							<figure>
								<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
							</figure>
							<div class="info">
								<h5 class="team-name"><?php echo esc_html( $content['title'] ); ?></h5>
								<p class="team-position"><?php echo esc_html( $designation[ $post_id ] ); ?></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php if ( ! empty( $team_button_label ) ) : ?>
				<div class="custom-btn">
					<a href="<?php echo esc_url( $team_button_link ); ?>" class="btn btn-transparent"><?php echo esc_html( $team_button_label ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section><!-- .team -->
	<?php
}
?>
