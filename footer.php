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
</div>
<footer id="footer" class="c-footer">
    <div class="o-wrapper">
        <div class="c-footer__main u-row">
            <div class="c-footer__col o-col o-col--1/2">
				<?php if ( is_active_sidebar( 'footer-widgets-1' ) ) :
					dynamic_sidebar( 'footer-widgets-1' );
				endif; ?>
            </div>
            <div class="c-footer__col o-col o-col--1/5">
	            <?php if ( is_active_sidebar( 'footer-widgets-2' ) ) :
		            dynamic_sidebar( 'footer-widgets-2' );
	            endif; ?>
            </div>
            <div class="c-footer__col o-col o-col--1/5">
	            <?php if ( is_active_sidebar( 'footer-widgets-3' ) ) :
		            dynamic_sidebar( 'footer-widgets-3' );
	            endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
