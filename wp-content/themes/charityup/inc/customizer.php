<?php
/**
 * Theme Customizer
 *
 * @package charityup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

// Sanitize callback
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

function charityup_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'charityup_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'charityup_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section
	$wp_customize->add_section(
		new CharityUp_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'CharityUp Pro', 'charityup' ),
				'button_text'      => __( 'Buy Pro', 'charityup' ),
				'url'              => 'https://ascendoor.com/themes/charityup-pro/',
				'background_color' => '#54c3bb',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Your latest posts title setting
	$wp_customize->add_setting(
		'charityup_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Blogs', 'charityup' ),
		)
	);

	$wp_customize->add_control(
		'charityup_your_latest_posts_title',
		array(
			'section'         => 'static_front_page',
			'label'           => esc_html__( 'Blogs Title:', 'charityup' ),
			'active_callback' => function( $control ) {
				return ( is_front_page() && is_home() );
			},
		)
	);

	// Colors
	require get_template_directory() . '/inc/customizer/colors.php';

	// Theme Options
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options
	require get_template_directory() . '/inc/customizer/front-page-options.php';

}
add_action( 'customize_register', 'charityup_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function charityup_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function charityup_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function charityup_customize_preview_js() {
	wp_enqueue_script( 'charityup-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'customize-preview' ), CHARITYUP_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'charityup_customize_preview_js' );

/**
 * Loads style and script for custom controls.
 */
function charityup_custom_control_scripts() {
	wp_enqueue_style( 'charityup-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'charityup-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'charityup_custom_control_scripts' );
