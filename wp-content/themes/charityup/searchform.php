<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'charityup' ); ?></span>
	<input type="search" id="search-text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'charityup' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" id="search-button" class="search-submit"><i class="fas fa-search"></i></button>
</form>
