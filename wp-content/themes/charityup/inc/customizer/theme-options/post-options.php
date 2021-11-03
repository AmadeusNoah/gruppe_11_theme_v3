<?php

// Post Options
$wp_customize->add_section(
	'charityup_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'charityup' ),
		'panel' => 'charityup_theme_options',
	)
);

// Post Options - Hide Date
$wp_customize->add_setting(
	'charityup_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'charityup' ),
			'section' => 'charityup_post_options',
		)
	)
);

// Post Options - Hide Author
$wp_customize->add_setting(
	'charityup_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'charityup' ),
			'section' => 'charityup_post_options',
		)
	)
);

// Post Options - Hide Category
$wp_customize->add_setting(
	'charityup_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'charityup' ),
			'section' => 'charityup_post_options',
		)
	)
);

// Post Options - Hide Tag
$wp_customize->add_setting(
	'charityup_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'charityup' ),
			'section' => 'charityup_post_options',
		)
	)
);

// Post Options - Related Post Label
$wp_customize->add_setting(
	'charityup_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'charityup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'charityup' ),
		'section'  => 'charityup_post_options',
		'settings' => 'charityup_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts
$wp_customize->add_setting(
	'charityup_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'charityup' ),
			'section' => 'charityup_post_options',
		)
	)
);
