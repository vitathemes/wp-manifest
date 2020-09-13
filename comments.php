<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

$wp_indigo_discussion = wp_manifest_get_discussion_data();
?>

<div id="comments" class="<?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
    <div class="<?php echo $wp_indigo_discussion->responses > 0 ? 'comments-title-wrap' : 'comments-title-wrap no-responses'; ?>">
        <h2 class="comments-title">
			<?php
			if ( comments_open() ) {
				if ( have_comments() ) {
					esc_html_e( 'Join the Conversation', 'wp-manifest' );
				} else {
					esc_html_e( 'Leave a comment', 'wp-manifest' );
				}
			} else {
				if ( '1' == $wp_indigo_discussion->responses ) {
					/* translators: %s: post title */
					printf( esc_html( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'wp-manifest' ), esc_html( get_the_title() ) ) );
				} else {
					printf(
					/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s reply on &ldquo;%2$s&rdquo;',
							'%1$s replies on &ldquo;%2$s&rdquo;',
							$wp_indigo_discussion->responses,
							'comments title',
							'wp-manifest'
						) ),
						esc_html( number_format_i18n( $wp_indigo_discussion->responses ) ),
						esc_html( get_the_title() )
					);
				}
			}
			?>
        </h2><!-- .comments-title -->

    </div><!-- .comments-title-flex -->
	<?php
	// Show comment form at top if showing newest comments at the top.
	if ( comments_open() ) {
		wp_manifest_comment_form();
	}
	if ( have_comments() ):
		echo "<h3>" . esc_html( 'Comments', 'wp-manifest' ) . "</h3>";
		?>
        <ol class="commentlist comment-list comments">
			<?php
			wp_list_comments(
				array(
					'walker'      => new Wp_manifest_walker_comment(),
					'avatar_size' => 70,
					'short_ping'  => true,
					'style'       => 'ol',
				)
			);
			?>
        </ol><!-- .comment-list -->
		<?php

		// Show comment navigation
		if ( get_comment_pages_count() > 1 ) :
			$wp_indigo_comments_text = __( 'Comments', 'wp-manifest' );
			the_comments_navigation(
				array(
					'prev_text' => sprintf( ' <span class="nav-prev-text"> < <span class="secondary-text">%s</span></span>', esc_html_e( 'Previous', 'wp-manifest' ) ),
					'next_text' => sprintf( '<span class="nav-next-text"><span class="primary-text">%s</span> > </span> ', esc_html_e( 'Next', 'wp-manifest' ) ),
				)
			);
		endif;
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
            <h3 class="no-comments">
				<?php esc_html_e( 'Comments are disabled.', 'wp-manifest' ); ?>
            </h3>
		<?php
		endif;
	endif;
	?>
</div><!-- #comments -->
