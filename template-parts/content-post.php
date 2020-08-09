<article class="c-post">
    <header class="c-post__header u-margin-bottom-small">
        <a class="c-post__header__link" href="<?php the_permalink(); ?>"></a>
        <img srcset="<?php wpmanifest_generate_srcset(get_the_ID()); ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" class="c-post__header__img"/>
    </header>
    <main class="c-post__main u-flex u-dir-column">
        <div class="u-flex u-justify-between u-margin-bottom-small">
			<?php wpmanifest_show_post_data(get_the_ID()); ?>
        </div>
        <div class="u-flex u-dir-column u-justify-between u-flex-grow">
            <a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="c-post__main__title u-margin-none u-margin-bottom-medium">', '</h3>'); ?>
            </a>
            <p class="c-post__main__excerpt u-margin-none"><?php echo strip_tags(get_the_excerpt()); ?></p>
        </div>
    </main>
</article>
