<article class="c-portfolio c-portfolio--single o-page">
    <ul class="c-portfolio__content__categories">
		<?php
		//get all the categories the post belongs to
		$wp_manifest_categories = wp_get_post_terms( get_the_ID(), 'portfolio_category' );
		//loop through them
		if ( $wp_manifest_categories ) {
			foreach ( $wp_manifest_categories as $c ) {
				$wp_manifest_cat = get_category( $c );
				//get the name of the category
				$wp_manifest_cat_id = $wp_manifest_cat->term_id;
				//make a list item containing a link to the category
				echo '<li class="c-portfolio__content__categories__item"><a class="c-portfolio__content__categories__item__link" href="' . esc_url( get_category_link( $wp_manifest_cat_id ) ) . '">' . esc_html( $wp_manifest_cat->name ) . '</a></li>';
			}
		}
		?>
    </ul>
	<?php the_title( '<h1 class="c-portfolio__title">', '</h1>' ) ?>
    <div class="c-portfolio__image">
		<?php the_post_thumbnail( 'wp_manifest_single_portfolio', array( 'class' => 'c-portfolio__image__img' ) ); ?>
    </div>
    <div class="c-portfolio__content s-content">
		<?php the_content(); ?>
    </div>
</article>
