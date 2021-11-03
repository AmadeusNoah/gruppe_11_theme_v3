<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package charityup
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses charityup_header_style()
 */
function charityup_custom_header_setup() {
	$args = array(
		'default-image'      => get_parent_theme_file_uri( '/images/header-image.jpg' ),
		'default-text-color' => '000',
		'width'              => 1000,
		'height'             => 250,
		'flex-width'         => true,
		'flex-height'        => true,
	);
	add_theme_support(
		'custom-header',
		apply_filters(
			'charityup_custom_header_args',
			$args
		)
	);

	register_default_headers(
		array(
			'default-image' => array(
				'url'           => '%s/images/header-image.jpg',
				'thumbnail_url' => '%s/images/header-image.jpg',
				'description'   => __( 'Default Header Image', 'charityup' ),
			),
		)
	);
}
add_action( 'after_setup_theme', 'charityup_custom_header_setup' );
