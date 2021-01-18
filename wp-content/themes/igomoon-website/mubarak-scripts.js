jQuery(document).ready(function($){

	
	
	// Add body class on scroll
	
	$(window).scroll( function() {
		
		if ($(document).scrollTop() > 0) {
		
		    $('body').addClass('scrolled');
	    
	    } else {
	    
	        $('body').removeClass('scrolled');
	    
	    }
	
	});
	
	
	
	// Mobile menu
	
	$('#mobile-menu').click(function(){
		$('body').toggleClass('menu-open');
	});
	
	$('.genesis-nav-menu .sub-menu').parent().prepend('<span class="nav-click"></span>');
	
	$('.nav-click').click(function() {
		$(this).toggleClass('turn');
		$(this).siblings('.sub-menu').slideToggle('300');
	});
	
	
	
	// Application
	
	$('.application').click( function(e) {
		
		e.preventDefault();
		
		$(this).fadeOut();
		
		$('.hide-form').slideDown();
		
	});
	
	
	
	// Single school blocks
	
	if ( $(window).width() > 799 ) {
		
		$('.school-puff').removeClass('active');
		
		$('.hidden-field').removeClass('active');
		
		$('.school-puff').first().addClass('active');
		
		$('.hidden-field').first().addClass('active');
		
		$('.school-puff').click( function() {
			
			var id = $(this).attr('id');
			
			$('.school-puff').removeClass('active');
			
			$(this).addClass('active');
			
			$('.hidden-field').removeClass('active');
			
			$('.hidden-field.' + id ).addClass('active');
			
		});
		
	} else {
		
		$('.school-puff').first().removeClass('active');
		
		$('.hidden-field').first().removeClass('active');
		
	}
	
	$(window).resize(function() {
	
		if ( $(window).width() > 799 ) {
			
			$('.school-puff').removeClass('active');
			
			$('.hidden-field').removeClass('active');
		
			$('.school-puff').first().addClass('active');
			
			$('.hidden-field').first().addClass('active');
			
			$('.school-puff').click( function() {
				
				var id = $(this).attr('id');
				
				$('.school-puff').removeClass('active');
				
				$(this).addClass('active');
				
				$('.hidden-field').removeClass('active');
				
				$('.hidden-field.' + id ).addClass('active');
				
			});
			
		} else {
			
			$('.school-puff').first().removeClass('active');
			
			$('.hidden-field').first().removeClass('active');
			
		}
	
	});
	
	
});