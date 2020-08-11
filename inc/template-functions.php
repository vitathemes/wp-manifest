<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WP_Manifest
 */

// Register Menu
function wpmanifest_register_primary_menu() {
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
function wpmanifest_show_menu() {
	if ( has_nav_menu( 'primary-menu' ) ) {
		$wpmanifest_menu_args = array(
			'theme_location' => 'primary-menu',
			'menu_class'     => 's-header-menu c-header__menu-items',
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

	if ( empty( $wpmanifest_heading_typography) || $wpmanifest_heading_typography['font-family'] == "" ) {
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
	            --secondary-color: ' . $wpmanifest_text_typography['color'] . ';
	            --tertiary-color: ' . $wpmanifest_heading_typography["color"] . ';
			}';
	echo esc_html( $html );
}

function wpmanifest_get_post_primary_category( $post_id, $term = 'category', $return_all_categories = false ) {
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


function wpmanifest_generate_post_category( $post_id ) {
	$category      = wpmanifest_get_post_primary_category( $post_id );
	$category_name = $category['primary_category']->name;
	$category_link = get_category_link( $category['primary_category']->term_id );

	return sprintf( '<a class="c-post__header__category" href="%s">%s</a>', $category_link, $category_name );
}


function wpmanifest_show_post_data( $post_id ) {
	$category = wpmanifest_generate_post_category( $post_id );
	$date     = sprintf( '<span class="c-post__header__date">%s</span>', get_the_time( 'd M, Y' ) );
	echo $category . $date;
}

function wpmanifest_get_post_category( $post_id ) {
	$category      = wpmanifest_get_post_primary_category( $post_id );
	$category_name = $category['primary_category']->name;
	$category_link = get_category_link( $category['primary_category']->term_id );

	return array('name' => $category_name,'url' => $category_link);
}

function wpmanifest_generate_srcset($post_id) {
	$x1 = get_the_post_thumbnail_url($post_id, '');
	$x2 = get_the_post_thumbnail_url($post_id, '');

	echo $x1 . " x1, " .  $x2 . " x2";
}
