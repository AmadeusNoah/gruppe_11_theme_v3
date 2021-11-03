<?php 
/**
 * Old styles
 */

add_action( 'wp_enqueue_scripts', 'photography_gridly_enqueue_styles' );
function photography_gridly_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


/**
 * New fonts
 */

function photography_gridly_google_fonts() {

	wp_enqueue_style( 'photography-gridly-google-fonts', '//fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i', false ); 
}
add_action( 'wp_enqueue_scripts', 'photography_gridly_google_fonts' );


/**
 * New Features
 */

function photography_gridly_customize_register( $wp_customize ) {


	/* New Section */
	$wp_customize->add_section( 'navigation_settings', array(
		'title'      => __('Navigation Settings','photography-gridly'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'navigation_logo_col', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_logo_col', array(
		'label'       => __( 'Logo Color', 'photography-gridly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_logo_col',
		) ) );
	$wp_customize->add_setting( 'navigation_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
		'label'       => __( 'Background Color', 'photography-gridly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_background_color',
		) ) );
	$wp_customize->add_setting( 'navigation_text_color', array(
		'default'           => '#c5c5c5',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_text_color', array(
		'label'       => __( 'Link Color', 'photography-gridly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_text_color',
		) ) );
	$wp_customize->add_setting( 'navigation_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_border_color', array(
		'label'       => __( 'Border Color', 'photography-gridly' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_border_color',
		) ) );
}
add_action( 'customize_register', 'photography_gridly_customize_register' );

if(! function_exists('photography_gridly_customizer_css' ) ):
	function photography_gridly_customizer_css(){
		?>
		<style type="text/css">
		.site-title a, .site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
		.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?> !important; }
		.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
		#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
		#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6, #secondary .widget h4 a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
		#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		
		#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		.logo-container .logofont, .super-menu-inner a.logofont { color: <?php echo esc_attr(get_theme_mod( 'navigation_logo_col')); ?>; }
		</style>
		<?php }
		add_action( 'wp_head', 'photography_gridly_customizer_css' );
		endif;