<article class="item">
	<a href="<?php the_permalink(); ?>">
		<?php $image = nzscene_catch_that_image(); if ( has_post_thumbnail()): the_post_thumbnail( 'full'); elseif(!empty($image)): echo $image; endif; ?>
	</a>
	<?php
		if ( has_post_format( 'audio' ) && nzscene_oembed() ) {
			$attr = array(
			'src'      => nzscene_oembed(),
			'loop'     => '',
			'autoplay' => '',
			'preload' => 'none'
			);
			echo wp_audio_shortcode( $attr );
		}
	?>
	<div class="inner-item">
	<div class="meta-tags"><?php printf( __( '<span class="fa fa-user"></span> <span class="author">%3$s</span> <span class="fa fa-clock-o"></span> <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'nz-scene' ), get_the_time(__('Y-m-j','nz-scene')), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?></div>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="excerpt"><?php the_excerpt( '<span class="read-more">' . __( 'Read More &raquo;', 'nz-scene' ) . '</span>' ); ?></div>
	</div>
</article>