<?php

// Sidebar Option
$wp_customize->add_section(
	'charityup_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'charityup' ),
		'panel' => 'charityup_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position
$wp_customize->add_setting(
	'charityup_sidebar_position',
	array(
		'sanitize_callback' => 'charityup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'charityup_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'charityup' ),
		'section' => 'charityup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'charityup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'charityup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'charityup' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position
$wp_customize->add_setting(
	'charityup_post_sidebar_position',
	array(
		'sanitize_callback' => 'charityup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'charityup_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'charityup' ),
		'section' => 'charityup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'charityup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'charityup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'charityup' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position
$wp_customize->add_setting(
	'charityup_page_sidebar_position',
	array(
		'sanitize_callback' => 'charityup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'charityup_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'charityup' ),
		'section' => 'charityup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'charityup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'charityup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'charityup' ),
		),
	)
);
