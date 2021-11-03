<?php
/**
 * The Second Section for our theme.
 *
 * Display all information related to Second section
 *
 * @package Orphans Lite
*/

$orphan_hide_about = get_theme_mod('orphan_hide_about', '1');

if($orphan_hide_about  == '') {
    if(get_theme_mod('about_more',true) != '' ) {

        $orphanabtmore = get_theme_mod('about_more');
        if( !empty( $orphanabtmore ) ){
          $shworphanabtmore .= '<a href="'.get_the_permalink().'" class="read-more">'.$orphanabtmore.'</a>';
        }

        echo '<section class="aboutus"><div class="wrapper"><div class="flexbox">';
        if(get_theme_mod('about_sec') != '') {
            $about_query = new WP_Query(array('page_id' => get_theme_mod('about_sec')));

            while( $about_query->have_posts() ) : $about_query->the_post();
                echo '<div class="box">';
                    if( has_post_thumbnail() ) {
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
                        $url = $src[0];
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                      echo '<div class="thumb"><img src="'.$url.'" alt="'.$image_alt.'"></div><!-- thumb -->';
                    }
                echo '</div><div class="box"><div class="about-content"><div class="section_head"><h2 class="section_title">'.get_the_title().'</h2></div><p>'.get_the_excerpt().'</p>'.$shworphanabtmore.'</div></div>';
            endwhile;
        }
        echo '</div></div></section>';
    }
}