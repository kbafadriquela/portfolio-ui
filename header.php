<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PortfolioUI
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'portfolioui' ); ?></a>
	<div class="header-container">
	<header id="masthead" class="site-header container">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$portfolioui_description = get_bloginfo( 'description', 'display' );
			if ( $portfolioui_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $portfolioui_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
			<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'main-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->

		<nav id="site-navigation-mobile" class="main-navigation-mobile">
			<button class="menu-toggle" aria-expanded="false"><i class="fa-solid fa-bars fa-xl"></i></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'mobile-menu',
					'menu_id'        => 'mobile-menu',
				)
			);
			?>
		</nav><!-- #mobile-navigation -->
		</div><!-- .site-branding -->

	
	</header><!-- #masthead -->
	</div>
