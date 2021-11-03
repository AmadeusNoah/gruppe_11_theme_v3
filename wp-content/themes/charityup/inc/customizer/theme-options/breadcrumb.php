<?php

// Breadcrumb
$wp_customize->add_section(
	'charityup_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'charityup' ),
		'panel' => 'charityup_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb
$wp_customize->add_setting(
	'charityup_enable_breadcrumb',
	array(
		'sanitize_callback' => 'charityup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'charityup' ),
			'section' => 'charityup_breadcrumb',
		)
	)
);

// Breadcrumb - Separator
$wp_customize->add_setting(
	'charityup_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'charityup_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'charityup' ),
		'active_callback' => 'charityup_is_breadcrumb_enabled',
		'section'         => 'charityup_breadcrumb',
	)
);
