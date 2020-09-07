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
<section class="o-page">
    <div class="o-wrapper">
        <div class="o-page__header o-col">
            <h1 class="u-margin-none">Blog</h1>
        </div>
	    <?php if ( get_theme_mod( 'show_blog_carousel' , false ) == true ): ?>
        <div class="c-blog-carousel o-col">
            <div class="c-blog-carousel__image js-blog-image-carousel">
				<?php
				$postsCount = 1;
				while ( $carousel_posts->have_posts() ) : $carousel_posts->the_post(); ?>
                    <div id="slide<?php echo $postsCount; ?>" class="c-blog-carousel__image__cell">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-article__image-link "><?php the_post_thumbnail( 'manifest_medium_square', array( 'class' => 'c-article__image' ) ); ?></a>
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
                        <div id="slide<?php echo $postsCount; ?>" class="c-blog-carousel__content__cell">
                            <a class="c-blog-carousel__content__cell__category" href="<?php echo $category['url']; ?>"><?php echo $category['name']; ?></a>
							<?php the_title( '<a href="' . get_permalink() . '" class="c-blog-carousel__content__cell__title-link"><h2 class="c-blog-carousel__content__cell__title">', '</h2></a>' ); ?>
                            <span class="c-blog-carousel__content__cell__date u-color-dark-gray"><?php echo get_the_time( 'd M, Y' ); ?></span>
                            <div class="c-blog-carousel__content__cell__excerpt s-article-excerpt">
                                <p class="u-margin-none">
									<?php echo strip_tags( get_the_excerpt() ); ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-article__readmore-link">
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
                        <a href="#slide<?php echo $i; ?>" class="js-blog-carousel-nav-item c-blog-carousel__nav__link <?php echo $i == 1 ? "is-active" : ""; ?>"><?php echo $i; ?></a>
					<?php endfor; ?>
                </nav>
            </div>
        </div>
        <?php endif;
	    if ( get_theme_mod( 'show_categories' , false ) == true ):
	    ?>
        <ul class="c-categories s-categories">
		    <?php wp_list_categories(array('title_li' => '')); ?>
        </ul>
        <?php endif; ?>
        <?php if ( have_posts() ) : ?>
            <div id="site-content" class="u-margin-bottom-huge u-margin-bottom-larger-m">
                <div class="u-flex u-flex-wrap u-dir-column-m">
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
					if ( ! defined( 'JETPACK__VERSION' ) ) :
						the_posts_pagination( array(
							'screen_reader_text' => ' ',
							'mid_size'           => 2,
							'prev_text'          => __( 'Previous', 'wp-manifest' ),
							'next_text'          => __( 'Next', 'wp-manifest' ),
						) );
					endif;
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
