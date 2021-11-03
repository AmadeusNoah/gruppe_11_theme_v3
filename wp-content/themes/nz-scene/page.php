<?php get_header(); ?>

	<div id="content">
		<div class="inner-title page-title">
			<div class="wrap"><div class="table"><div class="table-cell"><h1><?php the_title(); ?></h1></div></div></div>					
			<?php if( shortcode_exists('instagram-feed') ){ ?> <div class="instagram-feeds"> <?php echo do_shortcode('[instagram-feed num=40 cols=10 imagepadding=0 disablemobile=true imageres=full showbutton=false showheader=false showfollow=false]'); ?> </div> <?php } elseif(has_post_thumbnail()){ 
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
				$thumb_url = $thumb_url_array[0];

				echo '<span class="head-bg" style="background-image:url('. $thumb_url .');"></span>';

			} ?>
			<span class="overlay"></span>
		</div>

		<div id="inner-content" class="wrap cf">
			
			<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<div class="main-content-area">
						<section class="entry-content cf" itemprop="articleBody">
							<?php the_content(); 

							wp_link_pages( array(
						      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'nz-scene' ) . '</span>',
						      'after'       => '</div>',
						      'link_before' => '<span>',
						      'link_after'  => '</span>',
						    ) );

							?>
						</section>
					</div>

					<?php // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) : ?>
						<div class="below-content-area">
							<?php comments_template(); ?>
						</div>
					<?php endif; ?>

					</article> <?php // end article ?>

				<?php endwhile; ?>

				<?php else : ?>

					<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'nz-scene' ); ?></h1>
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'nz-scene' ); ?></p>
							</header>
					</article>

				<?php endif; ?>

			</div>

			<?php get_sidebar('page'); ?>

		</div>

	</div>

<?php get_footer(); ?>