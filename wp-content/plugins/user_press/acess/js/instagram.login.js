jQuery(document).ready(function($) {
	$('#instagram').click(function() {
		
		var clientID = 'aab8e079a96746e1ac7bbcd9ecfed43e';
		var rederectURI = 'http://localhost/wordpress_woo/';
		var client_SECRET = 'client_SECRET';
               
		var url = "https://api.instagram.com/oauth/authorize/?client_id="+ clientID + "&redirect_uri="+ rederectURI + "&response_type=code"
			 $.get(url, function(data){
                             alert(111111);
				console.log(data);
			});
	});

});