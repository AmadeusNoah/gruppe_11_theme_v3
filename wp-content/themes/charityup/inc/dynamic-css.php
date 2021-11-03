<?php

/**
 * Dynamic CSS
 */
function charityup_dynamic_css() {
	$default_color = charityup_get_default_color();

	$primary_color   = get_theme_mod( 'primary_color', $default_color['primary'] );
	$secondary_color = get_theme_mod( 'secondary_color', $default_color['secondary'] );

	$rgb  = charityup_convert_hex_to_rgb( $primary_color );
	$rgb2 = charityup_convert_hex_to_rgb( $secondary_color );

	$header_font           = get_theme_mod( 'charityup_header_font', 'Montserrat' );
	$body_font             = get_theme_mod( 'charityup_body_font', 'Montserrat' );
	$site_title_font       = get_theme_mod( 'charityup_site_title_font', 'Montserrat' );
	$site_description_font = get_theme_mod( 'charityup_site_description_font', 'Montserrat' );

	$custom_css  = '';
	$custom_css .= '
    /*Color Scheme*/

    .btn-transparent,
    .btn-more:hover,
    .btn-more:focus,
    .social-icons li a,
    nav.breadcrumbs a:hover,
    nav.breadcrumbs a:focus,
    section.causes-panel .causes-item .content .progress .progress-bar span.percentage,
    section.causes-panel .causes-item .content .donate-amount .goal mark,
    section.team .team-info .info h5.team-name,
    section.event .event-inner .event-content-wrap .date mark,
    section.news .inner .news-content-wrap .date mark,
    .read-more a,
    .comments-area .comment article .reply a,
    nav.navigation .nav-links a,
    .entry-meta a,
    .entry-footer a {
    	color: ' . esc_attr( $primary_color ) . ';
    }

    .primary-btn,
    .btn-transparent:hover,
    .btn-transparent:focus,
    button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"],
    .site-header .main-nav .ham-wrap span,
    .slick-dots li.slick-active button,
    section.counter-panel,
    section.team .team-info:hover .team-content,
    section.news .inner .news-content-wrap .date.bg-color,
    footer.site-footer,
    .scroll-top,
    .search-form button,
    aside h2.widget-title:after,
    nav.pagination .nav-links a:hover,
    nav.pagination .nav-links a:focus,
    nav.pagination .nav-links span.current {
    	background-color: ' . esc_attr( $primary_color ) . ';
    }

    .primary-btn,
    .btn-transparent,
    .btn-transparent:hover,
    .btn-transparent:focus,
    button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"],
    .search-form button,
    nav.pagination .nav-links .page-numbers {
    	border-color: ' . esc_attr( $primary_color ) . ';
    }

    a:hover,
    a:focus,
    .read-more a:hover,
    .read-more a:focus,
    .site-header .main-nav .menu li.current-menu-item > a,
    .site-header .main-nav .menu li.current-menu-ancestor > a,
    section.causes-panel .causes-item .content .progress .progress-bar span.percentage,
    section.causes-panel .causes-item .content .donate-amount .raised mark,
    .comments-area .comment article .reply a:hover,
    .comments-area .comment article .reply a:focus,
    nav.navigation .nav-links a:hover,
    nav.navigation .nav-links a:focus,
    nav.breadcrumbs a:hover,
    .entry-meta a:hover,
    .entry-footer a:hover {
    	color: ' . esc_attr( $secondary_color ) . ';
    }

    .primary-btn:hover,
    .primary-btn:focus,
    .search-form button:hover,
    .search-form button:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="reset"]:hover,
    input[type="reset"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    section.causes-panel .causes-item .content .progress .progress-bar,
    section.causes-panel .causes-item .content .progress .progress-bar:before {
    	background-color: ' . esc_attr( $secondary_color ) . ';
    }

    .primary-btn:hover,
    .primary-btn:focus,
    .search-form button:hover,
    .search-form button:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="reset"]:hover,
    input[type="reset"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus {
    	border-color: ' . esc_attr( $secondary_color ) . ';
    }

    .slick-dots li.slick-active button:focus {
        outline: thin dotted ' . esc_attr( $primary_color ) . ';
    }
    
    .btn:focus {
        outline: thin dotted ' . esc_attr( $secondary_color ) . ';
    }

    @media (max-width: 991px) {
        .site-header .main-nav .menu li.menu-item-custom-button a:hover,
        .site-header .main-nav .menu li.menu-item-custom-button a:focus {
            color: ' . esc_attr( $secondary_color ) . ';
        }
    }
    ';

	$custom_css .= '
    /*Fonts*/
    h1, h2, h3, h4, h5, h6 {
    	font-family: ' . esc_attr( $header_font ) . ';
    }

    body,
    button, input, select, optgroup, textarea {
    	font-family: ' . esc_attr( $body_font ) . ';
    }

    .site-title a {
    	font-family: ' . esc_attr( $site_title_font ) . ';
    }

    .site-description {
    	font-family: ' . esc_attr( $site_description_font ) . ';
    }';

	wp_add_inline_style( 'charityup-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'charityup_dynamic_css', 99 );

/**
 * Convert Hex to RGB
 *
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
 * @param  string Hex color
 * @return array RGB color
 */
function charityup_convert_hex_to_rgb( $hex ) {
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );
	return $rgb; // returns an array with the rgb values
}
