<?php

/*******************************************************************
* These are settings for the Theme Customizer in the admin panel.
*******************************************************************/
if ( ! function_exists( 'nzscene_theme_customizer' ) ) :
  function nzscene_theme_customizer( $wp_customize ) {

    /* color scheme option */
    $wp_customize->add_setting( 'nzscene_color_settings', array (
      'default' => '#ff4800',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nzscene_color_settings', array(
      'label'    => __( 'Theme Accent Color 1', 'nz-scene' ),
      'section'  => 'colors',
      'settings' => 'nzscene_color_settings',
    ) ) );

    /* social media option */
    $wp_customize->add_section( 'nzscene_social_section' , array(
      'title'       => __( 'Social Media Icons', 'nz-scene' ),
      'priority'    => 31,
      'description' => __( 'Optional media icons in the header', 'nz-scene' ),
    ) );

    $wp_customize->add_setting( 'nzscene_facebook', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    /* author bio in posts option */
    $wp_customize->add_section( 'nzscene_posts_section' , array(
      'title'       => __( 'Post Settings', 'nz-scene' ),
      'priority'    => 35,
      'description' => '',
    ) );

    $wp_customize->add_setting( 'nzscene_author_area', array (
      'sanitize_callback' => 'nzscene_sanitize_checkbox',
      'default'  => true,
    ) );

    $wp_customize->add_control('author_info', array(
      'settings' => 'nzscene_author_area',
      'label' => __('Disable the Author Information?', 'nz-scene'),
      'section' => 'nzscene_posts_section',
      'type' => 'checkbox',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_facebook', array(
      'label'    => __( 'Enter your Facebook url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_facebook',
      'priority'    => 101,
    ) ) );

    $wp_customize->add_setting( 'nzscene_twitter', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_twitter', array(
      'label'    => __( 'Enter your Twitter url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_twitter',
      'priority'    => 102,
    ) ) );

    $wp_customize->add_setting( 'nzscene_google', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_google', array(
      'label'    => __( 'Enter your Google+ url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_google',
      'priority'    => 103,
    ) ) );

    $wp_customize->add_setting( 'nzscene_pinterest', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_pinterest', array(
      'label'    => __( 'Enter your Pinterest url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_pinterest',
      'priority'    => 104,
    ) ) );

    $wp_customize->add_setting( 'nzscene_linkedin', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_linkedin', array(
      'label'    => __( 'Enter your Linkedin url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_linkedin',
      'priority'    => 105,
    ) ) );

    $wp_customize->add_setting( 'nzscene_youtube', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_youtube', array(
      'label'    => __( 'Enter your Youtube url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_youtube',
      'priority'    => 106,
    ) ) );

    $wp_customize->add_setting( 'nzscene_tumblr', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_tumblr', array(
      'label'    => __( 'Enter your Tumblr url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_tumblr',
      'priority'    => 107,
    ) ) );

    $wp_customize->add_setting( 'nzscene_instagram', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_instagram', array(
      'label'    => __( 'Enter your Instagram url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_instagram',
      'priority'    => 108,
    ) ) );

    $wp_customize->add_setting( 'nzscene_flickr', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_flickr', array(
      'label'    => __( 'Enter your Flickr url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_flickr',
      'priority'    => 109,
    ) ) );

    $wp_customize->add_setting( 'nzscene_vimeo', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_vimeo', array(
      'label'    => __( 'Enter your Vimeo url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_vimeo',
      'priority'    => 110,
    ) ) );

    $wp_customize->add_setting( 'nzscene_rss', array (
      'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_rss', array(
      'label'    => __( 'Enter your RSS url', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_rss',
      'priority'    => 112,
    ) ) );

    $wp_customize->add_setting( 'nzscene_email', array (
      'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nzscene_email', array(
      'label'    => __( 'Enter your email address', 'nz-scene' ),
      'section'  => 'nzscene_social_section',
      'settings' => 'nzscene_email',
      'priority'    => 113,
    ) ) );

    $wp_customize->add_section( 'nzscene_home_banner_setting' , array(
      'title'       => __( 'Disable Homepage Banner', 'nz-scene' ),
      'priority'    => 36,
      'description' => '',
    ) );

    $wp_customize->add_setting( 'nzscene_home_banner', array (
      'sanitize_callback' => 'nzscene_sanitize_checkbox',
    ) );

    $wp_customize->add_control('home_banner', array(
      'settings' => 'nzscene_home_banner',
      'label' => __('Disable Homepage Banner?', 'nz-scene'),
      'section' => 'nzscene_home_banner_setting',
      'type' => 'checkbox',
    ));



  }
endif;
add_action('customize_register', 'nzscene_theme_customizer');

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'nzscene_sanitize_checkbox' ) ) :
  function nzscene_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
      return 1;
    } else {
      return '';
    }
  }
endif;