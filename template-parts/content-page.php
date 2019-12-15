<div class="o-page">
    <div class="o-container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

			the_title( '<h1 class="single-title">', '</h1>' );
			?>

			<?php the_content(); ?><?php endwhile; ?><?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
    </div>
</div>