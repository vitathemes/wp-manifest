<?php
if ( get_theme_mod( 'categories_type', 'dropdown' ) == "list" ) { ?>
    <div class="u-row">
        <ul class="c-categories s-categories">
			<?php wp_list_categories( array( 'title_li' => '', 'depth' => 1 ) ); ?>
        </ul>
    </div>
	<?php
} elseif ( get_theme_mod( 'categories_type', 'dropdown' ) == "dropdown" ) { ?>
    <div class="u-row">
        <div class="c-categories c-categories--dropdown">
            <label for="cat">Categories:</label>
			<?php wp_dropdown_categories( array( 'show_option_all' => 'All', 'depth' => 1 ) ); ?>
        </div>
    </div>
	<?php
}
