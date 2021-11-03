<?php
// Banner Section
$wp_customize->add_section(
	'charityup_banner_section',
	array(
		'panel' => 'charityup_front_page_options',
		'title' => esc_html__( 'Banner Section', 'charityup' ),
	)
);

// Banner Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'charityup' ),
			'section'  => 'charityup_banner_section',
			'settings' => 'charityup_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_banner_section',
		array(
			'selector' => '#charityup_banner_section .section-link',
			'settings' => 'charityup_enable_banner_section',
		)
	);
}

// Banner Section - Content Type
$wp_customize->add_setting(
	'charityup_banner_content',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'charityup_sanitize_select',
	)
);

$wp_customize->add_control(
	'charityup_banner_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'charityup' ),
		'section'         => 'charityup_banner_section',
		'settings'        => 'charityup_banner_content',
		'type'            => 'select',
		'active_callback' => 'charityup_is_banner_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'charityup' ),
			'post' => esc_html__( 'Post', 'charityup' ),
		),
	)
);

// Banner Section - Subtitle
$wp_customize->add_setting(
	'charityup_banner_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_banner_subtitle',
	array(
		'label'           => esc_html__( 'Subtitle ', 'charityup' ),
		'section'         => 'charityup_banner_section',
		'settings'        => 'charityup_banner_subtitle',
		'type'            => 'text',
		'active_callback' => 'charityup_is_banner_section_enabled',
	)
);

// Banner Section - Content Type Post
$wp_customize->add_setting(
	'charityup_banner_content_post',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_banner_content_post',
	array(
		'label'           => esc_html__( 'Select Post ', 'charityup' ),
		'section'         => 'charityup_banner_section',
		'settings'        => 'charityup_banner_content_post',
		'active_callback' => 'charityup_is_banner_section_and_content_type_post_enabled',
		'type'            => 'select',
		'choices'         => charityup_get_post_choices(),
	)
);

// Banner Section - Content Type Page
$wp_customize->add_setting(
	'charityup_banner_content_page',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_banner_content_page',
	array(
		'label'           => esc_html__( 'Select Page ', 'charityup' ),
		'section'         => 'charityup_banner_section',
		'settings'        => 'charityup_banner_content_page',
		'active_callback' => 'charityup_is_banner_section_and_content_type_page_enabled',
		'type'            => 'select',
		'choices'         => charityup_get_page_choices(),
	)
);

// Banner Section - Button Label
$wp_customize->add_setting(
	'charityup_banner_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_banner_button_label',
	array(
		'label'           => esc_html__( 'Button Label ', 'charityup' ),
		'section'         => 'charityup_banner_section',
		'settings'        => 'charityup_banner_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_banner_section_enabled',
	)
);

// Banner Section - Button Link
$wp_customize->add_setting(
	'charityup_banner_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_banner_button_link',
	array(
		'label'           => esc_html__( 'Button Link ', 'charityup' ),
		'section'         => 'charityup_banner_section',
		'settings'        => 'charityup_banner_button_link',
		'type'            => 'url',
		'active_callback' => 'charityup_is_banner_section_enabled',
	)
);
