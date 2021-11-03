<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package charityup
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'charityup' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="main-nav">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3 col-9">
						<div class="site-branding">
							<div class="site-logo">
								<?php the_custom_logo(); ?>
							</div>
							<div class="site-identity">
								<?php
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$charityup_pro_description = get_bloginfo( 'description', 'display' );
								if ( $charityup_pro_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $charityup_pro_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
									<?php
								endif;
								?>
							</div>
						</div><!-- .site-branding -->
					</div>
					<div class="col-lg-9 col-3">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<div class="ham-wrap">
									<div class="ham-icon">
										<span></span>
										<span></span>
										<span></span>
									</div>
								</div>
							</button>
							<div class="main-menu">
								<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_id' => 'primary-menu',
										)
									);
								}
								?>
							</div>
						</nav><!-- #site-navigation --> 
					</div>
				</div>
			</div>
		</div>		
	</header><!-- #masthead -->