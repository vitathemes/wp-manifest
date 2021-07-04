<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WP_Manifest
 */

// Register Menu
if ( ! function_exists( 'wp_manifest_register_primary_menu' ) ) {
	function wp_manifest_register_primary_menu() {
		register_nav_menu( 'primary-menu', __( 'Primary Menu', 'wp-manifest' ) );
	}
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
if ( ! function_exists( 'wp_manifest_body_classes' ) ) {
	function wp_manifest_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		if ( get_theme_mod( 'theme_mode' ) == "dark" ) {
			$classes[] = 'is-dark-mode';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'wp_manifest_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if ( ! function_exists( 'wp_manifest_pingback_header' ) ) {
	function wp_manifest_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
add_action( 'wp_head', 'wp_manifest_pingback_header' );

// Menu Generator
if ( ! function_exists( 'wp_manifest_show_menu' ) ) {
	function wp_manifest_show_menu() {
		if ( has_nav_menu( 'primary-menu' ) ) {
			$wp_manifest_menu_args = array(
				'theme_location' => 'primary-menu',
				'menu_class'     => 's-header-menu c-header__menu-items',
				'menu_id'        => 'primary-menu',
				'container'      => '',
				'depth'          => 3,
				'walker'         => new Wp_manifest_walker_nav()
			);
			wp_nav_menu( $wp_manifest_menu_args );
		}
	}
}

// Load theme typography
if ( ! function_exists( 'wp_manifest_typography' ) ) {
	function wp_manifest_typography() {

		$html = ':root {
	            --headings-colors: ' . get_theme_mod( 'headings_typography_color', '#000' ) . ';
	            --base-font-color: ' . get_theme_mod( 'text_typography_color', '#565656' ) . ';
	            --base-font-color-secondary: ' . get_theme_mod( 'text_typography_color_secondary', '#7B7B7B' ) . ';
			}';

		return $html;
	}
}

if ( ! function_exists( 'wp_manifest_theme_settings' ) ) {
	add_action( 'admin_head', 'wp_manifest_theme_settings' );
	add_action( 'wp_head', 'wp_manifest_theme_settings' );
	function wp_manifest_theme_settings() {
		$wp_manifest_theme_typography = wp_manifest_typography();
		?>
        <style>
            <?php echo esc_html($wp_manifest_theme_typography); ?>
        </style>
		<?php
	}
}

if ( ! function_exists( 'wp_manifest_get_post_primary_category' ) ) {
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
}

if ( ! function_exists( 'wp_manifest_get_discussion_data' ) ) {
	function wp_manifest_get_discussion_data() {
		static $discussion, $post_id;
		$wp_manifest_current_post_id = get_the_ID();
		if ( $wp_manifest_current_post_id === $post_id ) {
			return $discussion; /* If we have discussion information for post ID, return cached object */
		} else {
			$post_id = $wp_manifest_current_post_id;
		}
		$wp_manifest_comments = get_comments(
			array(
				'post_id' => $wp_manifest_current_post_id,
				'orderby' => 'comment_date_gmt',
				'order'   => get_option( 'comment_order', 'asc' ),
				/* Respect comment order from Settings » Discussion. */
				'status'  => 'approve',
				'number'  => 20,
				/* Only retrieve the last 20 comments, as the end goal is just 6 unique authors */
			)
		);
		$wp_manifest_authors  = array();
		foreach ( $wp_manifest_comments as $wp_manifest_comment ) {
			$wp_manifest_authors[] = ( (int) $wp_manifest_comment->user_id > 0 ) ? (int) $wp_manifest_comment->user_id : $wp_manifest_comment->comment_author_email;
		}
		$wp_manifest_authors = array_unique( $wp_manifest_authors );
		$discussion          = (object) array(
			'authors'   => array_slice( $wp_manifest_authors, 0, 6 ),
			/* Six unique authors commenting on the post. */
			'responses' => get_comments_number( $wp_manifest_current_post_id ),
			/* Number of responses. */
		);

		return $discussion;
	}
}

if ( ! function_exists( 'wp_manifest_comment_form' ) ) {
	function wp_manifest_comment_form() {
		$wp_manifest_commenter = wp_get_current_commenter();
		$wp_manifest_fields    = array(
			'author'  =>
				'<p class="comment-field comment-form-author"><label>'. __('Name', 'wp-manifest') . ' *</label>' .
				'<input required="required" placeholder="' . esc_attr__( 'Enter Your Name', 'wp-manifest' ) . '" value="' . esc_attr( $wp_manifest_commenter['comment_author'] ) . '" id="author" name="author" type="text" size="30" /></p>',
			'email'   =>
				'<p class="comment-field comment-form-email"><label>'. __('Email', 'wp-manifest') . ' *</label>' .
				'<input required="required" placeholder="' . esc_attr__( 'Enter Your Email', 'wp-manifest' ) . '" value="' . esc_attr( $wp_manifest_commenter['comment_author_email'] ) . '" id="email" name="email" type="email" value="" size="30" /></p>',
			'url'     =>
				'<p class="comment-field comment-form-email"><label>'. __('Website', 'wp-manifest') . '</label>' .
				'<input placeholder="' . esc_attr__( 'Enter Your Website', 'wp-manifest' ) . '" value="' . esc_attr( $wp_manifest_commenter['comment_author_url'] ) . '"  id="url" name="url" type="url" value="" size="30" maxlength="200" /></p>',
			'cookies' => '<p class="comment-form-cookies-consent comment-form-cookies"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label class="cookie-label" for="wp-comment-cookies-consent">'. __('Save my name, email, and website in this browser for the next time I comment.', 'wp-manifest') . '</label></p>'
		);

		comment_form(
			array(
				'logged_in_as'         => null,
				'title_reply'          => null,
				'comment_notes_before' => false,
				'label_submit'         => 'Submit',
				'fields'               => $wp_manifest_fields,
				'comment_field'        => '<p class="comment-form-comment"><label>'. esc_attr__('Comment', 'wp-manifest') .' *</label><textarea required="required" placeholder="' . esc_html( 'Write Your Comment', 'wp-manifest' ) . '" id="comment" name="comment" cols="45" rows="1" aria-required="true"></textarea></p>'
			)
		);
	}
}

if ( ! function_exists( 'wp_manifest_generate_post_category' ) ) {
	function wp_manifest_generate_post_category( $post_id ) {
		$categories = wp_get_post_categories( $post_id );

		$categories_markup = "<div class='c-categories c-categories--post-cats'>";
		$i                 = 0;
		foreach ( $categories as $category ) {
			$i ++;
			$cat = get_category( $category );
			if ( $i == 4 ) {
				break;
			}
			$category_name     = $cat->name;
			$category_link     = get_category_link( $cat->term_id );
			$categories_markup .= sprintf( '<a class="c-post__header__category" href="%s">%s</a>', $category_link, $category_name );
			$categories_markup .= ', ';
		}
		$categories_markup = trim( $categories_markup );
		if ( substr( $categories_markup, - 1 ) == "," ) {
			$categories_markup = substr_replace( $categories_markup, '', - 1, '1' );
		}
		$categories_markup .= "</div>";

		return $categories_markup;
	}
}

if ( ! function_exists( 'wp_manifest_show_post_data' ) ) {
	function wp_manifest_show_post_data( $post_id ) {
		$category = '';
		$date     = '';
		if ( get_theme_mod( 'show_cat_archive', true ) ) {
			$category = wp_manifest_generate_post_category( $post_id );
		}
		if ( get_theme_mod( 'show_date_archive', true ) ) {
			$date = sprintf( '<span class="c-post__header__date">%s</span>', get_the_time( 'd M, Y' ) );
		}
		echo wp_kses_post( $category . $date );
	}
}


if ( ! function_exists( 'wp_manifest_get_post_category' ) ) {
	function wp_manifest_get_post_category( $post_id ) {
		$category      = wp_manifest_get_post_primary_category( $post_id );
		$category_name = $category['primary_category']->name;
		$category_link = get_category_link( $category['primary_category']->term_id );

		return array( 'name' => $category_name, 'url' => $category_link );
	}
}

if ( ! function_exists( 'wp_manifest_is_paginated_post' ) ) {
	function wp_manifest_is_paginated_post() {
		global $multipage;

		return 0 !== $multipage;
	}
}

if ( ! function_exists( 'wp_manifest_header_branding' ) ) {
	/**
	 * Displays Branding logo or site title
	 */
	function wp_manifest_header_branding() {
		if ( has_custom_logo() ) {
			the_custom_logo();
		} else {
			if ( is_front_page() && is_home() ) {
				?>
                <h1 class="c-header__site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
				<?php
			} else {
				?>
                <h2 class="c-header__site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h2>
				<?php
			}
		}
	}
}
