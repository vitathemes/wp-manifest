<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Manifest
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    <style>
        <?php wp_manifest_typography(); ?>
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="o-wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-manifest' ); ?></a>

	<header id="masthead" class="c-header">
        <div class="c-header__main">
            <div class="c-header__logo">
		        <?php
		        the_custom_logo();
		        if ( is_front_page() && is_home() ) :
			        ?>
                    <h1 class="c-header__site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		        <?php
		        else :
			        ?>
                    <p class="c-header__site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		        <?php
		        endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation c-header__menu">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-manifest' ); ?></button>
	            <?php wp_manifest_show_menu(); ?>
            </nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->
