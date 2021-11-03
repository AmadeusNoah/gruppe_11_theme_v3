<?php get_header(); ?>
		<div class="front-wrapper">
			<div id="content">
				<div class="inner-title page-title">
					<div class="wrap"><div class="table"><div class="table-cell"><h1><?php _e( 'Search Results for:', 'nz-scene' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1></div></div></div>					
					<div class="instagram-feeds">
						<?php if( shortcode_exists('instagram-feed') ){ echo do_shortcode('[instagram-feed num=20 cols=10 imagepadding=0 disablemobile=true imageres=thumb showbutton=false showheader=false showfollow=false]'); } ?>
					</div>
					<span class="overlay"></span>
				</div>
				<div id="blog" class="wrap">
					<div id="main" class="m-all t-2of3 d-5of7" role="main">
						<div class="blog-list">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			  						<?php get_template_part( 'home-content/home', get_post_format() ); ?>
			  				<?php endwhile; wp_reset_postdata(); ?>
			  				<div class="nav-arrows text-center">
			  					<div class="left-arrow">
									<?php previous_posts_link("<span class='fa fa-long-arrow-left'></span> Newer Posts"); ?>
								</div>
								<div class="right-arrow">
									<?php next_posts_link("Older Posts <span class='fa fa-long-arrow-right'></span>"); ?>
								</div>
								<span class="clear"></span>
							</div>
			  				<?php else : ?>

								<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'nz-scene' ); ?></h1>
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'nz-scene' ); ?></p>
										</header>
								</article>

							<?php endif; ?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div> <!-- inner-content -->
			</div> <!-- content -->
		</div><!-- front-wrapper -->
<?php get_footer(); ?>