<?php
/**
 * Orphans Lite Theme Customizer
 *
 * @package Orphans Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function orphans_lite_customize_register( $wp_customize ) {
	
	function orphans_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	$wp_customize->get_setting( 'blogname' )->tranport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->tranport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => 'h1.site-title',
	    'render_callback' => 'orphans_lite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => 'p.site-description',
	    'render_callback' => 'orphans_lite_customize_partial_blogdescription',
	) );

	/***************************************
	** Color Scheme
	***************************************/
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#f96167',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','orphans-lite'),
			'description' => __('Select color from here.','orphans-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	$wp_customize->add_setting('orphan_headerbg_color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'orphan_headerbg_color',array(
			'label' => __('Header Background color','orphans-lite'),
			'description'	=> __('Select background color for header.','orphans-lite'),
			'section' => 'colors',
			'settings' => 'orphan_headerbg_color'
		))
	);

	$wp_customize->add_setting('orphan_footer_color', array(
		'default' => '#03080e',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'orphan_footer_color',array(
			'label' => __('Footer Background Color','orphans-lite'),
			'description' => __('Select background color for footer.','orphans-lite'),
			'section' => 'colors',
			'settings' => 'orphan_footer_color'
		))
	);

	/***************************************
	** Top Header
	***************************************/
	$wp_customize->add_section(
        'orphan_tphead_info',
        array(
            'title' => __('Setup Header Top', 'orphans-lite'),
            'priority' => null,
			'description'	=> __('Add information to header top here','orphans-lite'),	
        )
    );
	
	$wp_customize->add_setting('orphan_head_scllbl',array(
			'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	
	$wp_customize->add_control('orphan_head_scllbl',array(
			'type'	=> 'text',
			'label'	=> __('Add Social Media label','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_head_fb',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('orphan_head_fb',array(
			'type'	=> 'url',
			'label'	=> __('Add Facebook link here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_head_tw',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('orphan_head_tw',array(
			'type'	=> 'url',
			'label'	=> __('Add Twitter link here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_head_yt',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('orphan_head_yt',array(
			'type'	=> 'url',
			'label'	=> __('Add Youtube link here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_head_in',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('orphan_head_in',array(
			'type'	=> 'url',
			'label'	=> __('Add Linkedin link here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_head_pin',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('orphan_head_pin',array(
			'type'	=> 'url',
			'label'	=> __('Add Pinterest link here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));
	
	$wp_customize->add_setting('orphan_head_add',array(
			'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	
	$wp_customize->add_control('orphan_head_add',array(
			'type'	=> 'text',
			'label'	=> __('Add Address here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_head_mail',array(
			'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	
	$wp_customize->add_control('orphan_head_mail',array(
			'type'	=> 'text',
			'label'	=> __('Add Email Address here.','orphans-lite'),
			'section'	=> 'orphan_tphead_info'
	));

	$wp_customize->add_setting('orphan_tphead_hide',array(
			'default' => true,
			'sanitize_callback' => 'orphans_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'orphan_tphead_hide', array(
		   'settings' => 'orphan_tphead_hide',
    	   'section'   => 'orphan_tphead_info',
    	   'label'     => __('Check this to hide Top Header.','orphans-lite'),
    	   'type'      => 'checkbox'
     ));
	 
	/***************************************
	** Header Button
	***************************************/
	$wp_customize->add_section(
        'orphan_head_btn',
        array(
            'title' => __('Setup Header Button', 'orphans-lite'),
            'priority' => null,
			'description'	=> __('Add text and link for header button','orphans-lite'),	
        )
    );
	
	$wp_customize->add_setting('orphan_headbtn_lbl',array(
			'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	
	$wp_customize->add_control('orphan_headbtn_lbl',array(
			'type'	=> 'text',
			'label'	=> __('Add header button text here','orphans-lite'),
			'section'	=> 'orphan_head_btn'
	));

	$wp_customize->add_setting('orphan_headbtn_link',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('orphan_headbtn_link',array(
			'type'	=> 'url',
			'label'	=> __('Add header button link here.','orphans-lite'),
			'section'	=> 'orphan_head_btn'
	));

	/***************************************
	** Slider Section
	***************************************/
	$wp_customize->add_section(
        'orphan_slider_section',
        array(
            'title' => __('Setup Theme Slider', 'orphans-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1600x900). Slider will work only when you select the static front page.','orphans-lite'),	
        )
    );

    $wp_customize->add_setting('slide1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('slide1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','orphans-lite'),
			'section'	=> 'orphan_slider_section'
	));

	$wp_customize->add_setting('slide2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('slide2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','orphans-lite'),
			'section'	=> 'orphan_slider_section'
	));

	$wp_customize->add_setting('slide3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('slide3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','orphans-lite'),
			'section'	=> 'orphan_slider_section'
	));

	$wp_customize->add_setting('slide_more',array(
		'default'	=> __('Read More','orphans-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_more',array(
		'label'	=> __('Add slider link button text.','orphans-lite'),
		'section'	=> 'orphan_slider_section',
		'setting'	=> 'slide_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('orphan_hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'orphans_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'orphan_hide_slider', array(
	   'settings' => 'orphan_hide_slider',
	   'section'   => 'orphan_slider_section',
	   'label'     => __('Check this to hide slider.','orphans-lite'),
	   'type'      => 'checkbox'
    ));

    /***************************************
	** First Section
	***************************************/
	$wp_customize->add_section(
        'orphan_frsec_section',
        array(
            'title' => __('Setup First Section', 'orphans-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage fisrt section. This section will be displayed only when you select the static front page.','orphans-lite'),	
        )
    );

    $wp_customize->add_setting('orphan_frstsec_ttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('orphan_frstsec_ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add Section Title Here','orphans-lite'),
		'section'	=> 'orphan_frsec_section'
	));

    $wp_customize->add_setting('page1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first column','orphans-lite'),
		'section'	=> 'orphan_frsec_section'
	));

	$wp_customize->add_setting('page2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second column','orphans-lite'),
		'section'	=> 'orphan_frsec_section'
	));

	$wp_customize->add_setting('page3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third column','orphans-lite'),
		'section'	=> 'orphan_frsec_section'
	));
	
	$wp_customize->add_setting('page4',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page4',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for fourth column','orphans-lite'),
		'section'	=> 'orphan_frsec_section'
	));

	$wp_customize->add_setting('fsec_more',array(
		'default'	=> __('Read More','orphans-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('fsec_more',array(
		'label'	=> __('Add read more button text.','orphans-lite'),
		'section'	=> 'orphan_frsec_section',
		'setting'	=> 'fsec_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('orphan_hide_fsec',array(
		'default' => true,
		'sanitize_callback' => 'orphans_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'orphan_hide_fsec', array(
	   'settings' => 'orphan_hide_fsec',
	   'section'   => 'orphan_frsec_section',
	   'label'     => __('Check this to hide first section.','orphans-lite'),
	   'type'      => 'checkbox'
    ));

    /***************************************
	** First Section
	***************************************/
	$wp_customize->add_section(
        'orphan_abt_section',
        array(
            'title' => __('Setup Second Section', 'orphans-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage second section. This section will be displayed only when you select the static front page.','orphans-lite'),	
        )
    );

    $wp_customize->add_setting('about_sec',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('about_sec',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for this section','orphans-lite'),
		'section'	=> 'orphan_abt_section'
	));

	$wp_customize->add_setting('about_more',array(
		'default'	=> __('Read More','orphans-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_more',array(
		'label'	=> __('Add read more button text.','orphans-lite'),
		'section'	=> 'orphan_abt_section',
		'setting'	=> 'about_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('orphan_hide_about',array(
		'default' => true,
		'sanitize_callback' => 'orphans_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'orphan_hide_about', array(
	   'settings' => 'orphan_hide_about',
	   'section'   => 'orphan_abt_section',
	   'label'     => __('Check this to hide second section.','orphans-lite'),
	   'type'      => 'checkbox'
    ));
}
add_action( 'customize_register', 'orphans_lite_customize_register' );

function orphans_lite_css_func(){ ?>
<style>
	a,
	.tm_client strong,
	.postmeta a:hover,
	#sidebar ul li a:hover,
	.blog-post h3.entry-title,
	a.blog-more:hover,
	#commentform input#submit,
	input.search-submit,
	.blog-date .date,
	h2.section_title,
	.sitenav ul li.current_page_item a,
	.sitenav ul li a:hover, 
	.sitenav ul li.current_page_item ul li a:hover{
		color:<?php echo esc_attr(get_theme_mod('color_scheme','#f96167'));?>;
	}
	h3.widget-title,
	.nav-links .current,
	.nav-links a:hover,
	p.form-submit input[type="submit"],
	.top-header,
	.header-btn a:hover,
	.orphan-slider .inner-caption .sliderbtn,
	.icon-box .icon-more,
	.icon-box:after,
	.read-more,
	.nivo-controlNav a{
		background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f96167'));?>;
	}
	#header,
	.sitenav ul li.menu-item-has-children:hover > ul,
	.sitenav ul li.menu-item-has-children:focus > ul,
	.sitenav ul li.menu-item-has-children.focus > ul{
		background-color:<?php echo esc_attr(get_theme_mod('orphan_headerbg_color','#ffffff'));?>;
	}
	.copyright-wrapper{
		background-color:<?php echo esc_attr(get_theme_mod('orphan_footer_color','#03080e'));?>;
	}
</style>
<?php }
add_action('wp_head','orphans_lite_css_func');

function orphans_lite_customize_preview_js() {
	wp_enqueue_script( 'orphans-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'orphans_lite_customize_preview_js' );