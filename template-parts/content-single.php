<article class="c-article c-article--single">
    <header class="c-article__header">
        <ul class="c-article__header__categories">
		    <?php
		    //get all the categories the post belongs to
		    $categories = wp_get_post_categories( get_the_ID() );
		    //loop through them
		    foreach($categories as $c){
			    $cat = get_category( $c );
			    //get the name of the category
			    $cat_id = get_cat_ID( $cat->name );
			    //make a list item containing a link to the category
			    echo '<li class="c-article__header__categories__item"><a class="c-article__header__categories__item__link" href="'.get_category_link($cat_id).'">'.$cat->name.'</a></li>';
		    }
		    ?>
        </ul>
		<?php the_title( '<a href="' . get_permalink() . '" class="c-article__title-link"><h1 class="c-article__title">', '</h1></a>' ); ?>
        <div class="c-article__header__meta">
            <span class="c-article__header__meta__item c-article__header__meta__item--date"><?php echo get_the_time( 'd M, Y' ); ?></span>
            <a href="#comments" class="c-article__header__meta__item c-article__header__meta__item--comments">
                <svg class="c-article__header__meta__item__icon" width="16" height="16" fill="#999" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.2.692h9.6c1.767 0 3.2 1.323 3.2 2.956V9.56c0 1.632-1.433 2.956-3.2 2.956h-8a2.51 2.51 0 00-1.72.628L.68 15.36a.408.408 0 01-.28.11c-.22 0-.4-.165-.4-.369V3.648C0 2.015 1.433.692 3.2.692zm11.2 2.956c0-.816-.716-1.478-1.6-1.478H3.2c-.884 0-1.6.662-1.6 1.478v8.78l.368-.311a4.174 4.174 0 012.832-1.08h8c.884 0 1.6-.661 1.6-1.477V3.648z"/></svg><?php echo get_comments_number(); ?> comments
            </a>
        </div>
	    <?php the_post_thumbnail( 'full', array( 'class' => 'c-article__image' ) ); ?>
    </header>
    <main class="c-article__main">
        <div class="c-article__main__author">
            <img class="c-article__main__author__avatar" src="<?php echo esc_url( get_avatar_url( $post->post_author ) ); ?>" alt="<?php echo get_user_by( 'ID', $post->post_author )->display_name; ?>"/>
            <span class="c-article__main__author__name"><?php echo get_the_author_meta('display_name'); ?></span>
        </div>
        <div class="c-article__content s-article-content u-margin-bottom-huge">
			<?php the_content(); ?>
        </div>
        <div class="c-article__main__tags">
            <span class="c-article__main__tags__title">Tags:&ensp;</span>
            <div class="c-article__main__tags__list">
                <?php the_tags('', ', ', ''); ?>
            </div>
        </div>
    </main>
</article>
<div class="c-comments">
	<?php comments_template(); ?>
</div>
