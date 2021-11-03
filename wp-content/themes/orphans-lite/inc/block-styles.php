<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Orphans Lite 1.0
	 *
	 * @return void
	 */
	function orphans_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'orphans-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'orphans-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'orphans-lite-border',
				'label' => esc_html__( 'Borders', 'orphans-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'orphans-lite-border',
				'label' => esc_html__( 'Borders', 'orphans-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'orphans-lite-border',
				'label' => esc_html__( 'Borders', 'orphans-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'orphans-lite-image-frame',
				'label' => esc_html__( 'Frame', 'orphans-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'orphans-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'orphans-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'orphans-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'orphans-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'orphans-lite-border',
				'label' => esc_html__( 'Borders', 'orphans-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'orphans-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'orphans-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'orphans-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'orphans-lite' ),
			)
		);
	}
	add_action( 'init', 'orphans_lite_register_block_styles' );
}
