<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WP_Manifest
 */

require "classes/wp_manifest_walker_comment.php";

// Register Menu
function wp_manifest_register_primary_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'wp-manifest' ) );
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_manifest_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wp_manifest_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wp_manifest_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wp_manifest_pingback_header' );

// Menu Generator
function wp_manifest_show_menu() {
	if ( has_nav_menu( 'primary-menu' ) ) {
		$wp_manifest_menu_args = array(
			'theme_location' => 'primary-menu',
			'menu_class'     => 's-header-menu c-header__menu-items',
			'menu_id'        => 'navigation',
			'container'      => '',
			'depth'          => 2,
		);
		wp_nav_menu( $wp_manifest_menu_args );
	}
}

// Load theme typography
function wp_manifest_typography() {
	$wp_manifest_text_typography            = get_theme_mod( 'text_typography' );
	$wp_manifest_heading_typography         = get_theme_mod( 'headings_typography' );
	$wp_manifest_default_heading_typography = array(
		'font-family' => "Red Hat Display",
		'font-size'   => "48px",
		'variant'     => 'regular',
		'line-height' => '64px',
		'color'       => '#1a1a1a'
	);
	$default_text_typography               = array(
		'font-family' => "Lato",
		'font-size'   => "16px",
		'variant'     => 'regular',
		'line-height' => '32px',
		'color'       => '#666666'
	);

	if ( empty( $wp_manifest_heading_typography) || $wp_manifest_heading_typography['font-family'] == "" ) {
		$wp_manifest_heading_typography = $wp_manifest_default_heading_typography;
	} else {
		$wp_manifest_heading_typography = array_merge( $wp_manifest_default_heading_typography, $wp_manifest_heading_typography );
	}
	if ( empty( $wp_manifest_text_typography ) ) {
		$wp_manifest_text_typography = $default_text_typography;
	} else {
		$wp_manifest_text_typography = array_merge( $default_text_typography, $wp_manifest_text_typography );
	}

	$html = ':root {
				--heading-typography-font-size: ' . $wp_manifest_heading_typography["font-size"] . ';
	            --heading-typography-font-family: ' . $wp_manifest_heading_typography["font-family"] . ';
	            --heading-typography-line-height: ' . $wp_manifest_heading_typography["line-height"] . ';
	            --heading-typography-variant: ' . $wp_manifest_heading_typography["variant"] . ';
	            --text-typography-font-size: ' . $wp_manifest_text_typography["font-size"] . ';
	            --text-typography-font-family: ' . $wp_manifest_text_typography["font-family"] . ';
	            --text-typography-line-height: ' . $wp_manifest_text_typography["line-height"] . ';
	            --text-typography-variant: ' . $wp_manifest_text_typography["variant"] . ';
	
	            --primary-color: ' . get_theme_mod( "branding_primary_color", "#3F51B5" ) . ';
	            --secondary-color: ' . $wp_manifest_text_typography['color'] . ';
	            --tertiary-color: ' . $wp_manifest_heading_typography["color"] . ';
			}';
	echo esc_html( $html );
}

function wp_manifest_get_post_primary_category( $post_id, $term = 'category', $return_all_categories = false ) {
	$return = array();

	if ( class_exists( 'WPSEO_Primary_Term' ) ) {
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
		$primary_term       = get_term( $wpseo_primary_term->get_primary_term() );

		if ( ! is_wp_error( $primary_term ) ) {
			$return['primary_category'] = $primary_term;
		}
	}

	if ( empty( $return['primary_category'] ) || $return_all_categories ) {
		$categories_list = get_the_terms( $post_id, $term );

		if ( empty( $return['primary_category'] ) && ! empty( $categories_list ) ) {
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ( $return_all_categories ) {
			$return['all_categories'] = array();

			if ( ! empty( $categories_list ) ) {
				foreach ( $categories_list as &$category ) {
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return;
}

function wp_manifest_get_discussion_data() {
	static $discussion, $post_id;
	$wp_indigo_current_post_id = get_the_ID();
	if ( $wp_indigo_current_post_id === $post_id ) {
		return $discussion; /* If we have discussion information for post ID, return cached object */
	} else {
		$post_id = $wp_indigo_current_post_id;
	}
	$wp_indigo_comments = get_comments(
		array(
			'post_id' => $wp_indigo_current_post_id,
			'orderby' => 'comment_date_gmt',
			'order'   => get_option( 'comment_order', 'asc' ), /* Respect comment order from Settings » Discussion. */
			'status'  => 'approve',
			'number'  => 20, /* Only retrieve the last 20 comments, as the end goal is just 6 unique authors */
		)
	);
	$wp_indigo_authors  = array();
	foreach ( $wp_indigo_comments as $wp_indigo_comment ) {
		$wp_indigo_authors[] = ( (int) $wp_indigo_comment->user_id > 0 ) ? (int) $wp_indigo_comment->user_id : $wp_indigo_comment->comment_author_email;
	}
	$wp_indigo_authors = array_unique( $wp_indigo_authors );
	$discussion        = (object) array(
		'authors'   => array_slice( $wp_indigo_authors, 0, 6 ),
		/* Six unique authors commenting on the post. */
		'responses' => get_comments_number( $wp_indigo_current_post_id ),
		/* Number of responses. */
	);

	return $discussion;
}

function wp_manifest_comment_form() {
	$wp_indigo_commenter     = wp_get_current_commenter();

	$wpindigo_fields = array(
		'author'  =>
			'<p class="comment-form-author">' .
			'<input placeholder="' . esc_attr__( 'Your Name', 'wp-indigo' ) . '" value="' . esc_attr( $wp_indigo_commenter['comment_author'] ) . '" id="author" name="author" type="text" size="30" /></p>',
		'email'   =>
			'<p class="comment-form-email">' .
			'<input placeholder="' . esc_attr__( 'Your Email', 'wp-indigo' ) . '" value="' . esc_attr( $wp_indigo_commenter['comment_author_email'] ) . '" id="email" name="email" type="email" value="" size="30" /></p>',
		'url'     =>
			'<p class="comment-form-email">' .
			'<input placeholder="' . esc_attr__( 'Your Website', 'wp-indigo' ) . '" value="' . esc_attr( $wp_indigo_commenter['comment_author_url'] ) . '"  id="url" name="url" type="url" value="" size="30" maxlength="200" /></p>',
		'cookies' => '<p class="comment-form-cookies-consent comment-form-cookies"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label class="cookie-label" for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>'
	);


	comment_form(
		array(
			'logged_in_as'         => null,
			'title_reply'          => null,
			'comment_notes_before' => false,
			'label_submit'         => 'Submit',
			'fields'               => $wpindigo_fields,
			'comment_field'        => '<p class="comment-form-comment"><textarea placeholder="' . esc_html( 'Write Your Comment', 'wp-indigo' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
		)
	);
}

function wp_manifest_generate_post_category( $post_id ) {
	$category      = wp_manifest_get_post_primary_category( $post_id );
	$category_name = $category['primary_category']->name;
	$category_link = get_category_link( $category['primary_category']->term_id );

	return sprintf( '<a class="c-post__header__category" href="%s">%s</a>', $category_link, $category_name );
}


function wp_manifest_show_post_data( $post_id ) {
	$category = wp_manifest_generate_post_category( $post_id );
	$date     = sprintf( '<span class="c-post__header__date">%s</span>', get_the_time( 'd M, Y' ) );
	echo $category . $date;
}

function wp_manifest_get_post_category( $post_id ) {
	$category      = wp_manifest_get_post_primary_category( $post_id );
	$category_name = $category['primary_category']->name;
	$category_link = get_category_link( $category['primary_category']->term_id );

	return array('name' => $category_name,'url' => $category_link);
}

function wp_manifest_generate_srcset($post_id) {
	$x1 = get_the_post_thumbnail_url($post_id, '');
	$x2 = get_the_post_thumbnail_url($post_id, '');

	echo $x1 . " x1, " .  $x2 . " x2";
}
