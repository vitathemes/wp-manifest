<div class="o-popup js-popup js-search-form s-header-search">
    <button class="c-header__toggle c-header__toggle--close-search hamburger hamburger--3dx is-active" aria-controls="primary-menu" aria-expanded="true">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
    </button>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label>
            <span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'wp-manifest' ) ?></span>
            <input required type="search" class="search-field"
                    placeholder="<?php echo esc_attr__( 'Search…', 'wp-manifest' ) ?>"
                    value="<?php echo get_search_query() ?>" name="s"
                    title="<?php echo esc_attr__( 'Search for:', 'wp-manifest' ) ?>"/>
        </label>
        <button type="submit" aria-label="<?php echo esc_attr__( 'Search', 'wp-manifest' ) ?>" class="search-submit">
            <span class="o-search-icon o-search-icon--large"></span>
        </button>
    </form>
</div>
