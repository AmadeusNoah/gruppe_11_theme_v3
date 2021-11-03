<?php
// Header Options
$wp_customize->add_section(
	'charityup_header_options',
	array(
		'panel' => 'charityup_theme_options',
		'title' => esc_html__( 'Header Options', 'charityup' ),
	)
);

// Header Options - Enable Custom Button
$wp_customize->add_setting(
	'charityup_enable_custom_button',
	array(
		'sanitize_callback' => 'charityup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_custom_button',
		array(
			'label'   => esc_html__( 'Enable Custom Button', 'charityup' ),
			'section' => 'charityup_header_options',
		)
	)
);

// Header Options - Custom Button Label
$wp_customize->add_setting(
	'charityup_custom_button_label',
	array(
		'default'           => 'Donate',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_custom_button_label',
	array(
		'label'           => esc_html__( 'Custom Button Label', 'charityup' ),
		'section'         => 'charityup_header_options',
		'settings'        => 'charityup_custom_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_custom_button_enabled',
	)
);

// Header Options - Custom Button Link
$wp_customize->add_setting(
	'charityup_custom_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_custom_button_link',
	array(
		'label'           => esc_html__( 'Custom Button Link', 'charityup' ),
		'section'         => 'charityup_header_options',
		'settings'        => 'charityup_custom_button_link',
		'type'            => 'url',
		'active_callback' => 'charityup_is_custom_button_enabled',
	)
);

// Header Options - Enable Search Form
$wp_customize->add_setting(
	'charityup_enable_search_form',
	array(
		'sanitize_callback' => 'charityup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_search_form',
		array(
			'label'   => esc_html__( 'Enable Search Form', 'charityup' ),
			'section' => 'charityup_header_options',
		)
	)
);
