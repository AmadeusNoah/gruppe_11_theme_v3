<?php get_header(); ?>
		<div class="front-wrapper">
			<div id="content">
				<div class="page-title">
					<div class="wrap"><div class="table"><div class="table-cell"><h1><?php _e('Blog','nz-scene'); ?></h1></div></div></div>					<div class="instagram-feeds">
						<?php if( shortcode_exists('instagram-feed') ){ echo do_shortcode('[instagram-feed num=20 cols=10 imagepadding=0 disablemobile=true imageres=full showbutton=false showheader=false showfollow=false]'); } ?>
					</div>
					<span class="overlay"></span>
				</div>
				<div id="blog" class="wrap">
					<div class="sticky-posts">
						<?php 
						$i = 1; $args = array('post_status' => 'publish','post__in' => get_option("sticky_posts")); $fPosts = new WP_Query( $args ); while ( $fPosts -> have_posts() ) : $fPosts -> the_post(); 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
						$thumb_url = $thumb_url_array[0];
						$image_thumb = nzscene_catch_that_image_thumb();
						$gallery_thumb = nzscene_catch_gallery_image_full();
					
						if( has_post_thumbnail() ) { $bg_src = 'background-image:url(' . $thumb_url . ');'; } elseif( !empty($image_thumb) ) { $bg_src = 'background-image:url(' . $image_thumb . ');'; }  elseif( !empty($gallery_thumb) ) { $bg_src = 'background-image:url(' . $gallery_thumb. ');'; } else{ $bg_src = 'background-color:#ddd;'; }
						?>
							<article class="item<?php if( $i == 1 || $i%3 == 1 ){ echo ' ' . 'sticky-big m-all t-2of3 d-5of7'; } else{ echo ' ' . 'sticky-small m-all t-1of3 d-2of7 last-col'; } ?>">
								<div class="sticky-bg" style="<?php echo $bg_src; ?>">
									<div class="sticky-post-meta">
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<?php  if( $i == 1 || $i%3 == 1 ){ the_excerpt(); } ?>
									</div>
								</div>
							</article>
						<?php $i++; endwhile; wp_reset_postdata(); ?>
						<span class="clear"></span>
					</div>
					<div id="main" class="m-all t-2of3 d-5of7" role="main">
						<div class="blog-list">
							<?php $args2= array('post__not_in' => get_option( 'sticky_posts' ) ,'paged' => $paged);
						$blogPosts = new WP_Query( $args2 ); ?>
						<?php while ( $blogPosts -> have_posts() ) : $blogPosts -> the_post(); ?>
			  						<?php get_template_part( 'home-content/home', get_post_format() ); ?>
			  				<?php endwhile; wp_reset_postdata(); ?>
						</div>
						<div class="nav-arrows text-center">
		  					<div class="left-arrow">
								<?php previous_posts_link("<span class='fa fa-long-arrow-left'></span> Newer Posts"); ?>
							</div>
							<div class="right-arrow">
								<?php next_posts_link("Older Posts <span class='fa fa-long-arrow-right'></span>"); ?>
							</div>
							<span class="clear"></span>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div> <!-- inner-content -->
			</div> <!-- content -->
		</div><!-- front-wrapper -->
<?php get_footer(); ?>