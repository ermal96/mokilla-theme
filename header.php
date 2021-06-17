<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mokilla
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'mokilla'); ?></a>

	<header id="masthead" class="site-header">

	<div class="side-navigation">

	<button id="close-side-menu"><i class="icon-close" ></i></button>

	<?php
            wp_nav_menu(array(
                'theme_location' => 'menu-side',
                'menu_id'        => 'side-menu',
            ));
            ?>


		<div class="side-navigation-bookmark">
			<p>bookmark (0)</p>
		</div>

		<?php  if (get_option('mokilla-social-links')) : ?>

			<div class="side-navigation-socials"> 

			<?php  foreach (get_option('mokilla-social-links') as $key => $option) : ?>

				<a target="_blank" href="<?php echo $option ?>"> <i class="icon-<?php echo $key?>"> </i>  <span><?php echo $key; ?></span></a>

			<?php endforeach; ?>

			</div>


		<?php endif; ?>
		
	</div>

	<div class="site-header-wrapper">
		<div class="site-branding">
			<button id="open-side-menu"><i class="icon-menu" ></i></button>
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->

		<nav class="main-navigation">
			<?php
            wp_nav_menu(array(
                'theme_location' => 'menu-primary',
                'menu_id'        => 'primary-menu',
            ));
            ?>
		</nav>

		<nav class="mini-navigation">
			<?php
            wp_nav_menu(array(
                'theme_location' => 'menu-mini',
                'menu_id'        => 'mini-menu',
            ));
            ?>


		<p>bookmark (1)</p>

		<button><i class="icon-search"></i></button>

		</nav>


			</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
