<?php
if ( get_theme_mod( 'categories_type', 'dropdown' ) == "list" ) { ?>
    <div class="u-row">
        <ul class="c-categories s-categories">
			<?php wp_list_categories( array( 'title_li' => '', 'depth' => 1 ) ); ?>
        </ul>
    </div>
	<?php
} elseif ( get_theme_mod( 'categories_type', 'dropdown' ) == "dropdown" ) { ?>
    <div class="u-row u-flex-wrap u-dir-column-m">
        <div class="o-col o-col--1/1">
            <div class="c-categories c-categories--dropdown s-categories--dropdown">
                <label for="cat"><?php echo esc_html__('Categories:', 'wp-manifest') ?></label>
		        <?php the_widget('WP_Widget_Categories', array('title' => ' ', 'dropdown' => true) ); ?>
            </div>
        </div>
    </div>
	<?php
}
