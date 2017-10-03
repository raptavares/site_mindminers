jQuery(function($) {
	"use strict";
	$(".cms-counter-wraper .cms-counter").each(
		function() {
			"use strict";
			var options = {
				useEasing : false,
				useGrouping : false,
				separator : ',',
				decimal : '.'
			}
			var digit = $(this).attr("data-digit");
			var tmp = digit.split('.');
			if(typeof tmp[1] == 'undefined'){
				tmp[1] = 0;
			}
			var prefix = $(this).attr("data-prefix");
			var suffix = $(this).attr("data-suffix");
			if (prefix != undefined) {
				options.prefix = prefix;
			}
			if (suffix != undefined) {
				options.suffix = suffix;
			}
			var random = 0;
			if ($(this).attr("data-type") == 'random') {
				var random = Math.floor(Math.random() * digit * 2);
			}
			$(this).waypoint(
				function() {
					var count = new countUp($(this).attr("id"), random,
							digit, tmp[1].length, 0, options);
					count.start();
				}, {
					offset : '95%',
					triggerOnce : true
				});
		});
});
