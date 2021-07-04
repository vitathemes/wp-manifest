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
$carousel_posts = new WP_Query( array(
	'posts_per_page' => 3,
	'status'         => 'publish'
) );
get_header(); ?>
<section id="content" class="o-page">
    <div class="o-wrapper">
        <div class="u-row">
            <div class="o-page__header o-col">
                <h1 class="u-margin-none"><?php esc_html_e( 'Blog', 'wp-manifest' ); ?></h1>
            </div>
        </div>
		<?php if ( get_theme_mod( 'show_blog_carousel', false ) == true ): ?>
            <div class="u-row">
                <div class="c-blog-carousel o-col">
                    <div class="c-blog-carousel__image js-blog-image-carousel">
						<?php
						$postsCount = 1;
						while ( $carousel_posts->have_posts() ) : $carousel_posts->the_post(); ?>
                            <div id="slide<?php echo esc_attr( $postsCount ); ?>" class="c-blog-carousel__image__cell">
                                <a tabindex="-1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-article__image-link" tabindex="-1"><?php the_post_thumbnail( 'wp_manifest_medium_square', array( 'class' => 'c-article__image' ) ); ?></a>
                            </div>
							<?php
							$postsCount ++;
							wp_reset_postdata();
						endwhile;
						?>
                    </div>
                    <div class="c-blog-carousel__content">
                        <div class="js-blog-content-carousel">
							<?php
							$postsCount = 1;
							while ( $carousel_posts->have_posts() ) : $carousel_posts->the_post();
								$category = wp_manifest_get_post_category( get_the_ID() ); ?>
                                <div id="slide<?php echo esc_attr( $postsCount ); ?>" class="c-blog-carousel__content__cell">
                                    <div>
                                        <a tabindex="-1" class="c-blog-carousel__content__cell__category u-margin-bottom-small" href="<?php echo esc_url( $category['url'] ); ?>"><?php echo esc_html( $category['name'] ); ?></a>
                                    </div>
                                    <div>
										<?php the_title( '<a href="' . get_permalink() . '" class="c-blog-carousel__content__cell__title-link u-margin-bottom-medium" tabindex="-1"><h3 class="c-blog-carousel__content__cell__title u-margin-none">', '</h3></a>' ); ?>
                                    </div>
                                    <span class="c-blog-carousel__content__cell__date"><?php echo esc_html( get_the_time( 'd M, Y' ) ); ?></span>
                                    <div class="c-blog-carousel__content__cell__excerpt s-article-excerpt">
                                        <p class="u-margin-none">
											<?php echo esc_html( strip_tags( get_the_excerpt() ) ); ?>
                                            <a tabindex="-1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-article__readmore-link u-link-no-hover">
                                                <span class="u-vertical-middle dashicons dashicons-arrow-right-alt"></span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
								<?php
								$postsCount ++;
								wp_reset_postdata();
							endwhile;
							?>
                        </div>
                        <nav class="c-blog-carousel__nav">
							<?php for ( $i = 1; $i < $postsCount; $i ++ ): ?>
                                <a href="#slide<?php echo esc_attr( $i ); ?>" class="js-blog-carousel-nav-item c-blog-carousel__nav__link <?php echo $i == 1 ? esc_attr( "is-active" ) : null; ?>"><?php echo esc_html( $i ); ?></a>
							<?php endfor; ?>
                        </nav>
                    </div>
                </div>
            </div>
		<?php endif;
		if ( get_theme_mod( 'show_categories', false ) == true ):
			get_template_part( 'template-parts/components/categories-list' );
		endif; ?>
		<?php if ( have_posts() ) : ?>
            <div id="site-content" class="u-margin-bottom-huge u-margin-bottom-larger-m">
                <div class="u-row u-flex-wrap u-dir-column-m">
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
                        <div class="o-col o-col--1/2 u-margin-bottom-xlarge u-margin-bottom-small-m">
							<?php
							get_template_part( 'template-parts/content', get_post_type() );
							?>
                        </div>
					<?php
					endwhile;
					the_posts_pagination( array(
						'screen_reader_text' => ' ',
						'mid_size'           => 2,
						'prev_text'          => __( 'Previous', 'wp-manifest' ),
						'next_text'          => __( 'Next', 'wp-manifest' ),
					) );
					?>
                </div>
            </div>
		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
			?>
		<?php
		endif;
		?>
    </div>
</section>
<?php get_footer(); ?>
