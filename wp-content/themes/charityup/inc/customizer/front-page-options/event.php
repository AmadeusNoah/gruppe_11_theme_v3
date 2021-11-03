<?php
// Event Section
$wp_customize->add_section(
	'charityup_event_section',
	array(
		'panel'           => 'charityup_front_page_options',
		'title'           => esc_html__( 'Event Section', 'charityup' ),
	)
);

// Event Section - Enable Section
$wp_customize->add_setting(
	'charityup_enable_event_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'charityup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new CharityUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'charityup_enable_event_section',
		array(
			'label'    => esc_html__( 'Enable Event Section', 'charityup' ),
			'section'  => 'charityup_event_section',
			'settings' => 'charityup_enable_event_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'charityup_enable_event_section',
		array(
			'selector' => '#charityup_event_section .section-link',
			'settings' => 'charityup_enable_event_section',
		)
	);
}



// Event Section - Section Title
$wp_customize->add_setting(
	'charityup_event_title',
	array(
		'default'           => __( 'Upcoming Events', 'charityup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'charityup_event_title',
	array(
		'label'           => esc_html__( 'Section Title', 'charityup' ),
		'section'         => 'charityup_event_section',
		'settings'        => 'charityup_event_title',
		'type'            => 'text',
		'active_callback' => 'charityup_is_event_section_enabled',
	)
);

$wp_customize->add_setting(
	'charityup_event_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'charityup_sanitize_select',
	)
);

$wp_customize->add_control(
	'charityup_event_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'charityup' ),
		'section'         => 'charityup_event_section',
		'settings'        => 'charityup_event_content_type',
		'type'            => 'select',
		'active_callback' => 'charityup_is_event_section_enabled',
		'choices'         => array(
			'page'     => esc_html__( 'Page', 'charityup' ),
			'post'     => esc_html__( 'Post', 'charityup' ),
			'category' => esc_html__( 'Category', 'charityup' ),
		),
	)
);

// List out selected number of fields
$event_count = 3;

for ( $i = 1; $i <= $event_count; $i++ ) {
	// Event Section - Select Post
	$wp_customize->add_setting(
		'charityup_event_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'charityup_event_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'charityup' ) . $i,
			'section'         => 'charityup_event_section',
			'settings'        => 'charityup_event_content_post_' . $i,
			'active_callback' => 'charityup_is_event_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => charityup_get_post_choices(),
		)
	);

	// Event Section - Select Page
	$wp_customize->add_setting(
		'charityup_event_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'charityup_event_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'charityup' ) . $i,
			'section'         => 'charityup_event_section',
			'settings'        => 'charityup_event_content_page_' . $i,
			'active_callback' => 'charityup_is_event_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => charityup_get_page_choices(),
		)
	);

}

// Event Section - Select Category
$wp_customize->add_setting(
	'charityup_event_content_category',
	array(
		'sanitize_callback' => 'charityup_sanitize_select',
	)
);

$wp_customize->add_control(
	'charityup_event_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'charityup' ),
		'section'         => 'charityup_event_section',
		'settings'        => 'charityup_event_content_category',
		'active_callback' => 'charityup_is_event_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => charityup_get_post_cat_choices(),
	)
);

// Event Section - Button Label
$wp_customize->add_setting(
	'charityup_event_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_event_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'charityup' ),
		'section'         => 'charityup_event_section',
		'settings'        => 'charityup_event_button_label',
		'type'            => 'text',
		'active_callback' => 'charityup_is_event_section_enabled',
	)
);



// Event Section - Button Link
$wp_customize->add_setting(
	'charityup_event_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'charityup_event_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'charityup' ),
		'section'         => 'charityup_event_section',
		'settings'        => 'charityup_event_button_link',
		'type'            => 'url',
		'active_callback' => 'charityup_is_event_section_enabled',
	)
);
