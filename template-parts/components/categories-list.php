<?php
if (get_theme_mod( 'categories_type', 'dropdown' ) == "list") { ?>
	<ul class="c-categories s-categories">
		<?php wp_list_categories(array('title_li' => '', 'depth' => 1)); ?>
	</ul>
<?php
} elseif (get_theme_mod( 'categories_type', 'dropdown' ) == "dropdown") { ?>
	<div class="c-categories c-categories--dropdown">
		<label for="cat">Categories:</label>
		<?php wp_dropdown_categories(array('show_option_all' => 'All', 'depth' => 1)); ?>
	</div>
<?php
}
