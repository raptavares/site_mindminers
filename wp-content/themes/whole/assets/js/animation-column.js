var j$ = jQuery;
j$.noConflict();
j$(document).ready(function(){
	(function(j$) {
	  j$.fn.visible = function(partial) {
	    
	      var j$t            = j$(this),
	          j$w            = j$(window),
	          viewTop       = j$w.scrollTop(),
	          viewBottom    = viewTop + j$w.height(),
	          _top          = j$t.offset().top+100,
	          _bottom       = _top + j$t.height(),
	          compareTop    = partial === true ? _bottom : _top,
	          compareBottom = partial === true ? _top : _bottom;
	    
	    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

	  };
	    
	})(jQuery);

	var win = j$(window);
	var allMods = j$(".rda_opacity,.rda_toleft,.rda_toright,.rda_totop,.rda_tobottom,.rd_chart_black,.rd_chart_white,.rda_fadeIn,.rda_fadeInDown,.rda_fadeInUp,.rda_fadeInLeft,.rda_fadeInRight,.rda_bounceIn,.rda_bounceInDown,.rda_bounceInUp,.rda_bounceInLeft,.rda_bounceInRight,.rda_zoomIn,.rda_flipInX,.rda_flipInY,.rda_bounce,.rda_flash,.rda_shake,.rda_pulse,.rda_swing,.rda_rubberBand,.rda_wobble,.rda_tada");
	var count = j$(".rd_count_to");


	allMods.each(function(i, el) {
	  var el = j$(el);
	  if (el.visible(true)) {
	    el.addClass("already-visible"); 
	  } 
	});


	count.each(function(i, el) {
	  var el = j$(el);
	  if (el.visible(true)) {


					var countAsset = j$(this),
						countNumber = countAsset.find('.count_number'),
						countDivider = countAsset.find('.count_line').find('span'),
						countSubject = countAsset.find('.count_title');
					
						el.removeClass("rd_count_to");		
			el.addClass("rd_count_to_over");	
						countNumber.countTo({
							onComplete: function () {
								countDivider.animate({
									'width': 50
								}, 400, 'easeOutCubic');
								countSubject.delay(100).animate({
									'opacity' : 1,
									'bottom' : '0px'
								}, 600, 'easeOutCubic');
								
							}
							
						});
	    
				
	  } 
	});


	win.scroll(function(event) {
	j$(".rda_fadeIn").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated fadeIn');
	    }, 50 * i );
		}
	 });  
	j$(".rda_fadeInDown").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated fadeInDown');
	    }, 50 * i );
		}
	});  
	j$(".rda_fadeInUp").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated fadeInUp');
	    }, 50 * i );
		}
	 });    
	j$(".rda_fadeInLeft").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated fadeInLeft');
	    }, 50 * i );
		}
	 });    
	j$(".rda_fadeInRight").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated fadeInRight');
	    }, 50 * i );
		}
	 });    
	j$(".rda_bounceIn").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated bounceIn');
	    }, 50 * i );
		}
	 });    
	j$(".rda_bounceInDown").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated bounceInDown');
	    }, 50 * i );
		}
	 });    
	j$(".rda_bounceInUp").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated bounceInUp');
	    }, 50 * i );
		}
	 });    
	j$(".rda_bounceInLeft").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated bounceInLeft');
	    }, 50 * i );
		}
	 });    
	j$(".rda_bounceInRight").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated bounceInRight');
	    }, 50 * i );
		}
	 });  
	j$(".rda_zoomIn").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated zoomIn');
	    }, 50 * i );
		}
	 });   
	j$(".rda_flipInX").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated flipInX');
	    }, 50 * i );
		}
	 });   
	j$(".rda_flipInY").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated flipInY');
	    }, 50 * i );
		}
	 }); 
	   
	j$(".rda_bounce").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated bounce');
	    }, 50 * i );
		}
	 });    
	j$(".rda_flash").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated flash');
	    }, 50 * i );
		}
	 });    
	j$(".rda_shake").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated shake');
	    }, 50 * i );
		}
	 });    
	j$(".rda_pulse").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated pulse');
	    }, 50 * i );
		}
	 });    
	j$(".rda_swing").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated swing');
	    }, 50 * i );
		}
	 });    
	j$(".rda_rubberBand").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated rubberBand');
	    }, 50 * i );
		}
	 });    
	j$(".rda_wobble").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated wobble');
	    }, 50 * i );
		}
	 });    
	j$(".rda_tada").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
	   
		setTimeout(function () {
	        el.addClass('animated tada');
	    }, 50 * i );
		}
	 });  
	  
	  
	j$(".rd_count_to").each(function(i, el) {
	    var el = j$(el);
	    if (el.visible(true)) {
					var countAsset = j$(this),
						countNumber = countAsset.find('.count_number'),
						countDivider = countAsset.find('.count_line').find('span'),
						countSubject = countAsset.find('.count_title');
							el.removeClass("rd_count_to");		
			el.addClass("rd_count_to_over");	
						countNumber.countTo({
							onComplete: function () {
								countDivider.animate({
									'width': 50
								}, 400, 'easeOutCubic');
								countSubject.delay(100).animate({
									'opacity' : 1,
									'bottom' : '0px'
								}, 600, 'easeOutCubic');

							}
						});
	    } 
	  });
	          
	});
});
