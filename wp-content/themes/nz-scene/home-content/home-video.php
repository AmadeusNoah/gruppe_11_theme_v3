<article class="item">
	<?php if ( has_post_format( 'video' )) { echo "<div class='video-container'>" . nzscene_oembed() . "</div>"; } ?> 
	<div class="inner-item">
	<div class="meta-tags"><?php printf( __( '<span class="fa fa-user"></span> <span class="author">%3$s</span> <span class="fa fa-clock-o"></span> <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'nz-scene' ), get_the_time(__('Y-m-j','nz-scene')), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?></div>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="excerpt"><?php the_excerpt( '<span class="read-more">' . __( 'Read More &raquo;', 'nz-scene' ) . '</span>' ); ?></div>
	</div>
</article>