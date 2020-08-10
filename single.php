<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header(); ?>

<div id="content-area post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="o-container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );

		endwhile; ?>

		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
    </div>
</div>

<?php get_footer(); ?>
