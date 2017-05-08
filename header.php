<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header row flex-container flex-dir-column" role="banner">
		<div class="title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
			<button class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div>
		<!-- Bar w logo, language selectors, social -->
		<div class="main-bar row align-stretch">
			<div class="small-12 medium-6 large-6 columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo" src="<?php echo bloginfo('template_directory'); ?>/assets/images/cisc-logo.png"></a>
			</div>
			<div class="small-12 medium-6 large-6 columns text-right">
				<div class="lang-social-container flex-container flex-dir-column">
					<ul class="lang flex-child-grow">
						<li class="selected"><a href="#">ENGLISH</a></li>
						<li class="unselected"><a href="#">Lang2</a></li>
						<li class="unselected"><a href="#">Lang3</a></li>
					</ul>
					<ul class="social flex-child-shrink">
						<li><a href="#"><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-2x fa-rss-square" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-2x fa-youtube-square" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		</div>
		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
			<div class="top-bar-right">
				<ul class="menu">
					<li><input type="search" placeholder="Search"></li>
					<li><button type="button" class="button">Search</button></li>
				</ul>
			</div>
		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
