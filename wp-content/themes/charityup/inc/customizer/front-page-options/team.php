<?php

// Team Section
$wp_customize->add_section(
	'charityup_team_section',
	array(
		'panel' => 'charityup_front_page_options',
		'title' => esc_html__( 'Team Section', 'charityup' ),
	)
);

// Team Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_team_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_team_section',
		array(
			'label'    => esc_html__( 'Enable Team Section', 'charityup' ),
			'section'  => 'charityup_team_section',
			'settings' => 'charityup_enable_team_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_team_section',
		array(
			'selector' => '#charityup_team_section .section-link',
			'settings' => 'charityup_enable_team_section',
		)
	);
}



// Team Section - Section Title
$wp_customize->add_setting(
	'charityup_team_section_title',
	array(
		'default'           => __( 'Our Team', 'charityup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_team_section_title',
	array(
		'label'           => esc_html__( 'Section Title', 'charityup' ),
		'section'         => 'charityup_team_section',
		'settings'        => 'charityup_team_section_title',
		'type'            => 'text',
		'active_callback' => 'charityup_is_team_section_enabled',
	)
);

// Team Section - Content Type
$wp_customize->add_setting(
	'charityup_team_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'charityup_sanitize_select',
	)
);

$wp_customize->add_control(
	'charityup_team_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'charityup' ),
		'section'         => 'charityup_team_section',
		'settings'        => 'charityup_team_content_type',
		'type'            => 'select',
		'active_callback' => 'charityup_is_team_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'charityup' ),
			'post' => esc_html__( 'Post', 'charityup' ),
		),
	)
);

// List out fields
for ( $i = 1; $i <= 3; $i++ ) {
	// Team Section - Select Post
	$wp_customize->add_setting(
		'charityup_team_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'charityup_team_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'charityup' ) . $i,
			'section'         => 'charityup_team_section',
			'settings'        => 'charityup_team_content_post_' . $i,
			'active_callback' => 'charityup_is_team_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => charityup_get_post_choices(),
		)
	);

	// Team Section - Select Page
	$wp_customize->add_setting(
		'charityup_team_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'charityup_team_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'charityup' ) . $i,
			'section'         => 'charityup_team_section',
			'settings'        => 'charityup_team_content_page_' . $i,
			'active_callback' => 'charityup_is_team_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => charityup_get_page_choices(),
		)
	);

	// Team Section - Designation
	$wp_customize->add_setting(
		'charityup_team_position_' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'charityup_team_position_' . $i,
		array(
			'section'         => 'charityup_team_section',
			'settings'        => 'charityup_team_position_' . $i,
			'label'           => esc_html__( 'Designation ', 'charityup' ) . $i,
			'active_callback' => 'charityup_is_team_section_enabled',

		)
	);
}

// Team Section - Button Label
$wp_customize->add_setting(
	'charityup_team_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_team_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'charityup' ),
		'section'         => 'charityup_team_section',
		'settings'        => 'charityup_team_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_team_section_enabled',
	)
);

// Team Section - Button Link
$wp_customize->add_setting(
	'charityup_team_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_team_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'charityup' ),
		'section'         => 'charityup_team_section',
		'settings'        => 'charityup_team_button_link',
		'type'            => 'url',
		'active_callback' => 'charityup_is_team_section_enabled',
	)
);
