<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charityup
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			$hide_date   = get_theme_mod( 'charityup_post_hide_date', false );
			$hide_author = get_theme_mod( 'charityup_post_hide_author', false );

			if ( ! $hide_date ) {
				charityup_posted_on();
			}
			if ( ! $hide_author ) {
				charityup_posted_by();
			}
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php charityup_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php charityup_entry_footer(); ?>
		<div class="read-more mt-20">
			<a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html( get_theme_mod( 'charityup_excerpt_more_text', __( 'Read More', 'charityup' ) ) ); ?></a>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
