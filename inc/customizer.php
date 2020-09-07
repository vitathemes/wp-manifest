<?php
add_action( 'init', function () {
// Disable Kiriki help notice
	add_filter( 'kirki_telemetry', '__return_false' );


// Add config
	Kirki::add_config( 'wp-manifest', array(
		'option_type' => 'theme_mod'
	) );

// Add sections \\
// <editor-fold desc="Sections">
// Branding
	Kirki::add_section( 'branding', array(
		'title'    => esc_html__( 'Branding', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 3,
	) );


// Home Page
	Kirki::add_section( 'homepage', array(
		'title'    => esc_html__( 'Homepage', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 4,
	) );

	// Home Page
	Kirki::add_section( 'blogpage', array(
		'title'    => esc_html__( 'Blog Settings', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 4,
	) );

// Typography
	Kirki::add_section( 'typography', array(
		'title'    => esc_html__( 'Typography', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 4,
	) );

// Elements
	Kirki::add_section( 'elements', array(
		'title'    => esc_html__( 'Elements', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 5,
	) );

	// Home Page
	Kirki::add_section( 'footer', array(
		'title'    => esc_html__( 'Footer', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 6,
	) );

// </editor-fold>


// Add Branding fields

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'radio-buttonset',
		'settings' => 'theme_mode',
		'label'    => esc_html__( 'Theme Mode', 'wp-manifest' ),
		'section'  => 'branding',
		'default'  => 'light',
		'priority' => 10,
		'choices'  => [
			'light' => esc_html__( 'Light', 'wp-manifest' ),
			'dark'  => esc_html__( 'Dark', 'wp-manifest' ),
		],
	] );

// -- Branding Fields --
// <editor-fold desc="branding">

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'color',
		'settings' => 'branding_primary_color',
		'label'    => __( 'Primary Color', 'wp-manifest' ),
		'section'  => 'branding',
		'default'  => '#3F51B5',
	] );

// </editor-fold>

// -- Home page Fields --
// <editor-fold desc="HomePage">

// Home Page Title Text
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'editor',
		'settings' => 'homepage_title',
		'label'    => esc_html__( 'Title Text', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => esc_html__( 'Manifest is a newborn theme. Clean, simple and fast.', 'wp-manifest' ),
		'priority' => 10,
	] );


// SliderCategory
	Kirki::add_field( 'wp-manifest', [
		'type'        => 'select',
		'settings'    => 'homepage_slider_category',
		'label'       => esc_html__( 'Select Portfolio Category', 'wp-manifest' ),
		'section'     => 'homepage',
		'placeholder' => esc_html__( 'Select a category...', 'wp-manifest' ),
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => Kirki_Helper::get_terms( array( 'portfolio_category' ) )
	] );

// Add
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'number',
		'settings' => 'homepage_slider_items',
		'label'    => esc_html__( 'Number of Portfolios', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => 8,
		'choices'  => [
			'min'  => 1,
			'max'  => 24,
			'step' => 1,
		],
	] );


	// Info - Left Side
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'editor',
		'settings' => 'homepage_info_left',
		'label'    => esc_html__( 'Info (Left Side)', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => esc_html__( 'Full-time UI/UX designer Head of Design at VeronaLabs.com', 'wp-manifest' ),
		'priority' => 10,
	] );

	// Info - Right Side
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'editor',
		'settings' => 'homepage_info_right',
		'label'    => esc_html__( 'Info (Right Side)', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => esc_html__( 'We work with clients around the world from our headquarters in Charleston, South Carolina. We focus on naming, branding, brand narratives, website design and development, and brand experiences.', 'wp-manifest' ),
		'priority' => 10,
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'        => 'toggle',
		'settings'    => 'show_portfolio_homepage',
		'label'       => esc_html__( 'Show Portfolio', 'wp-manifest' ),
		'section'     => 'homepage',
		'default'     => 1,
		'priority'    => 10,
	] );


	Kirki::add_field( 'wp-manifest', [
		'type'        => 'toggle',
		'settings'    => 'show_latest_posts_homepage',
		'label'       => esc_html__( 'Show latest posts', 'wp-manifest' ),
		'section'     => 'homepage',
		'default'     => 1,
		'priority'    => 10,
	] );

// </editor-fold>

	// -- Home page Fields --
// <editor-fold desc="BlogSettings">

// Home Page Title Text

	Kirki::add_field( 'wp-manifest', [
		'type'        => 'toggle',
		'settings'    => 'show_blog_carousel',
		'label'       => esc_html__( 'Show Blog Carousel', 'wp-manifest' ),
		'section'     => 'blogpage',
		'default'     => 0,
		'priority'    => 10,
	] );


	Kirki::add_field( 'wp-manifest', [
		'type'        => 'toggle',
		'settings'    => 'show_categories',
		'label'       => esc_html__( 'Show Categories', 'wp-manifest' ),
		'section'     => 'blogpage',
		'default'     => 0,
		'priority'    => 10,
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'        => 'toggle',
		'settings'    => 'show_posts_thumbnail',
		'label'       => esc_html__( 'Show Posts Thumbnail', 'wp-manifest' ),
		'section'     => 'blogpage',
		'default'     => 1,
		'priority'    => 10,
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'        => 'toggle',
		'settings'    => 'show_share_icons',
		'label'       => esc_html__( 'Show Social Share Icons', 'wp-manifest' ),
		'section'     => 'blogpage',
		'default'     => 1,
		'priority'    => 10,
	] );

// </editor-fold>

// -- Typography Fields --
// <editor-fold desc="Typography">
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'typography',
		'settings' => 'headings_typography',
		'label'    => esc_html__( 'Headlines', 'wp-manifest' ),
		'section'  => 'typography',
		'default'  => [
			'font-family' => 'Red Hat Display',
			'font-size'   => '48px',
			'variant'     => 'regular',
			//'color'       => '#000'
		],

		'priority'  => 10,
		'transport' => 'auto',
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'color',
		'settings' => 'headings_typography_color',
		'label'    => __( 'Headings Color', 'wp-manifest' ),
		'section'  => 'typography',
		'default'  => '#000',
		'output'   => [
			[
				'element' => 'h1',
				'property' => 'color',
				'transport' => 'postMessage'
			],
			[
				'element' => 'h2',
				'property' => 'color',
				'transport' => 'postMessage'
			],
			[
				'element' => 'h3',
				'property' => 'color',
				'transport' => 'postMessage'
			],
			[
				'element' => 'h4',
				'property' => 'color',
				'transport' => 'postMessage'
			],
			[
				'element' => 'h5',
				'property' => 'color',
				'transport' => 'postMessage'
			],
			[
				'element' => 'h6',
				'property' => 'color',
				'transport' => 'postMessage'
			]
		]
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'      => 'typography',
		'settings'  => 'text_typography',
		'label'     => esc_html__( 'Texts', 'wp-manifest' ),
		'section'   => 'typography',
		'default'   => [
			'font-family' => 'Lato',
			'variant'     => 'regular',
			'font-size'   => '19px',
			'line-height' => '1.5',
			//'color'       => '#000',
		],
		'output'    => [
			[
				'element' => 'body',
			]
		],
		'priority'  => 10,
		'transport' => 'auto',
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'color',
		'settings' => 'text_typography_color',
		'label'    => __( 'Text Color', 'wp-manifest' ),
		'section'  => 'typography',
		'default'  => '#565656',
		'output'   => [
			[
				'element' => 'p',
				'property' => 'color',
				'transport' => 'auto'
			]
		]
	] );
// </editor-fold>

	// -- Footer Fields --
// <editor-fold desc="Footer">
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'text',
		'settings' => 'footer_title',
		'label'    => esc_html__( 'Footer Title', 'wp-manifest' ),
		'section'  => 'footer',
		'default'  => "Need a project?",
		'priority' => 10,
	] );

	// Phone Number
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'text',
		'settings' => 'footer_phone',
		'label'    => esc_html__( 'Phone', 'wp-manifest' ),
		'section'  => 'footer',
		'default'  => "(239) 555-0108",
		'priority' => 10,
	] );

	// Phone Number
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'text',
		'settings' => 'footer_email',
		'label'    => esc_html__( 'Email', 'wp-manifest' ),
		'section'  => 'footer',
		'default'  => "tanya.hill@example.com",
		'priority' => 10,
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'text',
		'settings' => 'copyright_text',
		'label'    => esc_html__( 'Copyright Text', 'wp-manifest' ),
		'section'  => 'footer',
		'default'  => "© Copyright Manifest Theme. Allrights reserved",
		'priority' => 10,
	] );

// </editor-fold>


} );

function wp_manifest_add_edit_icons( $wp_customize ) {
	$wp_customize->selective_refresh->add_partial( 'homepage_title', array(
		'selector' => '.homepage-title',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.description',
	) );

	$wp_customize->selective_refresh->add_partial( 'homepage_info_left', array(
		'selector' => '.c-info__col__title',
	) );

	$wp_customize->selective_refresh->add_partial( 'homepage_info_right', array(
		'selector' => '.c-info__col--desc',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_posts_thumbnail', array(
		'selector' => '.c-article__header__image',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_post_thumbnail', array(
		'selector' => '.post-thumbnail',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_share_icons', array(
		'selector' => '.c-social-share',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.c-header__site-title',
	) );
}

add_action( 'customize_preview_init', 'wp_manifest_add_edit_icons' );

function wp_manifest_enqueue_fonts() {
	$wp_manifest_text_typography    = get_theme_mod( 'text_typography' );
	$wp_manifest_heading_typography = get_theme_mod( 'headings_typography' );

	if ( $wp_manifest_heading_typography['font-family'] ) {
		wp_enqueue_style( 'wp-manifest-headings-fonts', '//fonts.googleapis.com/css2?family=' . $wp_manifest_heading_typography['font-family'] . ':wght@' . $wp_manifest_heading_typography['font-weight'] );
	} else {
		wp_enqueue_style( 'wp-manifest-headings-fonts', '//fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400' );
	}
	if ( $wp_manifest_text_typography['font-family'] ) {
		wp_enqueue_style( 'wp-manifest-body-font', '//fonts.googleapis.com/css2?family=' . $wp_manifest_text_typography['font-family'] . ':wght@' . $wp_manifest_heading_typography['font-weight'] );
	} else {
		wp_enqueue_style( 'wp-manifest-body-font', '//fonts.googleapis.com/css2?family=Lato:wght@400' );
	}
}

add_action( 'wp_head', 'wp_manifest_enqueue_fonts' );
add_action( 'admin_head', 'wp_manifest_enqueue_fonts' );

function wp_manifest_customize_preview_js() {
	wp_enqueue_script( 'wp-manifest-js-customizer', get_template_directory_uri() . '/js/customizer.js', array(), false, true );
}

add_action( 'customize_controls_enqueue_scripts', 'wp_manifest_customize_preview_js' );
