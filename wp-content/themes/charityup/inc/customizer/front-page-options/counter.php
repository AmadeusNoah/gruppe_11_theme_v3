<?php
// Counter Section
$wp_customize->add_section(
	'charityup_counter_section',
	array(
		'panel' => 'charityup_front_page_options',
		'title' => esc_html__( 'Counter Section', 'charityup' ),
	)
);

// Counter Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_counter_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_counter_section',
		array(
			'label'    => esc_html__( 'Enable Counter Section', 'charityup' ),
			'section'  => 'charityup_counter_section',
			'settings' => 'charityup_enable_counter_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_counter_section',
		array(
			'selector' => '#charityup_counter_section .section-link',
			'settings' => 'charityup_enable_counter_section',
		)
	);
}


// Counter Section - Number of Counters
$wp_customize->add_setting(
	'charityup_counter_count',
	array(
		'default'           => 4,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_counter_count',
	array(
		'label'           => esc_html__( 'Number of Counters', 'charityup' ),
		'section'         => 'charityup_counter_section',
		'settings'        => 'charityup_counter_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 2,
			'max' => 4,
		),
		'active_callback' => 'charityup_is_counter_section_enabled',
	)
);

// List out selected number of fields
$counter_count = get_theme_mod( 'charityup_counter_count', 4 );

for ( $i = 1; $i <= $counter_count; $i++ ) {

	$wp_customize->add_setting(
		'charityup_counter_icon_' . $i,
		array(
			'sanitize_callback' => 'charityup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'charityup_counter_icon_' . $i,
			array(
				'label'           => esc_html__( 'Icon ', 'charityup' ) . $i,
				'section'         => 'charityup_counter_section',
				'settings'        => 'charityup_counter_icon_' . $i,
				'active_callback' => 'charityup_is_counter_section_enabled',
			)
		)
	);

	$wp_customize->add_setting(
		'charityup_counter_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'charityup_counter_label_' . $i,
		array(
			'label'           => esc_html__( 'Label ', 'charityup' ) . $i,
			'section'         => 'charityup_counter_section',
			'settings'        => 'charityup_counter_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'charityup_is_counter_section_enabled',
		)
	);

	$wp_customize->add_setting(
		'charityup_counter_value_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'charityup_counter_value_' . $i,
		array(
			'label'           => esc_html__( 'Value ', 'charityup' ) . $i,
			'section'         => 'charityup_counter_section',
			'settings'        => 'charityup_counter_value_' . $i,
			'type'            => 'number',
			'input_attrs'     => array( 'min' => 1 ),
			'active_callback' => 'charityup_is_counter_section_enabled',
		)
	);

	$wp_customize->add_setting(
		'charityup_counter_value_suffix_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'charityup_counter_value_suffix_' . $i,
		array(
			'label'           => esc_html__( 'Value Suffix ', 'charityup' ) . $i,
			'section'         => 'charityup_counter_section',
			'settings'        => 'charityup_counter_value_suffix_' . $i,
			'type'            => 'text',
			'active_callback' => 'charityup_is_counter_section_enabled',
		)
	);

}
