<?php

if ( ! get_theme_mod( 'charityup_enable_counter_section', false ) ) {
	return;
}

$counter_count = get_theme_mod( 'charityup_counter_count', 4 );
?>
<section id="charityup_counter_section" class="counter-panel">
	<?php
	if ( is_customize_preview() ) :
		charityup_section_link( 'charityup_counter_section' );
	endif;
	?>
	<div class="container">
		<div id="counter">
			<div class="row">
				<?php
				for ( $i = 1; $i <= $counter_count; $i++ ) :
					$icon         = get_theme_mod( 'charityup_counter_icon_' . $i );
					$label        = get_theme_mod( 'charityup_counter_label_' . $i );
					$value        = get_theme_mod( 'charityup_counter_value_' . $i );
					$value_suffix = get_theme_mod( 'charityup_counter_value_suffix_' . $i );
					?>
					<div class="col-lg-3 col-sm-6">
						<div class="counter-box text-center">
							<?php if ( ! empty( $icon ) ) : ?>
								<img src="<?php echo esc_url( $icon ); ?>" alt="<?php echo esc_attr( $label ); ?>">
							<?php endif; ?>
							<div class="text">
								<span><span class="count" data-count="<?php echo esc_attr( $value ); ?>"></span><?php echo esc_html( $value_suffix ); ?></span>
								<p><?php echo esc_html( $label ); ?></p>
							</div>
						</div>
					</div>
					<?php
				endfor;
				?>
			</div>
		</div>
	</div>
</section> <!-- .counter-panel -->
