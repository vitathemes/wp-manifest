<?php

class Wp_manifest_walker_comment extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int $depth Depth of the current comment.
	 * @param array $args An array of arguments.
	 *
	 * @see wp_list_comments()
	 *
	 */
	protected function html5_comment( $comment, $depth, $args ) {

		$wp_indigo_tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		?>
        <<?php echo esc_html( $wp_indigo_tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
        <article id="comment div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-avatar">
				<?php
				$comment_author_link = get_comment_author_link( $comment );
				$comment_author_url  = get_comment_author_url( $comment );
				$comment_author      = get_comment_author( $comment );
				$avatar              = get_avatar( $comment, $args['avatar_size'] );
				if ( 0 != $args['avatar_size'] ) {
					if ( empty( $comment_author_url ) ) {
						echo $avatar;
					} else {
						printf( '<a href="%s" rel="external nofollow" class="url">', esc_url( $comment_author_url ) );
						echo $avatar;
					}
				}
				?>
            </div>
            <div class="comment-content">
                <div class="comment-header">
                    <div class="comment-author vcard">
		                <?php
		                printf(
			                wp_kses(
			                /* translators: %s: comment author link */
				                __( '%s <span class="screen-reader-text says">says:</span>', 'wp-indigo' ),
				                array(
					                'span' => array(
						                'class' => array(),
					                ),
				                )
			                ),
			                '<b class="fn">' . get_comment_author_link( $comment ) . '</b>'
		                );

		                if ( ! empty( $comment_author_url ) ) {
			                echo '</a>';
		                }
		                ?>
                    </div><!-- .comment-author -->

                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
			                <?php
			                /* translators: 1: comment date, 2: comment time */
			                $comment_timestamp = sprintf( __( '%1$s at %2$s', 'wp-indigo' ), get_comment_date( '', $comment ), get_comment_time() );
			                ?>
                            <time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo $comment_timestamp; ?>">
				                <?php echo $comment_timestamp; ?>
                            </time>
                        </a>
		                <?php
		                edit_comment_link( __( 'Edit', 'wp-indigo' ), '<span class="edit-link-sep">&mdash;</span> ' );
		                ?>
                    </div><!-- .comment-metadata -->
                </div>

				<?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wp-indigo' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>

	            <?php
	            comment_reply_link(
		            array_merge(
			            $args,
			            array(
				            'add_below' => 'div-comment',
				            'depth'     => $depth,
				            'max_depth' => $args['max_depth'],
				            'before'    => '<div class="comment-reply">',
				            'after'     => '</div>',
			            )
		            )
	            );
	            ?>
            </div>

            <!-- .comment-content -->

        </article><!-- .comment-body -->
		<?php
	}
}
