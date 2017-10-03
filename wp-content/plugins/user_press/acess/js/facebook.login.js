window.fbAsyncInit = function() {
	FB.init({
		appId      : userpress.app_id,
		cookie     : true,  // enable cookies to allow the server to access
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.5' // use version 2.2
	});
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// Login
jQuery(document).ready(function($) {
	"use strict";
	$('.up-facebook-button').click(function() {
		FB.login(function(response) {
			if (response.status === 'connected') {
				FB.getLoginStatus(function(response) {
					FB.api('/me',{fields: 'email,picture,name'}, function(response) {
						up_fb_login_process(response);
					});
				});
			}
		}, {
			scope : 'public_profile,email'
		});
	});
	/* Login to system process */
	function up_fb_login_process(response) {

		var fb_login_data = {
			'name' 		: response.name,
			'picture' 	: response.picture.data.url,
			'email'		: response.email
		};
		$.post(userpress.ajax, {
			'action'		: 'facebook_ajax_login',
			'data'			: fb_login_data,
			'_ajax_nonce' 	: userpress.nonce
		}, function (response) {
			/* if error. */
			if (response.error == true) {
				/* validate user. */
				if (response.name_null != undefined) {
					console.log(response.name_null);
				}
				/* validate pass. */
				if (response.email_null != undefined) {
					console.log(response.email_null);
				}
			} else {
				location.reload();
			}
		});
	}
});

