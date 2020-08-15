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
		'title'    => esc_html__( 'Home Page', 'wp-manifest' ),
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

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_0',
		'label'       => esc_html__( 'Color-Palette', 'kirki' ),
		'description' => esc_html__( 'This is a color-palette control', 'kirki' ),
		'section'     => 'branding',
		'default'     => '#888888',
		'choices'     => [
			'colors' => [ '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ],
			'style'  => 'round',
		],
	] );

// -- Branding Fields --
// <editor-fold desc="branding">
	Kirki::add_field( 'wp-manifest', [
		'type'      => 'background',
		'settings'  => 'branding_background',
		'label'     => esc_html__( 'Background', 'wp-manifest' ),
		'section'   => 'branding',
		'default'   => [
			'background-color'      => 'fff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport' => 'auto',
		'output'    => [
			[
				'element' => 'body',
			],
		],
	] );

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
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'dropdown-pages',
		'settings' => 'homepage_page',
		'label'    => esc_html__( 'Select Homepage', 'wp-manifest' ),
		'section'  => 'homepage',
		'default'  => 42,
		'priority' => 10,
	] );

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

// </editor-fold>

// -- Typography Fields --
// <editor-fold desc="Typography">
	Kirki::add_field( 'wp-manifest', [
		'type'     => 'typography',
		'settings' => 'headings_typography',
		'label'    => esc_html__( 'Headlines', 'wp-manifest' ),
		'section'  => 'typography',
		'default'  => [
			'font-family' => 'Roboto Mono',
			'font-size'   => '26px',
			'variant'     => 'regular',
			'color'       => '#000'
		],

		'priority'  => 10,
		'transport' => 'auto',
	] );

	Kirki::add_field( 'wp-manifest', [
		'type'      => 'typography',
		'settings'  => 'text_typography',
		'label'     => esc_html__( 'Texts', 'wp-manifest' ),
		'section'   => 'typography',
		'default'   => [
			'font-family' => 'Roboto',
			'variant'     => 'regular',
			'font-size'   => '14px',
			'line-height' => '1.5',
			'color'       => '#000',
		],
		'output'    => [
			[
				'element' => 'body',
			]
		],
		'priority'  => 10,
		'transport' => 'auto',
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

function add_edit_icons( $wp_customize ) {
	$wp_customize->selective_refresh->add_partial( 'copyright_text', array(
		'selector' => '.footer-main',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.description',
	) );

	$wp_customize->selective_refresh->add_partial( 'social-mail', array(
		'selector' => '.social-links',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_post_thumbnail', array(
		'selector' => '.post-thumbnail',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_share_icons', array(
		'selector' => '.social-share',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.c-header__site-title',
	) );
}

add_action( 'customize_preview_init', 'add_edit_icons' );
