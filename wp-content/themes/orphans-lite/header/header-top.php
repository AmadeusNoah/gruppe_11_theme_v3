<?php
/**
 * The Top Bar for our theme.
 *
 * Display all information related to top bar
 *
 * @package Orphans Lite
 */

$orphtphead = get_theme_mod('orphan_tphead_hide','1');

if( empty( $orphtphead ) ) {
	
	$orphtpheadlbl = get_theme_mod('orphan_head_scllbl');
	$orphtpheadfb = get_theme_mod('orphan_head_fb');
	$orphtpheadtw = get_theme_mod('orphan_head_tw');
	$orphtpheadyt = get_theme_mod('orphan_head_yt');
	$orphtpheadin = get_theme_mod('orphan_head_in');
	$orphtpheadpi = get_theme_mod('orphan_head_pin');

	$orphtpheadadd = get_theme_mod('orphan_head_add');
	$orphtpheadmail = get_theme_mod('orphan_head_mail');
 
	if( !empty( $orphtpheadfb || $orphtpheadtw || $orphtpheadyt || $orphtpheadin || $orphtpheadpi || $orphtpheadadd || $orphtpheadmail ) ){
?>
	<div class="top-header">
		<div class="wrapper">
			<div class="flexbox">
				<?php 
					if( !empty( $orphtpheadfb || $orphtpheadtw || $orphtpheadyt || $orphtpheadin || $orphtpheadpi ) ){ 
						echo '<div class="topbar-left"><div class="topbar-social"><span>'.$orphtpheadlbl.'</span>';
							if( !empty( $orphtpheadfb ) ){
								echo '<a href="'.esc_url( $orphtpheadfb ).'" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
							}
							if( !empty( $orphtpheadtw ) ){
								echo '<a href="'.esc_url( $orphtpheadtw ).'" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
							}
							if( !empty( $orphtpheadyt ) ){
								echo '<a href="'.esc_url( $orphtpheadyt ).'" target="_blank" title="YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>';
							}
							if( !empty( $orphtpheadin ) ){
								echo '<a href="'.esc_url( $orphtpheadin ).'" target="_blank" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
							}
							if( !empty( $orphtpheadpi ) ){
								echo '<a href="'.esc_url( $orphtpheadpi ).'" target="_blank" title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>';
							}
						echo '</div><!-- social --></div><!-- topbar left -->';
					} if( !empty( $orphtpheadadd || $orphtpheadmail ) ){
						echo '<div class="topbar-right">';
							if( !empty( $orphtpheadadd ) ){
								echo '<span class="tpbr-add"><i class="fa fa-map-marker"></i> '.esc_html($orphtpheadadd).'</span>';
							} if( !empty( $orphtpheadmail ) ){
								echo '<span class="tpbr-mail"><i class="fa fa-envelope"></i> '.esc_html($orphtpheadmail).'</span>';
							}
						echo '</div>';
					}
				?>
			</div><!-- flex -->
		</div><!-- wrapper -->
	</div><!-- top bar -->
<?php 
	}
}