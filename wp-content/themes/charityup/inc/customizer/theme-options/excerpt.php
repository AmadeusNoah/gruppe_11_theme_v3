<?php
// Excerpt
$wp_customize->add_section(
	'charityup_excerpt_options',
	array(
		'panel' => 'charityup_theme_options',
		'title' => esc_html__( 'Excerpt', 'charityup' ),
	)
);

// Excerpt - Excerpt Length
$wp_customize->add_setting(
	'charityup_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'charityup' ),
		'section'     => 'charityup_excerpt_options',
		'settings'    => 'charityup_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Excerpt - Read More Text
$wp_customize->add_setting(
	'charityup_excerpt_more_text',
	array(
		'default'           => esc_html__( 'Read More', 'charityup' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_excerpt_more_text',
	array(
		'label'    => esc_html__( 'Read More Text', 'charityup' ),
		'section'  => 'charityup_excerpt_options',
		'settings' => 'charityup_excerpt_more_text',
		'type'     => 'text',
	)
);
