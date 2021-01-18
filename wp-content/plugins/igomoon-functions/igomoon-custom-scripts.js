jQuery(document).ready(function($){
  
  windowWidth = $(this).width();
  if ( windowWidth > 1030) {
	  function fixDiv() {
	    var $cache = $('.fixedSidebar .sidebar');
	    if ($(window).scrollTop() > 500)
	      $cache.css({
	        'position': 'fixed',
	        'top': '40px'
	      });
	    else
	      $cache.css({
	        'position': 'relative',
	        'top': 'auto'
	      });
	  }
	  $(window).scroll(fixDiv);
	  fixDiv();
  }

  $(window).resize(function() {	
	  windowWidth = $(this).width();
	  if ( windowWidth > 1030) {
	  
		  function fixDiv() {
		    var $cache = $('.fixedSidebar .sidebar');
		    if ($(window).scrollTop() > 500)
		      $cache.css({
		        'position': 'fixed',
		        'top': '40px'
		      });
		    else
		      $cache.css({
		        'position': 'relative',
		        'top': 'auto'
		      });
		  }
		  $(window).scroll(fixDiv);
		  fixDiv();
	  }
  });    
  
  if ( $('.job').length == 0 )  {
    $('.if-empty').html('Det finns inga tillgängliga jobb för tillfället.')
  }
        	    
});