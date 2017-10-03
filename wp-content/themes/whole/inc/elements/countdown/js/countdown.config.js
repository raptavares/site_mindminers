jQuery( document ).ready(function($) {
	var el = document.getElementById('getting-started');
	var count_down = el.getAttribute("data-count-down");

 	$('#getting-started').countdown(count_down, function(event) {
   		var $this = $(this).html(event.strftime(''
     	+ '<div class="col-xs-12 col-sm-6 col-md-3"><div class="countdown-item-container"><span class="countdown-amount ft-psb">%D</span><span class="countdown-period">Days</span></div></div>'
     	+ '<div class="col-xs-12 col-sm-6 col-md-3"><div class="countdown-item-container"><span class="countdown-amount ft-psb">%H</span><span class="countdown-period">Hours</span></div></div>'
     	+ '<div class="col-xs-12 col-sm-6 col-md-3"><div class="countdown-item-container"><span class="countdown-amount ft-psb">%M</span><span class="countdown-period">Minutes</span></div></div>'
     	+ '<div class="col-xs-12 col-sm-6 col-md-3"><div class="countdown-item-container"><span class="countdown-amount ft-psb">%S</span><span class="countdown-period">Seconds</span></div></div>'));
 	});

});