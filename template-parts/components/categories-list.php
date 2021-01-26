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
    <script>
        ( function() {
            var dropdown = document.getElementById( 'cat' );
            function onCatChange() {
                if ( dropdown.options[ dropdown.selectedIndex ].value > 0 ) {
                    location.href = "<?php echo home_url();?>/?cat=" + dropdown.options[ dropdown.selectedIndex ].value;
                }
            }
            dropdown.onchange = onCatChange;
        })();
    </script>
	<?php
}
