<?php
/* Template Name: Page (With Sidebar) */
/**
 *
 * The template for displaying pages with sidebar
 *
 */
get_header();
?>

	<div class="o-container">
		<div id="content" class="o-page o-page--default">
			<div class="u-flex u-flex-wrap-m">
				<div class="o-page__sidebar">
					<?php the_title('<h1 class="o-page__title u-hide-m">', '</h1>'); ?>
					<?php
					if ( is_active_sidebar( 'page-widget-area' ) ) :
						dynamic_sidebar( 'page-widget-area' );
					endif;
					?>
				</div>
				<div class="o-page__main">
					<?php the_title('<h2 class="o-page__title u-hide">', '</h2>'); ?>
					<?php
					while ( have_posts() ): the_post();
						the_content();
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
