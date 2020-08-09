<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<footer class="c-footer">
    <div class="o-container">
        <div class="c-footer__main o-flex">
            <div class="c-footer__col o-flex__item-1/2">
                <h2 class="c-footer__title"><?php echo get_theme_mod( 'footer_title', 'Need a project?' ); ?></h2>
                <p>
                    <a class="c-footer__link" href="<?php echo str_replace( ' ', '', get_theme_mod( 'footer_phone', '(239) 555-0108' ) ); ?>">
						<?php echo get_theme_mod( 'footer_phone', '(239) 555-0108' ); ?>
                    </a>
                </p>
                <p class="u-margin-none">
                    <a class="c-footer__link" href="<?php echo str_replace( ' ', '', get_theme_mod( 'footer_email', 'tanya.hill@example.com' ) ); ?>">
						<?php echo get_theme_mod( 'footer_email', 'tanya.hill@example.com' ); ?>
                    </a>
                </p>
            </div>
            <div class="c-footer__col o-flex__item-1/4">
				<?php
				$menu_args = array(
					'theme_location' => 'footer-menu',
					'menu_class' => 'c-footer__menu-items s-footer-menu',
					'container' => 'nav',
					'container_class' => 'c-footer__menu',
				);
				wp_nav_menu($menu_args);
				?>
            </div>
            <div class="c-footer__col o-flex__item-1/4 o-flex">
                <p class="c-footer__copyright">
					<?php echo get_theme_mod( 'copyright_text', '© Copyright Manifest Theme. Allrights reserved' ); ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
