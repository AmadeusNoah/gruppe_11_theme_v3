<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charityup
 */

get_header();

if ( is_front_page() && is_home() ) {
	require get_template_directory() . '/home.php';
} elseif ( is_front_page() && ! is_home() ) {
	?>
	<main id="primary" class="site-main">
		<?php require get_template_directory() . '/sections/sections.php'; ?>
		<?php charityup_homepage_sections(); ?>
	</main><!-- #main -->
	<?php
}

get_footer();
