<?php
// Blog Section
$wp_customize->add_section(
	'charityup_blog_section',
	array(
		'panel' => 'charityup_front_page_options',
		'title' => esc_html__( 'Blog Section', 'charityup' ),
	)
);

// Blog Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'charityup' ),
			'section'  => 'charityup_blog_section',
			'settings' => 'charityup_enable_blog_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_blog_section',
		array(
			'selector' => '#charityup_blog_section .section-link',
			'settings' => 'charityup_enable_blog_section',
		)
	);
}

// Blog Section - Section Title
$wp_customize->add_setting(
	'charityup_blog_title',
	array(
		'default'           => __( 'News And Updates', 'charityup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_blog_title',
	array(
		'label'           => esc_html__( 'Section Title', 'charityup' ),
		'section'         => 'charityup_blog_section',
		'settings'        => 'charityup_blog_title',
		'type'            => 'text',
		'active_callback' => 'charityup_is_blog_section_enabled',
	)
);

// Blog Section - Number of Posts
$wp_customize->add_setting(
	'charityup_blog_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'charityup_blog_count',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'charityup' ),
		'section'         => 'charityup_blog_section',
		'settings'        => 'charityup_blog_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 3,
			'max' => 12,
		),
		'active_callback' => 'charityup_is_blog_section_enabled',
	)
);

// List out selected number of fields
$blog_count = get_theme_mod( 'charityup_blog_count', 3 );

for ( $i = 1; $i <= $blog_count; $i++ ) {
	// Blog Section - Select Post
	$wp_customize->add_setting(
		'charityup_blog_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'charityup_blog_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'charityup' ) . $i,
			'section'         => 'charityup_blog_section',
			'settings'        => 'charityup_blog_content_post_' . $i,
			'type'            => 'select',
			'active_callback' => 'charityup_is_blog_section_enabled',
			'choices'         => charityup_get_post_choices(),
		)
	);

}

// Blog Section - Button Label
$wp_customize->add_setting(
	'charityup_blog_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_blog_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'charityup' ),
		'section'         => 'charityup_blog_section',
		'settings'        => 'charityup_blog_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_blog_section_enabled',
	)
);

// Blog Section - Button Link
$wp_customize->add_setting(
	'charityup_blog_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'charityup_blog_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'charityup' ),
		'section'         => 'charityup_blog_section',
		'settings'        => 'charityup_blog_button_link',
		'type'            => 'url',
		'active_callback' => 'charityup_is_blog_section_enabled',
	)
);
