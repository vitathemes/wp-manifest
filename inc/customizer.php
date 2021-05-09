<?php
if ( function_exists( 'Kirki' ) ) {
	add_action( 'init', function () {
// Disable Kiriki help notice
		add_filter( 'kirki_telemetry', '__return_false' );


// Add config
		Kirki::add_config( 'wp-manifest', array(
			'option_type' => 'theme_mod'
		) );


// Panels
		Kirki::add_panel( 'elements', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Elements', 'wp-manifest' ),
			'description' => '',
		) );

// Add sections \\
// <editor-fold desc="Sections">
// Branding
		Kirki::add_section( 'colors', array(
			'title'    => esc_html__( 'Colors', 'wp-manifest' ),
			'panel'    => '',
			'priority' => 3,
		) );

// Home Page
		Kirki::add_section( 'homepage', array(
			'title'    => esc_html__( 'Homepage', 'wp-manifest' ),
			'panel'    => 'elements',
			'priority' => 4,
		) );

		// Home Page
		Kirki::add_section( 'blogpage', array(
			'title'    => esc_html__( 'Blog', 'wp-manifest' ),
			'panel'    => 'elements',
			'priority' => 4,
		) );

// Typography
		Kirki::add_section( 'typography', array(
			'title'    => esc_html__( 'Typography', 'wp-manifest' ),
			'panel'    => '',
			'priority' => 4,
		) );

// Elements
		Kirki::add_section( 'elements-archive', array(
			'title'    => esc_html__( 'Archive', 'wp-manifest' ),
			'panel'    => 'elements',
			'priority' => 5,
		) );

		Kirki::add_section( 'elements-single', array(
			'title'    => esc_html__( 'Single', 'wp-manifest' ),
			'panel'    => 'elements',
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

		Kirki::add_field( 'wp-manifest', [
			'type'      => 'typography',
			'settings'  => 'header_typography',
			'label'     => esc_html__( 'Header Typography', 'wp-manifest' ),
			'section'   => 'header',
			'default'   => [
				'font-family'    => 'Lato',
				'variant'        => 'regular',
				'font-size'      => '13px',
				'line-height'    => '1.25',
				'letter-spacing' => '0.3em'
				//'color'       => '#000',
			],
			'transport' => 'auto',
			'priority'  => 10,
			'output'    => array(
				array(
					'element' => '.s-header-menu a',
				),
			),
		] );
// Header


// Add Colors fields

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'radio-buttonset',
			'settings' => 'theme_mode',
			'label'    => esc_html__( 'Theme Mode', 'wp-manifest' ),
			'section'  => 'colors',
			'default'  => 'light',
			'priority' => 10,
			'choices'  => [
				'light' => esc_html__( 'Light', 'wp-manifest' ),
				'dark'  => esc_html__( 'Dark', 'wp-manifest' ),
			],
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'color',
			'settings' => 'headings_typography_color',
			'label'    => __( 'Headings Color', 'wp-manifest' ),
			'section'  => 'colors',
			'default'  => '#000',
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'color',
			'settings' => 'text_typography_color',
			'label'    => __( 'Body Font Color', 'wp-manifest' ),
			'section'  => 'colors',
			'default'  => '#565656',
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'color',
			'settings' => 'text_typography_color_secondary',
			'label'    => __( 'Body Font Secondary Color', 'wp-manifest' ),
			'section'  => 'colors',
			'default'  => '#7B7B7B',
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
			'type'            => 'radio-buttonset',
			'settings'        => 'categories_type',
			'label'           => esc_html__( 'Categories style', 'wp-manifest' ),
			'section'         => 'blogpage',
			'default'         => 'dropdown',
			'priority'        => 10,
			'choices'         => [
				'dropdown' => esc_html__( 'Dropdown', 'wp-manifest' ),
				'list'     => esc_html__( 'List', 'wp-manifest' ),
			],
			'active_callback' => [
				[
					'setting'  => 'show_categories',
					'operator' => '===',
					'value'    => true,
				],
			]
		] );

// </editor-fold>

// -- Typography Fields --
// <editor-fold desc="Typography">
		Kirki::add_field( 'wp-manifest',
			[
				'active_callback' => [
					[
						'setting'  => 'use_google_fonts',
						'operator' => '==',
						'value'    => true,
					],
				],
				'type'            => 'typography',
				'settings'        => 'typography_h1',
				'label'           => esc_html__( 'H1', 'wp-manifest' ),
				'section'         => 'typography',
				'default'         => [
					'font-family'    => 'Red Hat Display',
					'font-size'      => '48px',
					'font-weight'    => '400',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
				],
				'choices'         => [
					'fonts' => [
						'standard' => [
							'Arial',
							'sans-serif',
							'sans',
							'Helvetica',
							'Verdana',
							'Trebuchet',
							'Georgia',
							'Times New Roman',
							'Palatino',
							'Myriad Pro',
							'Lucida',
							'Gill Sans',
							'Impact',
							'monospace',
							'Tahoma',
						],
					],
				],
				'transport'       => 'auto',
				'priority'        => 10,
				'output'          => array(
					array(
						'element' => array( 'h1', '.h1' ),
					),
				),
			] );

		Kirki::add_field( 'wp-manifest',
			[
				'active_callback' => [
					[
						'setting'  => 'use_google_fonts',
						'operator' => '==',
						'value'    => true,
					],
				],
				'type'            => 'typography',
				'settings'        => 'typography_h2',
				'label'           => esc_html__( 'H2', 'wp-manifest' ),
				'section'         => 'typography',
				'default'         => [
					'font-family'    => 'Red Hat Display',
					'font-size'      => '33px',
					'font-weight'    => '400',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
				],
				'choices'         => [
					'fonts' => [
						'standard' => [
							'Arial',
							'sans-serif',
							'sans',
							'Helvetica',
							'Verdana',
							'Trebuchet',
							'Georgia',
							'Times New Roman',
							'Palatino',
							'Myriad Pro',
							'Lucida',
							'Gill Sans',
							'Impact',
							'monospace',
							'Tahoma',
						],
					],
				],
				'transport'       => 'auto',
				'priority'        => 10,
				'output'          => array(
					array(
						'element' => array( 'h2', '.h2' ),
					),
				),
			] );

		Kirki::add_field( 'wp-manifest',
			[
				'active_callback' => [
					[
						'setting'  => 'use_google_fonts',
						'operator' => '==',
						'value'    => true,
					],
				],
				'type'            => 'typography',
				'settings'        => 'typography_h3',
				'label'           => esc_html__( 'H3', 'wp-manifest' ),
				'section'         => 'typography',
				'default'         => [
					'font-family'    => 'Red Hat Display',
					'font-size'      => '23px',
					'font-weight'    => '400',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
				],
				'choices'         => [
					'fonts' => [
						'standard' => [
							'Arial',
							'sans-serif',
							'sans',
							'Helvetica',
							'Verdana',
							'Trebuchet',
							'Georgia',
							'Times New Roman',
							'Palatino',
							'Myriad Pro',
							'Lucida',
							'Gill Sans',
							'Impact',
							'monospace',
							'Tahoma',
						],
					],
				],
				'transport'       => 'auto',
				'priority'        => 10,
				'output'          => array(
					array(
						'element' => array( 'h3', '.h3' ),
					),
				),
			] );

		Kirki::add_field( 'wp-manifest',
			[
				'active_callback' => [
					[
						'setting'  => 'use_google_fonts',
						'operator' => '==',
						'value'    => true,
					],
				],
				'type'            => 'typography',
				'settings'        => 'typography_h4',
				'label'           => esc_html__( 'H4', 'wp-manifest' ),
				'section'         => 'typography',
				'default'         => [
					'font-family'    => 'Red Hat Display',
					'font-size'      => '19px',
					'font-weight'    => '400',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
				],
				'choices'         => [
					'fonts' => [
						'standard' => [
							'Arial',
							'sans-serif',
							'sans',
							'Helvetica',
							'Verdana',
							'Trebuchet',
							'Georgia',
							'Times New Roman',
							'Palatino',
							'Myriad Pro',
							'Lucida',
							'Gill Sans',
							'Impact',
							'monospace',
							'Tahoma',
						],
					],
				],
				'transport'       => 'auto',
				'priority'        => 10,
				'output'          => array(
					array(
						'element' => array( 'h4', '.h4' ),
					),
				),
			] );

		Kirki::add_field( 'wp-manifest',
			[
				'active_callback' => [
					[
						'setting'  => 'use_google_fonts',
						'operator' => '==',
						'value'    => true,
					],
				],
				'type'            => 'typography',
				'settings'        => 'typography_h5',
				'label'           => esc_html__( 'H5', 'wp-manifest' ),
				'section'         => 'typography',
				'default'         => [
					'font-family'    => 'Red Hat Display',
					'font-size'      => '16px',
					'font-weight'    => '400',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
				],
				'choices'         => [
					'fonts' => [
						'standard' => [
							'Arial',
							'sans-serif',
							'sans',
							'Helvetica',
							'Verdana',
							'Trebuchet',
							'Georgia',
							'Times New Roman',
							'Palatino',
							'Myriad Pro',
							'Lucida',
							'Gill Sans',
							'Impact',
							'monospace',
							'Tahoma',
						],
					],
				],
				'transport'       => 'auto',
				'priority'        => 10,
				'output'          => array(
					array(
						'element' => array( 'h5', '.h5' ),
					),
				),
			] );

		Kirki::add_field( 'wp-manifest',
			[
				'active_callback' => [
					[
						'setting'  => 'use_google_fonts',
						'operator' => '==',
						'value'    => true,
					],
				],
				'type'            => 'typography',
				'settings'        => 'typography_h6',
				'label'           => esc_html__( 'H6', 'wp-manifest' ),
				'section'         => 'typography',
				'default'         => [
					'font-family'    => 'Red Hat Display',
					'font-size'      => '14px',
					'font-weight'    => '400',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
				],
				'choices'         => [
					'fonts' => [
						'standard' => [
							'Arial',
							'sans-serif',
							'sans',
							'Helvetica',
							'Verdana',
							'Trebuchet',
							'Georgia',
							'Times New Roman',
							'Palatino',
							'Myriad Pro',
							'Lucida',
							'Gill Sans',
							'Impact',
							'monospace',
							'Tahoma',
						],
					],
				],
				'transport'       => 'auto',
				'priority'        => 10,
				'output'          => array(
					array(
						'element' => array( 'h6', '.h6' ),
					),
				),
			] );

		Kirki::add_field( 'wp-manifest', [
			'type'      => 'typography',
			'settings'  => 'text_typography',
			'label'     => esc_html__( 'Texts', 'wp-manifest' ),
			'section'   => 'typography',
			'default'   => [
				'font-family'    => 'Lato',
				'variant'        => '400',
				'font-size'      => '16px',
				'line-height'    => '1.5',
				'letter-spacing' => '0.1em'
				//'color'       => '#000',
			],
			'transport' => 'auto',
			'priority'  => 10,
			'output'    => array(
				array(
					'element' => 'body'
				),
				array(
					'element' => '.body-font'
				),
				array(
					'element'       => 'h2 .h2',
					'property'      => 'font-family',
					'value_pattern' => '$',
					'choice'        => 'font-family',
				),
				array(
					'element'       => 'h3 .h3',
					'property'      => 'font-family',
					'value_pattern' => '$',
					'choice'        => 'font-family',
				),
			),
		] );

// </editor-fold>

		// -- Footer Fields --
// <editor-fold desc="Footer">
		Kirki::add_field( 'wp-manifest', [
			'type'     => 'text',
			'settings' => 'footer_title',
			'label'    => esc_html__( 'Footer Title', 'wp-manifest' ),
			'section'  => 'footer',
			'default'  => __( "Need a project?", 'wp-manifest' ),
			'priority' => 10,
		] );

		// Phone Number
		Kirki::add_field( 'wp-manifest', [
			'type'     => 'text',
			'settings' => 'footer_phone',
			'label'    => esc_html__( 'Phone', 'wp-manifest' ),
			'section'  => 'footer',
			'default'  => __( "(239) 555-0108", 'wp-manifest' ),
			'priority' => 10,
		] );

		// Phone Number
		Kirki::add_field( 'wp-manifest', [
			'type'     => 'text',
			'settings' => 'footer_email',
			'label'    => esc_html__( 'Email', 'wp-manifest' ),
			'section'  => 'footer',
			'default'  => __( "tanya.hill@example.com", 'wp-manifest' ),
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'text',
			'settings' => 'copyright_text',
			'label'    => esc_html__( 'Copyright Text', 'wp-manifest' ),
			'section'  => 'footer',
			'default'  => __( "© Copyright Manifest Theme. Allrights reserved", 'wp-manifest' ),
			'priority' => 10,
		] );


		// Elements - Archive
		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_thumbnail_archive',
			'label'    => esc_html__( 'Show thumbnail', 'wp-manifest' ),
			'section'  => 'elements-archive',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_cat_archive',
			'label'    => esc_html__( 'Show categories', 'wp-manifest' ),
			'section'  => 'elements-archive',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_date_archive',
			'label'    => esc_html__( 'Show published date', 'wp-manifest' ),
			'section'  => 'elements-archive',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_excerpt_archive',
			'label'    => esc_html__( 'Show excerpt', 'wp-manifest' ),
			'section'  => 'elements-archive',
			'default'  => 1,
			'priority' => 10,
		] );

		// Elements - Single
		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_thumbnail_single',
			'label'    => esc_html__( 'Show thumbnail', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_cat_single',
			'label'    => esc_html__( 'Show categories', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_date_single',
			'label'    => esc_html__( 'Show published date', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_author_single',
			'label'    => esc_html__( 'Show author', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_comments_single',
			'label'    => esc_html__( 'Show comments', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_share_single',
			'label'    => esc_html__( 'Show share icons', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

		Kirki::add_field( 'wp-manifest', [
			'type'     => 'toggle',
			'settings' => 'show_tags_single',
			'label'    => esc_html__( 'Show tags', 'wp-manifest' ),
			'section'  => 'elements-single',
			'default'  => 1,
			'priority' => 10,
		] );

// </editor-fold>


	} );
}

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

	$wp_customize->selective_refresh->add_partial( 'show_share_single', array(
		'selector' => '.c-social-share',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_thumbnail_single', array(
		'selector' => '.c-article--single .c-article__header__image',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_cat_single', array(
		'selector' => '.c-article--single .c-article__header__categories',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_date_single', array(
		'selector' => '.c-article--single .c-article__header__meta__item--date',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_comments_single', array(
		'selector' => '.c-article--single .c-article__header__meta__item--comments',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_tags_single', array(
		'selector' => '.c-article__main__tags',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_cat_archive', array(
		'selector' => '.c-post .c-categories--post-cats',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_date_archive', array(
		'selector' => '.c-post .c-post__header__date',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_thumbnail_archive', array(
		'selector' => '.c-post .c-post__header',
	) );

	$wp_customize->selective_refresh->add_partial( 'show_blog_carousel', array(
		'selector' => '.c-blog-carousel',
	) );


	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.c-header__site-title',
	) );
}

add_action( 'customize_preview_init', 'wp_manifest_add_edit_icons' );

function wp_manifest_customize_preview_js() {
	wp_enqueue_script( 'wp-manifest-js-customizer', get_template_directory_uri() . '/js/customizer.js', array(), false, true );
}

add_action( 'customize_controls_enqueue_scripts', 'wp_manifest_customize_preview_js' );
