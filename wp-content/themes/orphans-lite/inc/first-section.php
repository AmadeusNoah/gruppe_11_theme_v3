<?php
/**
 * The First Section for our theme.
 *
 * Display all information related to first section
 *
 * @package Orphans Lite
*/

$advhidefsec = get_theme_mod( 'orphan_hide_fsec','1' );

if( $advhidefsec == '' ){
    echo '<section class="first-section"><div class="wrapper">';

        $icnttl = get_theme_mod('orphan_frstsec_ttl','1');
        if( !empty( $icnttl ) ){
          echo '<div class="section_head"><h2 class="section_title">'.$icnttl.'</h2></div>';
        }
        $abtmore = get_theme_mod('fsec_more');
        if( !empty( $abtmore ) ){
          $shwabtmore .= '<a href="'.get_the_permalink().'" class="icon-more">'.$abtmore.'</a>';
        }

        echo '<div class="flexbox">';
            for( $frstsec = 1; $frstsec<5; $frstsec++ ){
                if( get_theme_mod( 'page'.$frstsec,true ) !='' ){
                    $abtsecquery = new WP_Query( array( 'page_id' => get_theme_mod( 'page'.$frstsec ) ) );
                    while( $abtsecquery->have_posts() ) : $abtsecquery->the_post();
                        $shwthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        echo '<div class="box"><div class="icon-box"><div class="inner-icon">';
                            if( has_post_thumbnail() ) {
                              echo '<div class="icon-thumb"><img src="'.$shwthumb[0].'" alt="'.$image_alt.'"/></div><!-- why us thumb -->';
                            }
                            echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3><p>'.get_the_excerpt().'</p>'.$shwabtmore.'';
                        echo '</div></div></div>';
                    endwhile; wp_reset_postdata();
                }
            }
    echo '</div></div></section>';
}