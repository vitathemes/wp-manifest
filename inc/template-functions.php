<?php
// Register Menu
function wpmanifest_register_primary_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'wp-manifest' ) );
}
add_action( 'after_setup_theme', 'wpmanifest_register_primary_menu' );

// Menu Generator
function wpmanifest_show_menu() {
	if ( has_nav_menu( 'primary-menu' ) ) {
		$wpmanifest_menu_args = array(
			'theme_location' => 'primary-menu',
			'menu_class'     => 'list navigation',
			'menu_id'        => 'navigation',
			'container'      => '',
			'depth'          => 2,
		);
		wp_nav_menu( $wpmanifest_menu_args );
	}
}

// Show Post Tags
function wpmanifest_show_tags() {
	the_tags( '', ' ', '' );
}

// Show Name Field
function wpmanifest_show_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
}

// Load theme typography
function wpmanifest_typography() {
	$wpmanifest_text_typography            = get_theme_mod( 'text_typography' );
	$wpmanifest_heading_typography         = get_theme_mod( 'headings_typography' );
	$wpmanifest_default_heading_typography = array(
		'font-family' => "Roboto Mono",
		'font-size'   => "26px",
		'variant'     => 'regular',
		'line-height' => '31px',
		'color'       => '#1a1a1a'
	);
	$default_text_typography             = array(
		'font-family' => "Roboto Mono",
		'font-size'   => "16px",
		'variant'     => 'regular',
		'line-height' => '28px',
		'color'       => '#666666'
	);
	if ( empty( $wpmanifest_heading_typography ) ) {
		$wpmanifest_heading_typography = $wpmanifest_default_heading_typography;
	} else {
		$wpmanifest_heading_typography = array_merge( $wpmanifest_default_heading_typography, $wpmanifest_heading_typography );
	}
	if ( empty( $wpmanifest_text_typography ) ) {
		$wpmanifest_text_typography = $default_text_typography;
	} else {
		$wpmanifest_text_typography = array_merge( $default_text_typography, $wpmanifest_text_typography );
	}
	$html = ':root {
				--heading-typography-font-size: ' . $wpmanifest_heading_typography["font-size"] . ';
	            --heading-typography-font-family: ' . $wpmanifest_heading_typography["font-family"] . ';
	            --heading-typography-line-height: ' . $wpmanifest_heading_typography["line-height"] . ';
	            --heading-typography-variant: ' . $wpmanifest_heading_typography["variant"] . ';
	            --text-typography-font-size: ' . $wpmanifest_text_typography["font-size"] . ';
	            --text-typography-font-family: ' . $wpmanifest_text_typography["font-family"] . ';
	            --text-typography-line-height: ' . $wpmanifest_text_typography["line-height"] . ';
	            --text-typography-variant: ' . $wpmanifest_text_typography["variant"] . ';
	
	            --primary-color: ' . get_theme_mod( "branding_primary_color", "#3F51B5" ) . ';
	            --secondary-color: ' . $wpmanifest_heading_typography["color"] . ';
	            --tertiary-color: ' . $wpmanifest_text_typography['color'] . ';
			}';
	echo esc_html( $html );
}

//
function wpmanifest_get_discussion_data() {
	static $discussion, $post_id;
	$wpmanifest_current_post_id = get_the_ID();
	if ( $wpmanifest_current_post_id === $post_id ) {
		return $discussion; /* If we have discussion information for post ID, return cached object */
	} else {
		$post_id = $wpmanifest_current_post_id;
	}
	$wpmanifest_comments = get_comments(
		array(
			'post_id' => $wpmanifest_current_post_id,
			'orderby' => 'comment_date_gmt',
			'order'   => get_option( 'comment_order', 'asc' ), /* Respect comment order from Settings » Discussion. */
			'status'  => 'approve',
			'number'  => 20, /* Only retrieve the last 20 comments, as the end goal is just 6 unique authors */
		)
	);
	$wpmanifest_authors  = array();
	foreach ( $wpmanifest_comments as $wpmanifest_comment ) {
		$wpmanifest_authors[] = ( (int) $wpmanifest_comment->user_id > 0 ) ? (int) $wpmanifest_comment->user_id : $wpmanifest_comment->comment_author_email;
	}
	$wpmanifest_authors = array_unique( $wpmanifest_authors );
	$discussion       = (object) array(
		'authors'   => array_slice( $wpmanifest_authors, 0, 6 ),
		/* Six unique authors commenting on the post. */
		'responses' => get_comments_number( $wpmanifest_current_post_id ),
		/* Number of responses. */
	);

	return $discussion;
}

//
function wpmanifest_comment_form( $wpmanifest_order ) {
	if ( true === $wpmanifest_order || strtolower( $wpmanifest_order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {
		$wpmanifest_fields = array(
			'author'  =>
				'<p class="comment-form-author">' .
				'<input placeholder="' . esc_html( 'Your Name', 'wp-manifest' ) . '" id="author" name="author" type="text" size="30" /></p>',
			'email'   =>
				'<p class="comment-form-email">' .
				'<input placeholder="' . esc_html( 'Comments are disabled.', 'wp-manifest' ) . '" id="email" name="email" type="email" value="" size="30" /></p>',
			'url'     => '',
			'cookies' => ''
		);
		comment_form(
			array(
				'logged_in_as'         => null,
				'title_reply'          => null,
				'comment_notes_before' => false,
				'label_submit'         => 'Submit',
				'fields'               => $wpmanifest_fields,
				'comment_field'        => '<p class="comment-form-comment"><textarea placeholder="' . esc_html( 'Write Your Comment', 'wp-manifest' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
			)
		);
	}
}
