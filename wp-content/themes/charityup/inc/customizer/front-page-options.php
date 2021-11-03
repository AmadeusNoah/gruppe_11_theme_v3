<?php

// Frontpage Panel
$wp_customize->add_panel(
	'charityup_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'charityup' ),
		'priority' => 130,
	)
);

// Banner Section
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// Causes Section
require get_template_directory() . '/inc/customizer/front-page-options/cause.php';

// Events Section
require get_template_directory() . '/inc/customizer/front-page-options/event.php';

// About Section
require get_template_directory() . '/inc/customizer/front-page-options/about.php';

// Counter Section
require get_template_directory() . '/inc/customizer/front-page-options/counter.php';

// Team Section
require get_template_directory() . '/inc/customizer/front-page-options/team.php';

// Blog Section
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';
