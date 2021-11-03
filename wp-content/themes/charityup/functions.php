<?php
/**
 * CharityUp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package charityup
 */

if ( ! defined( 'CHARITYUP_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CHARITYUP_THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'charityup_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function charityup_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CharityUp, use a find and replace
		 * to change 'charityup' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'charityup', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'charityup' ),
				'social'  => esc_html__( 'Social', 'charityup' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'charityup_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'charityup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function charityup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'charityup_content_width', 640 );
}
add_action( 'after_setup_theme', 'charityup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function charityup_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'charityup' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'charityup' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Register 4 footer widgets.
	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget ', 'charityup' ) . $i,
				'id'            => 'footer-widget-' . $i,
				'description'   => esc_html__( 'Add widgets here.', 'charityup' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
		);
	}
}
add_action( 'widgets_init', 'charityup_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function charityup_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Bootstrap.
	wp_enqueue_style( 'charityup-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap' . $min . '.css' );

	// Fontawesome.
	wp_enqueue_style( 'charityup-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome' . $min . '.css' );
	wp_enqueue_style( 'charityup-fontawesome-solid', get_template_directory_uri() . '/assets/css/solid.css' );
	wp_enqueue_style( 'charityup-fontawesome-brand', get_template_directory_uri() . '/assets/css/brands.css' );

	// Slick.
	wp_enqueue_style( 'charityup-slick', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'charityup-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css' );

	// Google fonts.
	wp_enqueue_style( 'charityup-google-fonts', charityup_get_fonts_url(), array(), null );

	// Main style.
	wp_enqueue_style( 'charityup-style', get_stylesheet_uri(), array(), CHARITYUP_THEME_VERSION );

	// Navigation.
	wp_enqueue_script( 'charityup-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), CHARITYUP_THEME_VERSION, true );

	// Bootstrap script.
	wp_enqueue_script( 'charityup-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap' . $min . '.js', array( 'jquery' ), CHARITYUP_THEME_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'charityup-slick-script', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array( 'jquery' ), CHARITYUP_THEME_VERSION, true );

	// Main script.
	wp_enqueue_script( 'charityup-main-script', get_template_directory_uri() . '/assets/js/main' . $min . '.js', array( 'jquery' ), CHARITYUP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'charityup_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/inc/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Recommended Plugins
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * One Click Demo Import after import setup.
 */
require get_template_directory() . '/inc/ocdi.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
