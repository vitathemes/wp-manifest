<?php
/* Block Patterns */

function wp_manifest_register_block_patterns() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern(
			'wp-manifest/project-overview',
			array(
				'title'       => __( 'Project Overview', 'wp-manifest' ),
				'description' => _x( 'Describe your project with this pattern.', 'Block pattern description', 'wp-manifest' ),
				'content'     => "<!-- wp:columns --> <div class=\"wp-block-columns\"><!-- wp:column {\"width\":65} --> <div class=\"wp-block-column\" style=\"flex-basis:65%\"><!-- wp:heading {\"level\":3} --> <h3>Project Overview</h3> <!-- /wp:heading --> <!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"has-text-color\" style=\"color:#565656\">FashHanger is a bespoke sustainable high-fashion accessory company based out of Berlin, currently operated by Siesly and her sister Ashely. They needed help for a big rebrand and wanted to relaunch their website.</p> <!-- /wp:paragraph --> <!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"has-text-color\" style=\"color:#565656\"><br>Their goals were simple, create a unique e-commerce store that bring a wonderful shopping experience at every stage of the buyer’s journey.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column {\"width\":35} --> <div class=\"wp-block-column\" style=\"flex-basis:35%\"><!-- wp:group --> <div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"typography\":{\"fontSize\":23}}} --> <p class=\"is-style-no-margin\" style=\"font-size:23px\">Year</p> <!-- /wp:paragraph --> <!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"is-style-no-margin has-text-color\" style=\"color:#565656\">2019</p> <!-- /wp:paragraph --></div></div> <!-- /wp:group --> <!-- wp:spacer {\"height\":40} --> <div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div> <!-- /wp:spacer --> <!-- wp:group --> <div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"typography\":{\"fontSize\":23}}} --> <p class=\"is-style-no-margin\" style=\"font-size:23px\">Platform</p> <!-- /wp:paragraph --> <!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"is-style-no-margin has-text-color\" style=\"color:#565656\">Shopify, Webflow</p> <!-- /wp:paragraph --></div></div> <!-- /wp:group --> <!-- wp:spacer {\"height\":40} --> <div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div> <!-- /wp:spacer --> <!-- wp:group --> <div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"typography\":{\"fontSize\":23}}} --> <p class=\"is-style-no-margin\" style=\"font-size:23px\">Role</p> <!-- /wp:paragraph --> <!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"is-style-no-margin has-text-color\" style=\"color:#565656\">Research, Design</p> <!-- /wp:paragraph --></div></div> <!-- /wp:group --> <!-- wp:spacer {\"height\":40} --> <div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div> <!-- /wp:spacer --> <!-- wp:group --> <div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"typography\":{\"fontSize\":23}}} --> <p class=\"is-style-no-margin\" style=\"font-size:23px\">Deliverables</p> <!-- /wp:paragraph --> <!-- wp:paragraph {\"className\":\"is-style-no-margin\",\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"is-style-no-margin has-text-color\" id=\"www.fashhanger.com\" style=\"color:#565656\">www.fashhanger.com</p> <!-- /wp:paragraph --></div></div> <!-- /wp:group --></div> <!-- /wp:column --></div> <!-- /wp:columns -->",
				'categories'  => array( 'wp-manifest' ),
			)
		);

		register_block_pattern(
			'wp-manifest/content-block',
			array(
				'title'       => __( 'Content Block', 'wp-manifest' ),
				'description' => _x( 'WP-Manifest built in Content block.', 'Block pattern description', 'wp-manifest' ),
				'content'     => "<!-- wp:group --> <div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":3,\"className\":\"is-style-no-margin\",\"style\":{\"typography\":{\"fontSize\":23}}} --> <h3 class=\"is-style-no-margin\" style=\"font-size:23px\">User Research and Personas</h3> <!-- /wp:heading --> <!-- wp:spacer {\"height\":32} --> <div style=\"height:32px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div> <!-- /wp:spacer --> <!-- wp:image --> <figure class=\"wp-block-image\"><img alt=\"\"/></figure> <!-- /wp:image --> <!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#565656\"}}} --> <p class=\"has-text-color\" style=\"color:#565656\">Who is your user? Indicate her KEY personality traits and help round out her overall image.<br>Originally, the personality section of this persona was based off the Myers Briggs personality test. According to the Myers Briggs, there are 16 potential user personality types. Our template integrates questions from this online personality test example into a series of sliding bar graphics. If you’re confused as to what the sliders mean, check out the <a href=\"http://manifest.develop/wp-admin/post.php?post=14&amp;action=edit#\">Myers Briggs basics</a> article.</p> <!-- /wp:paragraph --></div></div> <!-- /wp:group -->",
				'categories'  => array( 'wp-manifest' ),
			)
		);

	}
}


add_action( 'init', 'wp_manifest_register_block_patterns' );

function wp_manifest_register_block_categories() {
	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern_category(
			'wp-manifest',
			array( 'label' => _x( 'WP Manifest', 'WP-Manifest Block patterns category', 'wp-manifest' ) )
		);

	}
}

add_action( 'init', 'wp_manifest_register_block_categories' );
