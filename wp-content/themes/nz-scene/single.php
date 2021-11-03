<?php get_header(); ?>

	<div id="content">
		<div class="inner-title page-title">
			<div class="wrap"><div class="table"><div class="table-cell">
				<h1><?php the_title(); ?></h1>
				<p class="meta-tags"><?php while (have_posts()) : the_post(); printf( __( '<span class="fa fa-user"></span> <span class="author">%3$s</span> <span class="fa fa-clock-o"></span> <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'nz-scene' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); endwhile; ?></p>
			</div></div></div>					
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
							<?php get_template_part( 'post-content/format', get_post_format() ); ?>
						</div>

						<div class="tag-links"><?php $category_list = get_the_category_list( __( ', ', 'nz-scene' ) ); printf( __('Filed under: %s', 'nz-scene'), $category_list ); ?></div>
						<?php if(has_tag()): ?><div class="tag-links"><div class="clear"></div><?php _e('Tags: ','nz-scene'); echo get_the_tag_list('',',',''); ?></div><?php endif; ?>

						<?php get_template_part( 'post-content/below', 'content' ); ?>

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

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>