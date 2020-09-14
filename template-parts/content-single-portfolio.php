<article class="c-portfolio c-portfolio--single">
	<span class="c-portfolio__tagline">CASE STUDY</span>
	<?php the_title('<h1 class="c-portfolio__title">', '</h1>') ?>
    <div class="c-portfolio__image">
		<?php the_post_thumbnail( 'wp_manifest_single_portfolio', array( 'class' => 'c-portfolio__image__img' ) ); ?>
    </div>
    <div class="c-portfolio__content s-content">
        <?php the_content(); ?>
    </div>
</article>
