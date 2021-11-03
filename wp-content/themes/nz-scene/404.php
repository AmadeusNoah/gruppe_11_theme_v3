<?php get_header(); ?>

			<div id="content">
				<div class="inner-title page-title">
					<div class="wrap"><div class="table"><div class="table-cell">
						<h1><?php _e( '404 Error','nz-scene' ); ?></h1>
					</div></div></div>					
					<div class="instagram-feeds">
						<?php if( shortcode_exists('instagram-feed') ){ echo do_shortcode('[instagram-feed num=20 cols=10 imagepadding=0 disablemobile=true imageres=thumb showbutton=false showheader=false showfollow=false]'); } ?>
					</div>
					<span class="overlay"></span>
				</div>
				<div id="inner-content" class="wrap cf">
					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
							<article id="post-not-found">
							<div class="main-content-area">
								<header class="article-header">
										<h1><?php _e( 'Article Not Found', 'nz-scene' ); ?></h1>
								</header> <?php // end article header ?>
								<section class="entry-content cf" itemprop="articleBody">
									<p><?php _e( 'The article you were looking for was not found. You may want to check your link or perhaps that page does not exist anymore.', 'nz-scene' ); ?></p>
								</section>
								<section class="search">

									<p><?php get_search_form(); ?></p>

								</section>
							</div>

							</article> <?php // end article ?>				

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>