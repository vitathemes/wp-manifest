<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'wp-manifest' ) ?></span>
        <input tabindex="1" type="search" class="search-field"
                placeholder="<?php echo esc_attr__( 'Search…', 'wp-manifest' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr__( 'Search for:', 'wp-manifest' ) ?>"/>
    </label>
    <input tabindex="1" type="submit" class="search-submit"
            value="<?php echo esc_attr__( 'Search', 'wp-manifest' ) ?>"/>
</form>
