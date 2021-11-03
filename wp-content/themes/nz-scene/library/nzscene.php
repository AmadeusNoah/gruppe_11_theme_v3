<?php
/* Welcome to nzscene */


// loading modernizr and jquery, and reply script
function nzscene_scripts_and_styles() {

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '' );

	wp_enqueue_style( 'google-font-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,900' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		  wp_enqueue_script( 'comment-reply' );
    }

	wp_enqueue_script( 'jquery-modernizr', get_template_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

	wp_enqueue_script( 'nzscene-js' , get_template_directory_uri() . '/library/js/scripts.js', array( 'jquery', 'jquery-effects-core', 'jquery-effects-slide' ), '', true );
}
/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function nzscene_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );
	add_editor_style();
	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => 'fafafa',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'video',           // video
			'audio',
			'quote'
		)
	);

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'nz-scene' ),   // main nav in header
			/*'footer-links' => __( 'Footer Links', 'nz-scene' ) // secondary nav in footer*/
		)
	);

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo' );
	
} /* end nzscene theme support */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// This removes the annoying […] to a Read More link
function nzscene_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. esc_url( get_permalink($post->ID) ) . '" title="'. __( 'Read ', 'nz-scene' ) . esc_html( get_the_title($post->ID) ).'">'. __( 'Read more &raquo;', 'nz-scene' ) .'</a>';
}

function nzscene_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'nzscene_excerpt_length', 999 );