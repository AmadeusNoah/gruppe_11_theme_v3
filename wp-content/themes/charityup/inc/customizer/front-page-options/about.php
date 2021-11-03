<?php
// About Section
$wp_customize->add_section(
	'charityup_about_section',
	array(
		'panel' => 'charityup_front_page_options',
		'title' => esc_html__( 'About Section', 'charityup' ),
	)
);

// About Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_about_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_about_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'charityup' ),
			'section'  => 'charityup_about_section',
			'settings' => 'charityup_enable_about_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_about_section',
		array(
			'selector' => '#charityup_about_section .section-link',
			'settings' => 'charityup_enable_about_section',
		)
	);
}

// About Section - Content Type
$wp_customize->add_setting(
	'charityup_about_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'charityup_sanitize_select',
	)
);

$wp_customize->add_control(
	'charityup_about_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'charityup' ),
		'section'         => 'charityup_about_section',
		'settings'        => 'charityup_about_content_type',
		'type'            => 'select',
		'active_callback' => 'charityup_is_about_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'charityup' ),
			'post' => esc_html__( 'Post', 'charityup' ),
		),
	)
);

// About Section - Content Type Post
$wp_customize->add_setting(
	'charityup_about_content_post',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_about_content_post',
	array(
		'section'         => 'charityup_about_section',
		'settings'        => 'charityup_about_content_post',
		'label'           => esc_html__( 'Select Post', 'charityup' ),
		'active_callback' => 'charityup_is_about_section_and_content_type_post_enabled',
		'type'            => 'select',
		'choices'         => charityup_get_post_choices(),
	)
);

// About Section - Content Type Page
$wp_customize->add_setting(
	'charityup_about_content_page',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_about_content_page',
	array(
		'label'           => esc_html__( 'Select Page', 'charityup' ),
		'section'         => 'charityup_about_section',
		'settings'        => 'charityup_about_content_page',
		'active_callback' => 'charityup_is_about_section_and_content_type_page_enabled',
		'type'            => 'select',
		'choices'         => charityup_get_page_choices(),
	)
);

// About Section - Button Label
$wp_customize->add_setting(
	'charityup_about_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_about_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'charityup' ),
		'section'         => 'charityup_about_section',
		'settings'        => 'charityup_about_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_about_section_enabled',
	)
);
