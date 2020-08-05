<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header();
?>
    <section class="lost-container">
        <h2><?php _e('Page Not Found - 404' , 'wp-manifest'); ?></h2>
        <p><?php _e('This page not found (deleted or never exists). try a phrase in search box or back to home and start again.' , 'wp-manifest'); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Take me home!' , 'wp-manifest'); ?></a>
        <br>
        <br>
        <?php get_search_form(); ?>
    </section>
<?php
get_footer();
