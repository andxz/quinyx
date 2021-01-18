jQuery(document).ready(function($){

	//Toggler

	if( $('.toggler').length ){
		
		$('.toggler').on('click', function() {
			$(this).parent().toggleClass('active');
			$(this).siblings(".slide-toggle").slideToggle();
		});
		
	}
	
	if( $('#select-type-of-school').length ){

		$('#select-type-of-school').change(function() {
			if( $(this).val().toLowerCase() == 'förskola' ) {
				$('.school-types').hide();
				$('#forskola').show();
			} else {
				$('.school-types').hide();
				$('#grundskola').show();
			}
		});

	}

	if( $('#select-forskola').length ){

		$('#select-forskola').change(function() {
			var name = $(this).val().replace(/\s+/g, '_').toLowerCase(); 
			$('.forskola-info').hide();
			$('#'+name).show();
		});

	}

	if( $('#select-grundskola').length ){

		$('#select-grundskola').change(function() {
			var name = $(this).val().replace(/\s+/g, '_').toLowerCase();
			$('.grundskola-info').hide();
			$('#'+name).show();
		});

	}

	if ( $('#show_hidden_form').length ){

		$('#show_hidden_form').on('click', function() {
			$(this).hide();
			$('#hidden_form').slideDown();			
		});

	}

	// if ( $('.nav-secondary').length ){

	// 	$('.nav-secondary').prependTo('.site-header>.wrap');

	// }

});