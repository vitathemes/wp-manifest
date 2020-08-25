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
                <svg class="c-article__header__meta__item__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"><path d="M5 2h9c1.1 0 2 .9 2 2v7c0 1.1-.9 2-2 2h-2l-5 5v-5H5c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2z" fill="#999999"/></svg><?php echo get_comments_number(); ?> comments
            </a>
        </div>
	    <div class="c-article__header__image">
		    <?php the_post_thumbnail( 'full', array( 'class' => 'c-article__image' ) ); ?>
        </div>
    </header>
    <main class="c-article__main">
        <div class="c-article__main__author">
            <img class="c-article__main__author__avatar" src="<?php echo esc_url( get_avatar_url( $post->post_author ) ); ?>" alt="<?php echo get_user_by( 'ID', $post->post_author )->display_name; ?>"/>
            <span class="c-article__main__author__name"><?php echo get_the_author_meta('display_name'); ?></span>
        </div>
        <div class="c-social-share">
		    <?php
		    $linkedin_url = "https://www.linkedin.com/shareArticle?mini=true&url=" . get_permalink() . "&title=" . get_the_title();
		    $twitter_url  = "https://twitter.com/intent/tweet?url=" . get_permalink() . "&title=" . get_the_title();
		    $facebook_url = "https://www.facebook.com/sharer.php?u=" . get_permalink();
		    ?>

            <a class="c-social-share__link" target="_blank" href="<?php echo esc_url( $facebook_url ); ?>">
                <span class="dashicons dashicons-facebook-alt c-social-share__link__icon"></span>
            </a>

            <a class="c-social-share__link" target="_blank" href="<?php echo esc_url( $twitter_url ); ?>">
                <span class="dashicons dashicons-twitter c-social-share__link__icon"></span>
            </a>

            <a class="c-social-share__link" target="_blank" href="<?php echo esc_url( $linkedin_url ); ?>">
                <span class="dashicons dashicons-linkedin c-social-share__link__icon"></span>
            </a>

        </div>
        <div class="c-article__content s-article-content u-margin-bottom-huge">
			<?php the_content(); ?>
        </div>
                <?php the_tags('<div class="c-article__main__tags"><span class="c-article__main__tags__title">Tags:&ensp;</span><div class="c-article__main__tags__list">', ', ', '</div></div>'); ?>
    </main>
</article>
<div class="c-comments">
	<?php comments_template(); ?>
</div>