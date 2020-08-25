<?php
$latest_posts = new WP_Query( array(
	'posts_per_page' => 3,
	'status'         => 'publish'
) );
if ( $latest_posts->have_posts() ):
	?>
    <section class="c-component">
        <div class="o-wrapper">
            <div class="o-col u-dir-column-m u-flex u-align-start-m u-align-center u-justify-between u-margin-bottom-larger">
                <h2 class="u-margin-none u-margin-bottom-small-m">Latest Posts</h2>
                <a class="u-color-primary-light" href="<?php echo site_url( 'blog' ); ?>">
                    See All
                    <svg fill="#565656" width="24" height="12" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.53 6.53a.75.75 0 000-1.06L18.757.697a.75.75 0 00-1.06 1.06L21.939 6l-4.242 4.243a.75.75 0 001.06 1.06L23.53 6.53zM0 6.75h23v-1.5H0v1.5z"/>
                    </svg>
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
