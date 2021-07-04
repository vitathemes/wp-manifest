<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
get_header(); ?>

<section class="blog archive c-archive">
    <div class="o-wrapper">

		<?php the_archive_title( '<h1 class="c-archive__title">', '</h1>' ) ?>
        <div id="content" class="u-flex u-flex-wrap u-dir-column-m">
			<?php if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					?>
                    <div class="o-col o-col--1/2 u-margin-bottom-xlarge u-margin-bottom-small-m">
						<?php
						get_template_part( 'template-parts/content', 'post' );
						?>
                    </div>
				<?php
				endwhile;

				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'wp-manifest' ),
					'next_text' => __( 'Next', 'wp-manifest' ),
				) );

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
