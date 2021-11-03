<?php
/**
 * The Slider for our theme.
 *
 * Display all information related to slider
 *
 * @package Orphans Lite
*/

if (!is_home() && is_front_page()) {

  $orphan_hide_slider = get_theme_mod( 'orphan_hide_slider', '1' );
  if( $orphan_hide_slider == '' ){
    $orphans_lite_pages = array();

    for( $sld=1; $sld<4; $sld++ ) {
      $getsld = absint( get_theme_mod( 'slide'.$sld ) );
      if ( 'page-none-selected' != $getsld ) {
        $orphans_lite_pages[] = $getsld;
      }
    }

    if( !empty( $orphans_lite_pages ) ) :

      $args = array(
        'posts_per_page' => 3,
        'post_type' => 'page',
        'post__in' => $orphans_lite_pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) : 
      $sld = 7;
?>
<div id="theme-slider" class="orphan-slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $orphans_lite_slideno[] = $i;
          $orphans_lite_slidetitle[] = get_the_title();
          $orphans_lite_slidedesc[] = get_the_excerpt();
          $orphans_lite_slidelink[] = esc_url(get_permalink());
          $image_id = get_post_thumbnail_id();
          $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo $image_alt; ?>"/>
          <?php
          $getsld++;
        endwhile;
      ?>
    </div><!-- slider wraper -->
    <?php
      $k = 0;
      foreach( $orphans_lite_slideno as $orphans_lite_sln ){ ?>
      <div id="slidecaption<?php echo esc_attr( $orphans_lite_sln ); ?>" class="nivo-html-caption">
        <div class="inner-caption">
          <h2><a href="<?php echo esc_url($orphans_lite_slidelink[$k] ); ?>"><?php echo esc_html($orphans_lite_slidetitle[$k] ); ?></a></h2>
          <p><?php echo esc_html($orphans_lite_slidedesc[$k] ); ?></p>
          <?php if( !empty( get_theme_mod('slide_more',true) ) ){ ?>
          <a class="sliderbtn" href="<?php echo esc_url($orphans_lite_slidelink[$k] ); ?>">
            <?php echo esc_html(get_theme_mod('slide_more',__('Read More','orphans-lite')));?>
          </a>
          <?php } ?>
        </div><!-- inner caption -->
      </div>
      <?php $k++;
      wp_reset_postdata();
      }
    ?>
  </div><!-- slider -->
</div><!-- orphan slider -->
<?php endif;

    endif;

  }

}