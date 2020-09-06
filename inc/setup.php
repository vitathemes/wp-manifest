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

	/**
	 * Add support Editor Style
	 *
	 */
	add_theme_support( 'editor-styles' );
}

add_action( 'after_setup_theme', 'wp_manifest_setup' );
/**
 * Enqueue scripts and styles.
 */
// External Assets
function wp_manifest_scripts() {
	wp_enqueue_style( 'wp-manifest-style', get_stylesheet_uri() );
	wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
	wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), false, true );
	wp_enqueue_script( 'flickity-hash', 'https://unpkg.com/flickity-hash@1/hash.js', array(), false, true );
	wp_enqueue_script( 'wp-manifest-script', get_template_directory_uri() . '/js/main.js', array(
		'flickity',
		'flickity-hash'
	), false, true );
	wp_enqueue_script( 'wp-manifest-navigation-script', get_template_directory_uri() . '/js/navigation.js', array(), false, true );

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
			'show_in_rest'        => true,
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
add_image_size( 'wp_manifest_single_portfolio', 1120, 472, true );


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

function wp_manifest_register_sidebars() {

	register_sidebar( array(
		'name'          => 'Footer widget area 1',
		'id'            => 'footer-widgets-1',
		'before_widget' => '<div class="c-widget s-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer widget area 2',
		'id'            => 'footer-widgets-2',
		'before_widget' => '<div class="c-widget s-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer widget area 3',
		'id'            => 'footer-widgets-3',
		'before_widget' => '<div class="c-widget s-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Pages widget area',
		'id'            => 'page-widget-area',
		'before_widget' => '<div class="c-widget s-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'wp_manifest_register_sidebars' );

function wp_manifest_editor_style() {
	wp_enqueue_style( 'wp-manifest-block-editor-style', get_theme_file_uri( '/inc/editor/style-editor.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
}

add_action( 'admin_init', 'wp_manifest_editor_style' );

define( 'JETPACK_DEV_DEBUG', true );
add_filter( 'jetpack_development_mode', '__return_true' );

add_theme_support( 'infinite-scroll', array(
	'type'           => 'click',
	'footer_widgets' => array( 'footer-widgets-1', 'footer-widgets-2', 'footer-widgets-3' ),
	'container'      => 'site-content',
	'footer'         => 'footer',
	'wrapper'        => true,
	'render'         => false,
	'posts_per_page' => false,
) );


function wp_manifest_enqueue_editor_scripts() {
	wp_enqueue_script(
		'wp_manifest_blocks_scripts',
		get_template_directory_uri() . "/js/blocks.js",
		array( 'wp-blocks', 'wp-dom' ),
		false,
		true
	);
}

add_action( 'enqueue_block_editor_assets', 'wp_manifest_enqueue_editor_scripts' );

function wp_manifest_enqueue_customizer_style( $hook_suffix ) {
	// Load your css.
	wp_register_style( 'kirki-styles-css', get_template_directory_uri() . '/inc/editor/kirki-controls-style.css', false, '1.0.0' );
	wp_enqueue_style( 'kirki-styles-css' );
}

add_action( 'admin_enqueue_scripts', 'wp_manifest_enqueue_customizer_style' );


function wp_manifest_color_palette() {
	$wp_manifest_text_typography            = get_theme_mod( 'text_typography' );
	$wp_manifest_heading_typography         = get_theme_mod( 'headings_typography' );
	$wp_manifest_default_heading_typography = array(
		'font-family' => "Red Hat Display",
		'font-size'   => "48px",
		'variant'     => 'regular',
		'line-height' => '1.5',
		'color'       => '#000000'
	);
	$default_text_typography                = array(
		'font-family' => "Lato",
		'font-size'   => "19px",
		'variant'     => 'regular',
		'line-height' => '1.5',
		'color'       => '#565656'
	);

	if ( empty( $wp_manifest_heading_typography ) || $wp_manifest_heading_typography['font-family'] == "" ) {
		$wp_manifest_heading_typography = $wp_manifest_default_heading_typography;
	} else {
		$wp_manifest_heading_typography = array_merge( $wp_manifest_default_heading_typography, $wp_manifest_heading_typography );
	}
	if ( empty( $wp_manifest_text_typography ) ) {
		$wp_manifest_text_typography = $default_text_typography;
	} else {
		$wp_manifest_text_typography = array_merge( $default_text_typography, $wp_manifest_text_typography );
	}

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Theme Primary', 'wp-manifest' ),
			'slug'  => 'theme-primary',
			'color' => get_theme_mod( "branding_primary_color", "#3F51B5" ),
		),
		array(
			'name'  => __( 'Theme Secondary', 'wp-manifest' ),
			'slug'  => 'theme-secondary',
			'color' => $wp_manifest_heading_typography["color"],
		),
		array(
			'name'  => __( 'Theme Tertiary', 'wp-manifest' ),
			'slug'  => 'theme-tertiary',
			'color' => $wp_manifest_text_typography['color'],
		),
		array(
			'name'  => __( 'Primary Gray', 'wp-manifest' ),
			'slug'  => 'primary-gray',
			'color' => '#323232',
		),
		array(
			'name'  => __( 'Dark Gray', 'wp-manifest' ),
			'slug'  => 'dark-gray',
			'color' => '#7B7B7B',
		),
		array(
			'name'  => __( 'Gray', 'wp-manifest' ),
			'slug'  => 'gray',
			'color' => '#CCCCCC',
		),
		array(
			'name'  => __( 'Light Gray', 'wp-manifest' ),
			'slug'  => 'light-gray',
			'color' => '#F4F4F4',
		),
		array(
			'name'  => __( 'White', 'wp-manifest' ),
			'slug'  => 'white',
			'color' => '#FFFFFF',
		),
	) );
}

add_action( 'init', 'wp_manifest_color_palette' );
