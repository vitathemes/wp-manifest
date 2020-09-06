/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	$( window ).load( function() {

		// When 'Use Portal Color Controls' customizer control is toggled
		wp.customize( 'portal_color_control', function ( value ) {
			value.bind( function( newval ) {

				// If toggled off, warn user that portal color settings will be deleted
				if ( 'off' == newval ) {
					var confirmation = window.confirm( "WARNING: turning this off will delete all the portal color settings. Continue?" );

					if ( true == confirmation ) {
						// If user confirms, run code here to delete all portal color settings
					} else {
						// If user does not confirm, reset the customizer control to 'on'
						this.set( 'on' );
					}

				}
			});
		});

	});
})( jQuery );
