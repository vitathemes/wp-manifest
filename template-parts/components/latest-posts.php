<?php
$latest_posts = new WP_Query( array(
	'posts_per_page' => 3,
	'status'         => 'publish',
	'order'          => 'desc'
) );
if ( $latest_posts->have_posts() ):
	?>
    <section class="c-component c-posts">
        <div class="o-wrapper">
            <div class="u-row">
                <div class="o-col u-flex u-align-start-m u-align-center u-justify-between u-margin-bottom-larger u-flex-wrap-m">
                    <h2 class="c-posts__title u-margin-none u-margin-bottom-small-m h3"><?php esc_html_e( 'Latest Posts', 'wp-manifest' ) ?></h2>
                    <a class="c-posts__more-links u-color-primary-light" href="<?php echo esc_url( home_url( 'blog' ) ); ?>">
						<?php esc_html_e( 'View All', 'wp-manifest' ); ?>
                        <span class="u-vertical-middle dashicons dashicons-arrow-right-alt"></span>
                    </a>
                </div>
            </div>
            <div class="u-row u-dir-column-m">
				<?php while ( $latest_posts->have_posts() ):
					$latest_posts->the_post(); ?>
                    <div class="o-col o-col--1/3">
                        <article class="c-post">
							<?php if ( get_theme_mod( 'show_thumbnail_archive', true ) ): ?>
                                <header class="c-post__header u-margin-bottom-small">
                                    <a class="c-post__header__link" href="<?php the_permalink(); ?>"></a>
									<?php the_post_thumbnail( 'wp_manifest_medium_thumbnail', array( 'class' => 'c-post__header__img' ) ); ?>
                                </header>
							<?php endif; ?>
                            <main class="c-post__main u-flex u-dir-column">
                                <div class="u-flex u-flex-wrap-m u-justify-between u-margin-bottom-medium u-align-center">
									<?php wp_manifest_show_post_data( get_the_ID() ); ?>
                                </div>
                                <div class="u-flex u-dir-column u-flex-grow">
                                    <div class="u-margin-none u-margin-bottom-small">
                                        <a href="<?php the_permalink(); ?>">
											<?php the_title( '<h3 class="c-post__main__title u-margin-none">', '</h3>' ); ?>
                                        </a>
                                    </div>
									<?php if ( get_theme_mod( 'show_excerpt_archive', true ) ): ?>
                                        <p class="c-post__main__excerpt u-margin-none"><?php echo esc_html( strip_tags( get_the_excerpt() ) ); ?>
                                        <a class="c-post__main__excerpt__link" href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title(); ?>">More
                                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                                        </a>
                                        </p>
									<?php endif; ?>
                                </div>
                            </main>
                        </article>
                    </div>
					<?php wp_reset_postdata();
				endwhile; ?>
            </div>
        </div>
    </section>
<?php
endif;
