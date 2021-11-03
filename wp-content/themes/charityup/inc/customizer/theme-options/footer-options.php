<?php
// Footer Options
$wp_customize->add_section(
	'charityup_footer_options',
	array(
		'panel' => 'charityup_theme_options',
		'title' => esc_html__( 'Footer Options', 'charityup' ),
	)
);

// Footer Options - Copyright Text
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'charityup' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'charityup_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'charityup' ),
		'section'  => 'charityup_footer_options',
		'settings' => 'charityup_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll to Top
$wp_customize->add_setting(
	'charityup_scroll_to_top',
	array(
		'sanitize_callback' => 'charityup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_scroll_to_top',
		array(
			'label'   => esc_html__( 'Enable Scroll to Top Button', 'charityup' ),
			'section' => 'charityup_footer_options',
		)
	)
);
