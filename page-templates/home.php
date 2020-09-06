<?php /*  Template Name: Home */
/**
 * The main template file for home page
 *
 * If this page doesn't exists index.php will show
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>

    <div class="o-page o-page--home">
		<?php get_template_part( 'template-parts/components/page-header' ); ?>
		<?php get_template_part( 'template-parts/components/slider' ); ?>
		<?php get_template_part( 'template-parts/components/info' ); ?>
		<?php if ( get_theme_mod( 'show_latest_posts_homepage' ) == true ): ?>
			<?php get_template_part( 'template-parts/components/latest-posts' ); ?>
		<?php endif; ?>
    </div>

<?php
get_footer();
