/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
		wp.customize( 'theme_mode', function ( value ) {
			value.bind( function( newval ) {

				if (newval == "dark") {
					wp.customize('headings_typography_color').set("#fff");
					wp.customize('text_typography_color').set("#CCCCCC");
				}

			});
		});
})( jQuery );
