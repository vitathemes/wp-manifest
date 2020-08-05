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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
	wp_head();
	?>
    <style>
    <?php wpmanifest_typography(); ?>
    </style>
</head>
<body <?php body_class(); ?>>

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
            </div>
			<?php wpmanifest_show_menu(); ?>
        </div>
    </div>
</header>

<div class="wrapper-normal">
