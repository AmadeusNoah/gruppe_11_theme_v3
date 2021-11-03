<?php

if ( ! class_exists( 'Give' ) || ! get_theme_mod( 'charityup_enable_cause_section', false ) ) {
	return;
}

$cause_title        = get_theme_mod( 'charityup_cause_title', __( 'For What Cause?', 'charityup' ) );
$cause_button_label = get_theme_mod( 'charityup_cause_button_label', __( 'Donate Now', 'charityup' ) );
$content_count      = get_theme_mod( 'charityup_cause_counter', 3 );

$args = array(
	'post_type'           => 'give_forms',
	'post_status'         => 'publish',
	'posts_per_page'      => absint( $content_count ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	?>
	<section id="charityup_cause_section" class="causes-panel ptb">
		<?php
		if ( is_customize_preview() ) :
			charityup_section_link( 'charityup_cause_section' );
		endif;
		?>
		<div class="container">
			<?php if ( ! empty( $cause_title ) ) : ?>
				<div class="section-title mb-50">
					<h2><?php echo esc_html( $cause_title ); ?></h2>
				</div>
			<?php endif; ?>
			<div class="causes-carousel">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="slide-item">
						<div class="causes-item">
							<figure>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
							</figure>
							<div class="content">
								<h5><?php the_title(); ?></h5>
								<?php
								$form_id         = get_the_ID();
								$goal_stats      = give_goal_progress_stats( $form_id );
								$goal_option     = get_post_meta( $form_id, '_give_goal_option', true );
								$goal_format     = get_post_meta( $form_id, '_give_goal_format', true );
								$currency_symbol = give_currency_symbol();

								if ( $goal_option == 'enabled' ) {
									if ( $goal_format == 'percentage' ) {
										?>
										<div class="progress">
											<div class="progress-bar" style="width:<?php echo esc_attr( $goal_stats['progress'] ); ?>%">
												<span class="percentage"><?php echo esc_html( $goal_stats['progress'] ); ?>%</span>
											</div>
										</div>
										<?php
									}
									if ( $goal_stats['raw_actual'] || $goal_stats['raw_goal'] ) {
										?>
										<div class="donate-amount">
											<div class="goal">
												<span><?php echo esc_html__( 'Goal', 'charityup' ); ?></span>
												<strong><mark> <?php echo esc_html( $currency_symbol . $goal_stats['raw_goal'] ); ?></mark></strong>
											</div>
											<div class="raised">
												<span><?php echo esc_html__( 'Raised', 'charityup' ); ?></span>
												<strong><mark> <?php echo esc_html( $currency_symbol . $goal_stats['raw_actual'] ); ?></mark></strong>
											</div>
											<div class="to-go">
												<span><?php echo esc_html__( 'To Go', 'charityup' ); ?></span>
												<strong><mark> <?php echo esc_html( $currency_symbol . ( $goal_stats['raw_goal'] - $goal_stats['raw_actual'] ) ); ?></mark></strong>
											</div>
										</div>
										<?php
									}
								}
								?>

								<?php if ( ! empty( $cause_button_label ) ) : ?>
									<div class="custom-btn text-center mt-30">
										<a href="<?php the_permalink(); ?>" class="btn primary-btn"><?php echo esc_html( $cause_button_label ); ?></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section> <!-- .cause-panel -->
	<?php
endif;
?>
