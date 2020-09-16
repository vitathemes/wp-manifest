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
					wp.customize('headings_typography_color').set("#ffffff");
					wp.customize('text_typography_color').set("#CCCCCC");
					wp.customize('background_color').set("#323232");
				}

				if (newval == "light") {
					wp.customize('headings_typography_color').set("#000000");
					wp.customize('text_typography_color').set("#565656");
					wp.customize('background_color').set("#ffffff");
				}

			});
		});
})( jQuery );
