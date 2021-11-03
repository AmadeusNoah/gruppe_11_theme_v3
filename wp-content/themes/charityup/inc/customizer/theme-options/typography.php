<?php
// Typography
$wp_customize->add_section(
	'charityup_typography',
	array(
		'panel' => 'charityup_theme_options',
		'title' => esc_html__( 'Typography', 'charityup' ),
	)
);

$wp_customize->add_setting(
	'charityup_site_title_font',
	array(
		'default'           => 'Montserrat',
		'sanitize_callback' => 'charityup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'charityup_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'charityup' ),
		'section'  => 'charityup_typography',
		'settings' => 'charityup_site_title_font',
		'type'     => 'select',
		'choices'  => charityup_get_all_google_font_families(),
	)
);

$wp_customize->add_setting(
	'charityup_site_description_font',
	array(
		'default'           => 'Montserrat',
		'sanitize_callback' => 'charityup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'charityup_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'charityup' ),
		'section'  => 'charityup_typography',
		'settings' => 'charityup_site_description_font',
		'type'     => 'select',
		'choices'  => charityup_get_all_google_font_families(),
	)
);

$wp_customize->add_setting(
	'charityup_header_font',
	array(
		'default'           => 'Montserrat',
		'sanitize_callback' => 'charityup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'charityup_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'charityup' ),
		'section'  => 'charityup_typography',
		'settings' => 'charityup_header_font',
		'type'     => 'select',
		'choices'  => charityup_get_all_google_font_families(),
	)
);


$wp_customize->add_setting(
	'charityup_body_font',
	array(
		'default'           => 'Montserrat',
		'sanitize_callback' => 'charityup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'charityup_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'charityup' ),
		'section'  => 'charityup_typography',
		'settings' => 'charityup_body_font',
		'type'     => 'select',
		'choices'  => charityup_get_all_google_font_families(),
	)
);
