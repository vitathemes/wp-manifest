<article class="c-article c-article--archive">
    <header class="c-article__header">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-article__image-link "><?php the_post_thumbnail( 'wp_manifest_medium_square', array( 'class' => 'c-article__image' ) ); ?></a>
		<?php the_title('<a href="'. get_permalink() .'" class="c-article__title-link"><h2 class="c-article__title">', '</h2></a>'); ?>
    </header>
    <main class="c-article__main">
        <div class="c-article__excerpt s-article-excerpt">
			<?php the_excerpt(); ?>
        </div>
        <div class="c-article__readmore">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-article__readmore-link"><?php echo esc_html__('Read More', 'wp-manifest') ?></a>
        </div>
    </main>
</article>
