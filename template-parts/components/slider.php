<?php

$posts_category = get_theme_mod( 'homepage_slider_category' );
$posts_number   = get_theme_mod( 'homepage_slider_items' , 8 );

$portfolios_params = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => $posts_number,
);

if ( $posts_category != 0 ) {
	$portfolios_params['tax_query'] = array(
		array(
			'taxonomy' => 'portfolio_category',
			'field'    => 'id',
			'terms'    => array($posts_category),
		)
	);
}

$portfolios = new WP_Query($portfolios_params);

if ( $portfolios->have_posts() ) :
	?>
    <section class="c-slider">
        <div class="c-slider__main js-slider">
			<?php
			while ( $portfolios->have_posts() ): $portfolios->the_post();
				?>
                <div class="c-slider__slide js-slider-slide">
                    <div class="c-slider__slide-main">
                        <a href="<?php the_permalink(); ?>" class="c-slider__slide-link">
							<?php the_post_thumbnail( 'wp_manifest_medium_square', array( 'class' => 'c-slider__image' ) ); ?>
							<?php the_title( '<h3 class="c-slider__title">', '</h3>' ) ?>
                        </a>
                    </div>
                </div>

			<?php
			endwhile;
			?>
        </div>
    </section>

<?php
endif;
