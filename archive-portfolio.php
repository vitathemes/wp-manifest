<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
get_header(); ?>

<section class="portfolio c-archive c-archive--portfolio">
    <div class="o-wrapper">
        <div class="u-row u-flex-nowrap-m u-flex-wrap">
            <div class="o-col--1/2">
				<?php
				printf( '<h1 class="c-archive__title">%s</h1>', esc_html__('Works', 'wp-manifest') );
				?>
            </div>
            <div class="o-col--1/2">
                <p class="c-archive__desc">
					<?php
					echo bloginfo( 'description' );
					?>
                </p>
            </div>
        </div>

        <div id="content" class="content o-page">
			<?php if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

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
