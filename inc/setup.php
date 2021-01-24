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
//	add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 300,
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
if ( ! function_exists( 'wp_manifest_scripts' ) ) {
	function wp_manifest_scripts() {
		wp_enqueue_style( 'wp-manifest-style', get_stylesheet_uri() );
		wp_style_add_data( 'wp-manifest-style', 'rtl', 'replace' );
		wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
		wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), false, true );
		wp_enqueue_script( 'flickity-hash', 'https://unpkg.com/flickity-hash@1/hash.js', array(), false, true );
		wp_enqueue_script( 'wp-manifest-script', get_template_directory_uri() . '/js/main.js', array(
			'flickity',
			'flickity-hash'
		), false, true );
		wp_enqueue_script( 'wp-manifest-navigation-script', get_template_directory_uri() . '/js/navigation.js', array(), false, true );
		wp_enqueue_style( 'dashicons' );

		if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'wp_manifest_scripts' );

//
if ( ! function_exists( 'wp_manifest_is_comment_by_post_author' ) ) {
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
}

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}
if ( ! function_exists( 'wp_manifest_rearrange_form_fields' ) ) {
	function wp_manifest_rearrange_form_fields( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;

		return $fields;
	}
}

add_filter( 'comment_form_fields', 'wp_manifest_rearrange_form_fields' );

if ( ! function_exists( 'wp_manifest_register_sidebars' ) ) {
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
}

add_action( 'widgets_init', 'wp_manifest_register_sidebars' );

if ( ! function_exists( 'wp_manifest_editor_style' ) ) {
	function wp_manifest_editor_style() {
		wp_enqueue_style( 'wp-manifest-block-editor-style', get_theme_file_uri( '/inc/editor/style-editor.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	}
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

if ( ! function_exists( 'wp_manifest_enqueue_editor_scripts' ) ) {
	function wp_manifest_enqueue_editor_scripts() {
		wp_enqueue_script(
			'wp_manifest_blocks_scripts',
			get_template_directory_uri() . "/js/blocks.js",
			array( 'wp-blocks', 'wp-dom' ),
			false,
			true
		);
	}
}

add_action( 'enqueue_block_editor_assets', 'wp_manifest_enqueue_editor_scripts' );

if ( ! function_exists( 'wp_manifest_enqueue_customizer_style' ) ) {
	function wp_manifest_enqueue_customizer_style( $hook_suffix ) {
		// Load your css.
		wp_register_style( 'kirki-styles-css', get_template_directory_uri() . '/inc/editor/kirki-controls-style.css', false, '1.0.0' );
		wp_enqueue_style( 'kirki-styles-css' );
	}
}

add_action( 'admin_enqueue_scripts', 'wp_manifest_enqueue_customizer_style' );

add_image_size( 'wp_manifest_medium', 540, 0, true );
add_image_size( 'wp_manifest_medium_square', 540, 540, true );
add_image_size( 'wp_manifest_medium_thumbnail', 350, 250, true );
add_image_size( 'wp_manifest_large_thumbnail', 540, 250, true );


/**
 * Register Post-type and Taxonomy
 */
if ( function_exists( 'LibWp' ) ) {
	LibWp()->postType()
	       ->setName( 'portfolio' )
	       ->setLabels( [
		       'name'          => _x( 'Portfolio', 'Post type general name', 'wp-manifest' ),
		       'singular_name' => _x( 'Portfolio', 'Post type singular name', 'wp-manifest' ),
		       'menu_name'     => _x( 'Portfolio', 'Admin Menu text', 'wp-manifest' ),
		       'add_new'       => __( 'Add New', 'wp-manifest' ),
		       'edit_item'     => __( 'Edit Portfolio', 'wp-manifest' ),
		       'view_item'     => __( 'View Portfolio', 'wp-manifest' ),
		       'all_items'     => __( 'All Portfolio', 'wp-manifest' ),
	       ] )
	       ->setFeatures( [
		       'title',
		       'editor',
		       'author',
		       'thumbnail',
		       'excerpt',
		       'comments'
	       ] )
	       ->setArgument( 'show_ui', true )
	       ->register();

	LibWp()->taxonomy()
	       ->setName( 'types' )
	       ->setPostTypes( 'portfolio' )
	       ->setLabels( [
		       'name'          => _x( 'Category', 'taxonomy general name', 'wp-manifest' ),
		       'singular_name' => _x( 'Category', 'taxonomy singular name', 'wp-manifest' ),
		       'search_items'  => __( 'Search Categories', 'wp-manifest' ),
		       'all_items'     => __( 'All Categories', 'wp-manifest' ),
		       'edit_item'     => __( 'Edit Type', 'wp-manifest' ),
		       'add_new_item'  => __( 'Add New Category', 'wp-manifest' ),
		       'new_item_name' => __( 'New Category Name', 'wp-manifest' ),
		       'menu_name'     => __( 'Categories', 'wp-manifest' ),
	       ] )
	       ->register();
}
