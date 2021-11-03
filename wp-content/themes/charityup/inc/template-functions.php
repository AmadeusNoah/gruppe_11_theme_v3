<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package charityup
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function charityup_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = charityup_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'charityup_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function charityup_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'charityup_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function charityup_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'charityup' ) );
	$args    = array( 'numberposts' => -1 );
	$posts   = get_posts( $args );

	foreach ( $posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function charityup_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'charityup' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function charityup_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'charityup' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

if ( ! function_exists( 'charityup_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function charityup_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'charityup_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'charityup_excerpt_length', 999 );

if ( ! function_exists( 'charityup_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function charityup_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'charityup_excerpt_more' );

if ( ! function_exists( 'charityup_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function charityup_sidebar_layout() {
		$sidebar_position      = get_theme_mod( 'charityup_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'charityup_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'charityup_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$sidebar_position = $sidebar_position_post;
		} elseif ( is_page() ) {
			$sidebar_position = $sidebar_position_page;
		}

		return $sidebar_position;
	}
}

if ( ! function_exists( 'charityup_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function charityup_is_sidebar_enabled() {
		$sidebar_position      = get_theme_mod( 'charityup_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'charityup_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'charityup_page_sidebar_position', 'right-sidebar' );

		$sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( $sidebar_position == 'no-sidebar' ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( $sidebar_position == 'no-sidebar' && $sidebar_position_post == 'no-sidebar' ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( $sidebar_position == 'no-sidebar' && $sidebar_position_page == 'no-sidebar' ) {
				$sidebar_enabled = false;
			}
		}
		return $sidebar_enabled;
	}
}

if ( ! function_exists( 'charityup_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function charityup_get_homepage_sections() {
		$sections = array(
			'banner'  => esc_html__( 'Banner Section', 'charityup' ),
			'cause'   => esc_html__( 'Cause Section', 'charityup' ),
			'event'   => esc_html__( 'Event Section', 'charityup' ),
			'about'   => esc_html__( 'About Section', 'charityup' ),
			'counter' => esc_html__( 'Counter Section', 'charityup' ),
			'team'    => esc_html__( 'Team Section', 'charityup' ),
			'blog'    => esc_html__( 'Blog Section', 'charityup' ),
		);
		return $sections;
	}
}

if ( ! function_exists( 'charityup_get_default_color' ) ) {
	/**
	 * Returns default colors.
	 */
	function charityup_get_default_color() {
		$color['primary']   = '#f3c909';
		$color['secondary'] = '#dab408';
		return $color;
	}
}

function charityup_section_link( $section_id ) {
	$section_name      = str_replace( 'charityup_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name, 'charityup' ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

function charityup_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 1;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}
			.section-link-title {
				padding: 0 10px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'charityup_section_link_css' );

/**
 * Styles the header image and text displayed on the blog.
 */
function charityup_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
	// Has the text been hidden?
	if ( ! display_header_text() ) :
		?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
	else :
		?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'charityup_header_style' );

/**
 * Breadcrumb.
 */
function charityup_breadcrumb( $args = array() ) {

	if ( ! get_theme_mod( 'charityup_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'charityup_breadcrumb', 'charityup_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function breadcrumb_trail_print_styles() {

	$breadcrumb_separator = get_theme_mod( 'charityup_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $breadcrumb_separator . '";
		}';

	$style = apply_filters( 'breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n";
	}
}
add_action( 'wp_head', 'breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function charityup_render_posts_pagination() {
	$is_pagination_enabled = get_theme_mod( 'charityup_enable_pagination', true );
	if ( $is_pagination_enabled ) {
		$pagination_type = get_theme_mod( 'charityup_pagination_type', 'default' );
		if ( 'default' === $pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'charityup_posts_pagination', 'charityup_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function charityup_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'charityup_post_navigation', 'charityup_render_post_navigation' );

/**
 * Adds search icon and custom button to primary menu.
 */
function charityup_add_menu_item( $items, $args ) {
	if ( 'primary' === $args->theme_location ) {
		if ( get_theme_mod( 'charityup_enable_search_form', true ) ) {
			$items .= '<li class="menu-item-search"><a href="#" id="search-btn"><i class="fas fa-search"></i></a>
			<div id="search-overlay" class="block">
				<div class="centered">
					<div id="search-box"><a href="#" id="close-btn" class="fa fa-times fa-2x"></a>' . get_search_form( array( 'echo' => false ) ) . '</div>
				</div>
			</div>
			</li>';
		}
		if ( get_theme_mod( 'charityup_enable_custom_button', true ) ) {
			$custom_button_label = get_theme_mod( 'charityup_custom_button_label', 'Donate' );
			$custom_button_link  = get_theme_mod( 'charityup_custom_button_link' );
			$custom_button_link  = ! empty( $custom_button_link ) ? $custom_button_link : '#';
			if ( ! empty( $custom_button_label ) ) {
				$items .= '<li class="menu-item-custom-button"><a href="' . esc_url( $custom_button_link ) . '" class="btn primary-btn">' . esc_html( $custom_button_label ) . '</a></li>';
			}
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'charityup_add_menu_item', 10, 2 );

/**
 * Adds footer copyright text.
 */
function charityup_output_footer_copyright_content() {
	$theme_data        = wp_get_theme();
	$search            = array( '[the-year]', '[site-link]' );
	$replace           = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
	$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'charityup' ), '[the-year]', '[site-link]' );
	$copyright_text    = get_theme_mod( 'charityup_footer_copyright_text', $copyright_default );
	$copyright_text    = str_replace( $search, $replace, $copyright_text );
	$copyright_text   .= esc_html( ' | ' . $theme_data->get( 'Name' ) ) . '&nbsp;' . esc_html__( 'by', 'charityup' ) . '&nbsp;<a target="_blank" href="' . esc_url( $theme_data->get( 'AuthorURI' ) ) . '">' . esc_html( ucwords( $theme_data->get( 'Author' ) ) ) . '</a>';

	$copyright_text .= sprintf( esc_html__( ' | Powered by %s', 'charityup' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'charityup' ) ) . '" target="_blank">WordPress</a>. ' );
	?>
	<div class="copyright">
		<span><?php echo wp_kses_post( $copyright_text ); ?></span>
	</div>
	<?php
}
add_action( 'charityup_footer_copyright', 'charityup_output_footer_copyright_content' );
