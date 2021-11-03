<?php
// Pagination
$wp_customize->add_section(
	'charityup_pagination',
	array(
		'panel' => 'charityup_theme_options',
		'title' => esc_html__( 'Pagination', 'charityup' ),
	)
);

// Pagination - Enable/Disable Pagination
$wp_customize->add_setting(
	'charityup_enable_pagination',
	array(
		'sanitize_callback' => 'charityup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_pagination',
		array(
			'label'   => esc_html__( 'Enable Pagination', 'charityup' ),
			'section' => 'charityup_pagination',
		)
	)
);

// Pagination - Pagination Type
$wp_customize->add_setting(
	'charityup_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'charityup_sanitize_select',
	)
);

$wp_customize->add_control(
	'charityup_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'charityup' ),
		'section'         => 'charityup_pagination',
		'settings'        => 'charityup_pagination_type',
		'active_callback' => 'charityup_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => esc_html__( 'Default (Older/Newer)', 'charityup' ),
			'numeric' => esc_html__( 'Numeric', 'charityup' ),
		),
	)
);
