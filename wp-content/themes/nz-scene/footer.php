			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="wrap cf">
					<div class="blog-name">
						<h5><?php bloginfo('name'); ?></h5>
						<p><?php bloginfo('description'); ?></p>
					</div>
					<div class="blog-social">
						<?php
				           	if(function_exists('nzscene_social_icons')) :
				           		echo nzscene_social_icons();
				           	endif;
				        ?>
					</div>
					<div class="source-org copyright">
						 &#169; <?php echo esc_attr(date_i18n(__('Y','nz-scene'))); ?> <?php bloginfo( 'name' ); ?>
						<span><?php if(is_home() || is_front_page() ): ?>
							- <?php _e('Powered by ','nz-scene'); ?><a href="http://wordpress.org/" target="_blank" rel="nofollow"><?php _e('WordPress','nz-scene'); ?></a> <span><?php _e('and','nz-scene'); ?></span> <a href="http://deucethemes.com/themes/nz-scene/" target="_blank" rel="nofollow"><?php _e('NZ Scene','nz-scene'); ?></a>
						<?php endif; ?>
						</span>
					</div>
				</div>

			</footer>
			<a href="#" class="scrollToTop"><span class="fa fa-chevron-circle-up"></span></a>
		</div>

		<?php wp_footer(); ?>
	</body>

</html> <!-- end of site. what a ride! -->