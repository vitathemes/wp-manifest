<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header();
?>
    <section class="lost-container u-margin-bottom-larger-m u-margin-bottom-larger">
        <div class="o-wrapper">
            <h2><?php _e('Page Not Found - 404' , 'wp-manifest'); ?></h2>
            <p><?php _e('This page not found (deleted or never exists). try a phrase in search box or back to home and start again.' , 'wp-manifest'); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Take me home!' , 'wp-manifest'); ?></a>
            <br>
            <br>
	        <div class="s-widget s-widget--search-form">
		        <?php get_search_form(); ?>
            </div>
        </div>
    </section>
<?php
get_footer();
