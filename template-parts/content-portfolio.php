<article class="c-portfolio">
	<div class="c-portfolio__content">
		<?php the_title('<h3 class="c-portfolio__content__title">', '</h3>') ?>
		<ul class="c-portfolio__content__categories">
			<?php
			//get all the categories the post belongs to
			$categories = wp_get_post_terms( get_the_ID() , 'portfolio_category' );
			//loop through them
			foreach($categories as $c){
				$cat = get_category( $c );
				//get the name of the category
				$cat_id = $cat->term_id;
				//make a list item containing a link to the category
				echo '<li class="c-portfolio__content__categories__item"><a class="c-portfolio__content__categories__item__link" href="'. esc_url(get_category_link($cat_id)) .'">'. esc_html($cat->name) .'</a></li>';
			}
			?>
		</ul>
		<time class="c-portfolio__content__date">
			<?php echo get_the_date('Y') ?>
		</time>
		<div class="c-portfolio__content__read-more">
			<a class="c-btn c-btn--primary" href="<?php the_permalink(); ?>">View More <span class="c-btn__icon dashicons dashicons-arrow-right-alt"></span></a>
		</div>
	</div>
	<div class="c-portfolio__image">
		<?php the_post_thumbnail( 'wp_manifest_medium_square', array( 'class' => 'c-portfolio__image__img' ) ); ?>
	</div>
</article>
