<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

wp_head();
?>
<header class="c-header c-header__404">
    <div class="c-header__main">
        <h1 class="c-header__site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
    </div>
</header>
    <section class="lost-container not-found u-margin-bottom-larger-m u-margin-bottom-larger">
        <div class="o-wrapper">
            <h2 class="big-title"><?php _e('404' , 'wp-manifest'); ?></h2>
            <p><?php _e('Oops! we are sorry, but the page you requested was not found. You can search or return to home.' , 'wp-manifest'); ?></p>
            <a class="c-btn c-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="dashicons dashicons-arrow-left-alt"></span> <?php _e('Go Home' , 'wp-manifest'); ?></a>
            <br>
            <br>
	        <div class="s-widget s-widget--search-form">
		        <?php get_search_form(); ?>
            </div>
        </div>
    </section>
<?php
wp_footer();
