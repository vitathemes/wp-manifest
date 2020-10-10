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
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="main">
    <a tabindex="1" class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-manifest' ); ?></a>
    <header id="masthead" class="c-header">
        <div class="o-wrapper o-wrapper--header">
            <div class="c-header__main">
                <div class="c-header__logo">
					<?php
					wp_manifest_header_branding();
					 ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation c-header__menu">
                    <button class="menu-toggle c-header__toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="dashicons dashicons-menu-alt"></span></button>
					<?php wp_manifest_show_menu(); ?>
                    <?php if (get_theme_mod('search_icon_header', 1) == 1): ?>
                    <div class="c-header__search">
                        <button tabindex="1" class="dashicons dashicons-search js-search-toggle c-header__search-toggle"></button>
                        <div class="c-header__search__form js-search-form s-header-search">
		                    <?php get_search_form(); ?>
                        </div>
                        <span class="dashicons dashicons-search js-search-toggle js-search-toggle-close  c-header__search-toggle c-header__search-toggle--close"></span>
                    </div>
                    <?php endif; ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header><!-- #masthead -->
