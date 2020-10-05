<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'wp-manifest' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php
			/* translators: 1: link to WP admin new post page. */
			printf(
				'<p>' . wp_kses(
				/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wp-manifest' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		<?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp-manifest' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-manifest' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
