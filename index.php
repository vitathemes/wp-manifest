<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
get_header(); ?>
    <section class="o-page">
        <div class="o-container">
			<?php if ( have_posts() ) : ?>
                <div class="o-flex o-flex--wrap">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					?>
                    <div class="o-flex__item o-flex__item-1/2">
						<?php
						get_template_part( 'template-parts/content', get_post_type() );
						?>
                    </div>
				<?php
				endwhile;

				the_posts_pagination( array(
					'screen_reader_text' => ' ',
					'mid_size'           => 2,
					'prev_text'          => __( 'Previous', 'wp-indigo' ),
					'next_text'          => __( 'Next', 'wp-indigo' ),
				) );

			else :

				get_template_part( 'template-parts/content', 'none' );
				?>
                </div>
			<?php
			endif;
			?>
        </div>
    </section>
<?php get_footer(); ?>