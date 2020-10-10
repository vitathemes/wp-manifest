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

    <div id="content" class="o-page o-page--home">
		<?php get_template_part( 'template-parts/components/pageheader' ); ?>
		<?php if ( get_theme_mod( 'show_portfolio_homepage' , true ) == true ): ?>
			<?php get_template_part( 'template-parts/components/slider' ); ?>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/components/info' ); ?>
		<?php if ( get_theme_mod( 'show_latest_posts_homepage', true ) == true ): ?>
			<?php get_template_part( 'template-parts/components/latest-posts' ); ?>
		<?php endif; ?>
    </div>

<?php
get_footer();
