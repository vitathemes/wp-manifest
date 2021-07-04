<section class="c-info">
    <div class="o-wrapper">
        <div class="c-info__main u-row">
            <div class="c-info__col o-col o-col--1/2">
                <div class="c-info__col__title">
				    <?php echo wp_kses_post( get_theme_mod( 'homepage_info_left' , __('Full-time UI/UX designer Head of Design at VeronaLabs.com', 'wp-manifest') ) ); ?>
                </div>
                <a class="c-info__col__link" href="<?php echo esc_url(get_theme_mod( 'homepage_info_left_link', '/about')); ?>">
                    <span class="c-info__col__link__text"><?php echo esc_html__('Read More', 'wp-manifest') ?></span> <span class="u-vertical-middle dashicons dashicons-arrow-right-alt"></span>
                </a>
            </div>
            <div class="c-info__col o-col o-col--1/2 u-margin-none c-info__col--desc">
				    <?php echo wp_kses_post( get_theme_mod( 'homepage_info_right' , __('We work with clients around the world from our headquarters in Charleston, South Carolina. We focus on naming, branding, brand narratives, website design and development, and brand experiences.', 'wp-manifest') ) ); ?>
            </div>
        </div>
    </div>
</section>
