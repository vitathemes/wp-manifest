<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
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
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<div id="page" class="main">
    <header class="c-header c-header__404">
        <div class="c-header__main">
			<?php wp_manifest_header_branding(); ?>
        </div>
    </header>
    <section id="content" class="lost-container not-found u-margin-bottom-larger-m u-margin-bottom-larger">
        <div class="o-wrapper">
            <h2 class="big-title"><?php esc_html_e( '404', 'wp-manifest' ); ?></h2>
            <p class="h3"><?php esc_html_e( 'Oops! we are sorry, but the page you requested was not found. You can search or return to home.', 'wp-manifest' ); ?></p>
            <a class="c-btn c-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="dashicons dashicons-arrow-left-alt"></span> <?php esc_html_e( 'Go Home', 'wp-manifest' ); ?>
            </a>
            <div class="s-widget s-widget--search-form">
				<?php get_search_form(); ?>
            </div>
        </div>
    </section>
	<?php wp_footer(); ?>
</body>
</html>

