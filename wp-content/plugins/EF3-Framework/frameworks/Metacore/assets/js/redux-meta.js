jQuery(function($) {

	$(window).on('load', function() {
		
		var _old_id = $('._meta_box_input').val();

		if (_old_id != undefined && _old_id != ''){
			$('.redux-group-menu #' + _old_id + ' a').trigger('click');
		} else {
			$('.redux-group-menu li:first-child a').trigger('click');
		}
	});

	$('.redux-container').on('click', 'li', function() {

		var _id = $(this).attr('id');

		$(this).parents('.redux-container').find('._meta_box_input').val(_id);
	});
	
});