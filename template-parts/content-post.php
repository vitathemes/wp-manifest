<article class="c-post">
	<?php if ( get_theme_mod( 'show_thumbnail_archive' , true ) ): ?>
    <header class="c-post__header u-margin-bottom-small">
        <a class="c-post__header__link" href="<?php the_permalink(); ?>"></a>
	    <?php the_post_thumbnail('wp_manifest_large_thumbnail', array('class' => 'c-post__header__img')); ?>
    </header>
    <?php endif; ?>
    <main class="c-post__main u-flex u-dir-column">
        <div class="u-flex u-flex-wrap-m u-align-center u-justify-between u-margin-bottom-small">
			<?php wp_manifest_show_post_data(get_the_ID()); ?>
        </div>
        <div class="u-flex u-dir-column u-flex-grow">
            <a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="c-post__main__title u-margin-none u-margin-bottom-medium">', '</h3>'); ?>
            </a>
	        <?php if ( get_theme_mod( 'show_excerpt_archive' , true ) ): ?>
            <p class="c-post__main__excerpt u-margin-none"><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>
        </div>
    </main>
</article>
