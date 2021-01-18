( function( $ ) {
	
	//Update site link color in real time...
	wp.customize( 'igomoon_link_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-inner a').css('color', newval );
		} );
	} );
	
} )( jQuery );