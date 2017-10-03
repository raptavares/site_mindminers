console.log(userpress.app_id);
(function() {
	var po = document.createElement('script');
	po.type = 'text/javascript';
	po.async = true;
	po.src = 'https://apis.google.com/js/client:plusone.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(po, s);
})();
jQuery(document).ready(function($) {
	$('.up-google-login').click(function() {
	
		gapi.auth.signIn({
			'class': 'g-signin',
			'clientid': google.api,
			'cookiepolicy': 'single_host_origin',
			'approvalprompt':'force',
		    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read',
		    'callback' : function (e) {	
                     
		        	if(e.status['signed_in'] === true){
		    		gapi.client.load('plus','v1', function(){
		    			
		    			 var request = gapi.client.plus.people.get({
		    				 'userId': 'me'
		    			 });
		    			 request.execute(function(response) {
		    				 g_intialize(response);
		    			 });
		    		});
		    	}
			}
		});
	});
	function g_intialize(response) {
		
		var userdata = {
            id: response.id,
            email: response.emails[0].value,
            image: response.image.url,
            verified: response.isPlusUser,
            name: response.displayName
		};

		//console.log(userdata);
		$.post(google.ajaxurl, {
			"action" : "social_intialize_google",
			"FB_userdata" : userdata,
			"FB_response" : response
		}, function(user) {
			location.reload();
		});
	}
});