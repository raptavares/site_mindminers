(function ($) {
    "use strict";
   	
   	var $container = $('.sg-portfolio-masonry');
	$container.imagesLoaded( function(){
	  $container.masonry({
	    itemSelector : '.single-portfolio-image-item'
	  });
	});
})(jQuery);