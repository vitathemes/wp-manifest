<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_manifest_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'wp-manifest', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary', 'wp-manifest' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}

add_action( 'after_setup_theme', 'wp_manifest_setup' );
/**
 * Enqueue scripts and styles.
 */
// External Assets
function wp_manifest_scripts() {
	wp_enqueue_style( 'wp-manifest-style', get_stylesheet_uri());
	wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
	wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), false, true );
	wp_enqueue_script( 'flickity-hash', 'https://unpkg.com/flickity-hash@1/hash.js', array(), false, true );
	wp_enqueue_script( 'wp-manifest-script', get_template_directory_uri() . '/js/main.js', array('flickity', 'flickity-hash'), false, true );

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_manifest_scripts' );


// Portfolio Post Type
if ( ! function_exists( 'register_portfolio' ) ) {

	function register_portfolio() {

		$labels = array(
			'name'                  => _x( 'Portfolio', 'Post Type General Name', 'wp-manifest' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'wp-manifest' ),
			'menu_name'             => __( 'Portfolio', 'wp-manifest' ),
			'name_admin_bar'        => __( 'Portfolio', 'wp-manifest' ),
			'archives'              => __( 'Item Archives', 'wp-manifest' ),
			'attributes'            => __( 'Item Attributes', 'wp-manifest' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wp-manifest' ),
			'all_items'             => __( 'All Items', 'wp-manifest' ),
			'add_new_item'          => __( 'Add New Item', 'wp-manifest' ),
			'add_new'               => __( 'Add New', 'wp-manifest' ),
			'new_item'              => __( 'New Item', 'wp-manifest' ),
			'edit_item'             => __( 'Edit Item', 'wp-manifest' ),
			'update_item'           => __( 'Update Item', 'wp-manifest' ),
			'view_item'             => __( 'View Item', 'wp-manifest' ),
			'view_items'            => __( 'View Items', 'wp-manifest' ),
			'search_items'          => __( 'Search Item', 'wp-manifest' ),
			'not_found'             => __( 'Not found', 'wp-manifest' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wp-manifest' ),
			'featured_image'        => __( 'Featured Image', 'wp-manifest' ),
			'set_featured_image'    => __( 'Set featured image', 'wp-manifest' ),
			'remove_featured_image' => __( 'Remove featured image', 'wp-manifest' ),
			'use_featured_image'    => __( 'Use as featured image', 'wp-manifest' ),
			'insert_into_item'      => __( 'Insert into item', 'wp-manifest' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-manifest' ),
			'items_list'            => __( 'Items list', 'wp-manifest' ),
			'items_list_navigation' => __( 'Items list navigation', 'wp-manifest' ),
			'filter_items_list'     => __( 'Filter items list', 'wp-manifest' ),
		);
		$args   = array(
			'label'               => __( 'Portfolio', 'wp-manifest' ),
			'description'         => __( 'Portfolio', 'wp-manifest' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'        => false,
			'taxonomies'          => array( 'portfolio-category' ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 25,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-grid-view',
		);
		register_post_type( 'portfolio', $args );

	}

	add_action( 'init', __NAMESPACE__ . '\register_portfolio', 0 );

}
// Register Custom Post type Taxonomy
function register_portfolio_category() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'wp-manifest' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'wp-manifest' ),
		'menu_name'                  => __( 'Category', 'wp-manifest' ),
		'all_items'                  => __( 'All Items', 'wp-manifest' ),
		'parent_item'                => __( 'Parent Item', 'wp-manifest' ),
		'parent_item_colon'          => __( 'Parent Item:', 'wp-manifest' ),
		'new_item_name'              => __( 'New Item Name', 'wp-manifest' ),
		'add_new_item'               => __( 'Add New Item', 'wp-manifest' ),
		'edit_item'                  => __( 'Edit Item', 'wp-manifest' ),
		'update_item'                => __( 'Update Item', 'wp-manifest' ),
		'view_item'                  => __( 'View Item', 'wp-manifest' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wp-manifest' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wp-manifest' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wp-manifest' ),
		'popular_items'              => __( 'Popular Items', 'wp-manifest' ),
		'search_items'               => __( 'Search Items', 'wp-manifest' ),
		'not_found'                  => __( 'Not Found', 'wp-manifest' ),
		'no_terms'                   => __( 'No items', 'wp-manifest' ),
		'items_list'                 => __( 'Items list', 'wp-manifest' ),
		'items_list_navigation'      => __( 'Items list navigation', 'wp-manifest' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
}

add_action( 'init', __NAMESPACE__ . '\register_portfolio_category', 0 );


function remove_unused_sections( $wp_customize ) {
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'colors' );
}

add_action( 'customize_register', 'remove_unused_sections', 11 );

add_image_size( 'wp_manifest_article_thumbnail', 352, 258, true );
add_image_size( 'wp_manifest_article_thumbnailx2', 702, 516, true );
add_image_size( 'wp_manifest_medium', 544, 0, true );
add_image_size( 'wp_manifest_medium_square', 544, 544, true );


//
function wp_manifest_is_comment_by_post_author( $comment = null ) {
	if ( is_object( $comment ) && $comment->user_id > 0 ) {
		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );
		if ( ! empty( $user ) && ! empty( $post ) ) {
			return $comment->user_id === $post->post_author;
		}
	}

	return false;
}

// Remove unnecessary fields from comment form
add_filter( 'comment_form_default_fields', 'website_field_remove' );
function website_field_remove( $fields ) {
	if ( isset( $fields['url'] ) ) {
		//unset( $fields['url'] );
		//unset( $fields['cookies'] );
	}

	return $fields;
}

if ( ! isset( $content_width ) ) {
	$content_width = 560;
}

function wp_manifest_rearrange_form_fields( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'wp_manifest_rearrange_form_fields' );
