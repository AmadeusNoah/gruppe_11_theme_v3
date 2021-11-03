<?php

function nzscene_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'nz-scene', get_template_directory() . '/library/translation' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'nzscene_scripts_and_styles', 999 );

  // launching this stuff after theme setup
  nzscene_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'nzscene_register_sidebars' );

  // cleaning up excerpt
  add_filter( 'excerpt_more', 'nzscene_excerpt_more' );

  add_image_size( 'nzscene-300x300', 300, 300, true );
  add_image_size( 'nzscene-600x600', 600, 600, true );

} /* end nzscene ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'nzscene_ahoy' );


function nzscene_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'nzscene_content_width', 640 );
}
add_action( 'after_setup_theme', 'nzscene_content_width', 0 );

/************* THUMBNAIL SIZE OPTIONS *************/

add_filter( 'image_size_names_choose', 'nzscene_custom_image_sizes' );
function nzscene_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        '300x300' => __('300px by 300px','nz-scene')
    ) );
}

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function nzscene_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Posts Sidebar', 'nz-scene' ),
    'description' => __( 'The Posts sidebar.', 'nz-scene' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'sidebar2',
    'name' => __( 'Page Sidebar', 'nz-scene' ),
    'description' => __( 'The Page sidebar.', 'nz-scene' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function nzscene_comments( $comment, $args, $depth ) { ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php echo get_avatar( $comment, 60 ); ?>
      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'nz-scene' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'nz-scene' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'nz-scene' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_time(__( 'F jS, Y', 'nz-scene' )); ?></time>
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

add_filter( 'comment_form_defaults', 'nzscene_remove_comment_form_allowed_tags' );
function nzscene_remove_comment_form_allowed_tags( $defaults ) {

  $defaults['comment_notes_after'] = '';
  return $defaults;

}
