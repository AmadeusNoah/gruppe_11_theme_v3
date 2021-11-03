<?php

if ( ! class_exists( 'Give' ) ) {
	return;
}

// Cause Section
$wp_customize->add_section(
	'charityup_cause_section',
	array(
		'panel' => 'charityup_front_page_options',
		'title' => esc_html__( 'Cause Section', 'charityup' ),
	)
);

// Cause Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_cause_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_cause_section',
		array(
			'label'    => esc_html__( 'Enable Cause Section', 'charityup' ),
			'section'  => 'charityup_cause_section',
			'settings' => 'charityup_enable_cause_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_cause_section',
		array(
			'selector' => '#charityup_cause_section .section-link',
			'settings' => 'charityup_enable_cause_section',
		)
	);
}



// Cause Section - Section Title
$wp_customize->add_setting(
	'charityup_cause_title',
	array(
		'default'           => __( 'For What Cause?', 'charityup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_cause_title',
	array(
		'label'           => esc_html__( 'Section Title', 'charityup' ),
		'section'         => 'charityup_cause_section',
		'settings'        => 'charityup_cause_title',
		'type'            => 'text',
		'active_callback' => 'charityup_is_cause_section_enabled',
	)
);

// Cause Section - Number of Posts
$wp_customize->add_setting(
	'charityup_cause_counter',
	array(
		'default'           => 3,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_cause_counter',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'charityup' ),
		'section'         => 'charityup_cause_section',
		'settings'        => 'charityup_cause_counter',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 3,
			'max' => 12,
		),
		'active_callback' => 'charityup_is_cause_section_enabled',
	)
);


// Cause Section - Button Label
$wp_customize->add_setting(
	'charityup_cause_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_cause_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'charityup' ),
		'section'         => 'charityup_cause_section',
		'settings'        => 'charityup_cause_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_cause_section_enabled',
	)
);
