<?php
$latest_posts = new WP_Query( array(
	'posts_per_page' => 3,
	'status'         => 'publish'
) );
if ( $latest_posts->have_posts() ):
	?>
    <section class="c-component c-posts">
        <div class="o-wrapper">
            <div class="o-col u-dir-column-m u-flex u-align-start-m u-align-center u-justify-between u-margin-bottom-larger">
                <h2 class="u-margin-none u-margin-bottom-small-m">Latest Posts</h2>
                <a class="u-color-primary-light" href="<?php echo site_url( 'blog' ); ?>">
                    See All
                    <span class="u-vertical-middle dashicons dashicons-arrow-right-alt"></span>
                </a>
            </div>
            <div class="u-flex u-dir-column-m">
				<?php while ( $latest_posts->have_posts() ): $latest_posts->the_post(); ?>
                    <div class="o-col o-col--1/3">
                        <article class="c-post">
                            <header class="c-post__header u-margin-bottom-small">
                                <a class="c-post__header__link" href="<?php the_permalink(); ?>"></a>
                                <img srcset="<?php wp_manifest_generate_srcset(get_the_ID()); ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" class="c-post__header__img"/>
                            </header>
                            <main class="c-post__main u-flex u-dir-column">
                                <div class="u-flex u-justify-between u-margin-bottom-small">
		                            <?php wp_manifest_show_post_data(get_the_ID()); ?>
                                </div>
                                <div class="u-flex u-dir-column u-justify-between u-flex-grow">
	                                <a href="<?php the_permalink(); ?>">
		                                <?php the_title('<h3 class="c-post__main__title h4 u-margin-none u-margin-bottom-medium">', '</h3>'); ?>
                                    </a>
                                    <p class="c-post__main__excerpt u-margin-none"><?php echo strip_tags(get_the_excerpt()); ?></p>
                                </div>
                            </main>
                        </article>
                    </div>
				<?php wp_reset_postdata(); endwhile; ?>
            </div>
        </div>
    </section>
<?php
endif;
