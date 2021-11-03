<?php

$default_color = charityup_get_default_color();

// Primary Color
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => $default_color['primary'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'charityup' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);

// Secondary Color
$wp_customize->add_setting(
	'secondary_color',
	array(
		'default'           => $default_color['secondary'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'secondary_color',
		array(
			'label'    => __( 'Secondary Color', 'charityup' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);