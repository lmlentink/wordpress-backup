/*
 * Theme Scripts
 * PostMagazine
 */
 
 jQuery(document).ready(function( $ ) {
	"use strict";
	

/*
* Scroll To Top Navigation 
*/
	$('.scrolltop').on( 'click', function() {
		$('html, body').animate( { scrollTop : 0 }, 800 );
		return false;
	});

	$( window ).on( 'scroll', function() {
		if ($(this).scrollTop() >= 800 ) {
			$('.scrolltop').fadeIn(350);
		} else {
			$('.scrolltop').fadeOut(350);
		}
	});
	
}); // end dom ready	