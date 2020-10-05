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
	Kirki::add_section( 'header', array(
		'title'    => esc_html__( 'Header', 'wp-manifest' ),
		'panel'    => '',
		'priority' => 6,
	) );

// </editor-fold>


// Header
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'toggle',
		'settings' => 'search_icon_header',
		'label'    => esc_html__( 'Search Icon', 'wp-manifest' ),
		'section'  => 'header',
		'default'  => 1,
		'priority' => 10,
	] );
// Header


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

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'link',
		'settings' => 'homepage_info_left_link',
		'label'    => esc_html__( 'Link url', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => esc_url( '/about' ),
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
		'type'     => 'toggle',
		'settings' => 'show_portfolio_homepage',
		'label'    => esc_html__( 'Show Portfolio', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => 1,
		'priority' => 10,
	] );


	Kirki::add_field( 'wp-manifest', [
		'type'     => 'toggle',
		'settings' => 'show_latest_posts_homepage',
		'label'    => esc_html__( 'Show latest posts', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => 1,
		'priority' => 10,
	] );

// </editor-fold>

	// -- Home page Fields --
// <editor-fold desc="BlogSettings">

// Home Page Title Text

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'toggle',
		'settings' => 'show_blog_carousel',
		'label'    => esc_html__( 'Show Blog Carousel', 'wp-manifest' ),
		'section'  => 'blogpage',
		'default'  => 0,
		'priority' => 10,
	] );


	Kirki::add_field( 'wp-manifest', [
		'type'     => 'toggle',
		'settings' => 'show_categories',
		'label'    => esc_html__( 'Show Categories', 'wp-manifest' ),
		'section'  => 'blogpage',
		'default'  => 0,
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'radio-buttonset',
		'settings'    => 'categories_type',
		'label'       => esc_html__( 'Categories style', 'kirki' ),
		'section'     => 'blogpage',
		'default'     => 'dropdown',
		'priority'    => 10,
		'choices'     => [
			'dropdown'   => esc_html__( 'Dropdown', 'kirki' ),
			'list' => esc_html__( 'List', 'kirki' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'show_categories',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );


	Kirki::add_field( 'wp-manifest', [
		'type'     => 'toggle',
		'settings' => 'show_posts_thumbnail',
		'label'    => esc_html__( 'Show Posts Thumbnail', 'wp-manifest' ),
		'section'  => 'blogpage',
		'default'  => 1,
		'priority' => 10,
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'toggle',
		'settings' => 'show_share_icons',
		'label'    => esc_html__( 'Show Social Share Icons', 'wp-manifest' ),
		'section'  => 'blogpage',
		'default'  => 1,
		'priority' => 10,
	] );

// </editor-fold>

// -- Typography Fields --
// <editor-fold desc="Typography">
	Kirki::add_field( 'wp-manifest', [
		'type'      => 'typography',
		'settings'  => 'headings_typography',
		'label'     => esc_html__( 'Headlines', 'wp-manifest' ),
		'section'   => 'typography',
		'default'   => [
			'font-family'    => 'Red Hat Display',
			'font-size'      => '48px',
			'variant'        => 'regular',
			'line-height'    => '1.5',
			'letter-spacing' => '0.1em'
		],
		'transport' => 'auto',
		'priority'  => 10,
		'output'    => array(
			array(
				'element' => 'h1',
			),
			array(
				'element' => '.h1',
			),
			array(
				'element'       => 'h2',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 0.5em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => 'h2',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => 'h2',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => 'h2',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => '.h2',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 0.5em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => '.h2',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => '.h2',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => '.h2',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => 'h3',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 0.75em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => 'h3',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => 'h3',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => 'h3',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => '.h3',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 0.75em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => '.h3',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => '.h3',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => '.h3',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => 'h4',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 0.5208‬‬em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => 'h4',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => 'h4',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => 'h4',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => '.h4',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 0.5208‬em‬)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => '.h4',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => '.h4',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => '.h4',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => 'h5',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 1.25em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => 'h5',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => 'h5',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => 'h5',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => '.h5',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 1.25em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => '.h5',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => '.h5',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => '.h5',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => 'h6',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 1.5em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => 'h6',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => 'h6',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => 'h6',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

			array(
				'element'       => '.h6',
				'property'      => 'font-size',
				'value_pattern' => 'calc($ - 1.5em)',
				'choice'        => 'font-size',
			),
			array(
				'element'       => '.h6',
				'property'      => 'font-weight',
				'value_pattern' => '$',
				'choice'        => 'variant',
			),
			array(
				'element'       => '.h6',
				'property'      => 'font-family',
				'value_pattern' => '$',
				'choice'        => 'font-family',
			),
			array(
				'element'       => '.h6',
				'property'      => 'letter-spacing',
				'value_pattern' => '$',
				'choice'        => 'letter-spacing',
			),

		),
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'color',
		'settings' => 'headings_typography_color',
		'label'    => __( 'Headings Color', 'wp-manifest' ),
		'section'  => 'typography',
		'default'  => '#000',
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'      => 'typography',
		'settings'  => 'text_typography',
		'label'     => esc_html__( 'Texts', 'wp-manifest' ),
		'section'   => 'typography',
		'default'   => [
			'font-family'    => 'Lato',
			'variant'        => 'regular',
			'font-size'      => '19px',
			'line-height'    => '1.5',
			'letter-spacing' => '0.1em'
			//'color'       => '#000',
		],
		'transport' => 'auto',
		'priority'  => 10,
		'output'    => array(
			array(
				'element' => 'body',
			),
		),
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'     => 'color',
		'settings' => 'text_typography_color',
		'label'    => __( 'Text Color', 'wp-manifest' ),
		'section'  => 'typography',
		'default'  => '#565656',
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
		wp_enqueue_style( 'wp-manifest-body-font', '//fonts.googleapis.com/css2?family=' . $wp_manifest_text_typography['font-family'] . ':wght@' . $wp_manifest_text_typography['font-weight'] );
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
