<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	wp_head();
	indigo_typography();
	?>
</head>
<body <?php body_class(); ?>>

<<<<<<< HEAD
                <nav id="site-navigation" class="main-navigation c-header__menu">
                    <button class="menu-toggle c-header__toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="dashicons dashicons-menu-alt"></span></button>
					<?php wp_manifest_show_menu(); ?>
                    <?php if (get_theme_mod('search_icon_header', 1) == 1): ?>
                    <div class="c-header__search">
                        <div class="c-header__search__form js-search-form s-header-search">
		                    <?php get_search_form(); ?>
                        </div>
                        <span class="dashicons dashicons-search js-search-toggle c-header__search-toggle"></span>
                    </div>
                    <?php endif; ?>
                </nav><!-- #site-navigation -->
=======
<header class="c-header">
    <div class="o-container">
        <div class="c-header__main">
            <div class="c-header__logo">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					echo '<a class="c-header__site-title" aria-label="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" href="' . site_url() . '">'. get_bloginfo('name') .'</a>';
				}
				?>
>>>>>>> 74d6f719cc37b2864adf25a946474c2406d9a8e9
            </div>
			<?php manifest_primary_menu(); ?>
        </div>
    </div>
</header>

<div class="wrapper-normal">
