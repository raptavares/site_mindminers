// Additional JS functions here
 window.pAsyncInit = function() {
        PDK.init({
            appId: '4797179014565340582', // Change this
            cookie: true
        });
    };

    (function(d, s, id){
        var js, pjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//assets.pinterest.com/sdk/sdk.js";
        pjs.parentNode.insertBefore(js, pjs);
    }(document, 'script', 'pinterest-jssdk'));

   // login pop-up
    jQuery(document).ready(function($) {
    	$('.pinterest-login').click(function() {
            alert(11111);
		    PDK.login({scope : 'read_public, write_public'}, function(session) {
		    	  if (!session) { 
		    	    alert('The user chose not to grant permissions or closed the pop-up');
		    	  } else {
		    	    console.log('Thanks for authenticating. Getting your information...');
		    	    PDK.me(function(response) {
		    	      if (!response || response.error) {
		    	        alert('Oops, there was a problem getting your information');
		    	      } else {
		    	        console.log('Welcome,  ' + response.data.first_name + '!');
		    	    	  p_intialize(response);
		    	       // console.log(response);
		    	      }
		    	    });
		    	  }
		    	});
    		});
    	
    	
    	function p_intialize(response) {
    		//alert(222);
    		var userdata = {
    			id: response.data.id,
    			name: response.data.first_name+response.data.last_name,
    			verified: true
    			//last_name: response.last_name
    		};
    		//console.log(userdata);
    		$.post(pinterest.ajaxurl, {
    			"action" : "social_intialize_pinterest",
    			"FB_userdata" : userdata,
    			"FB_response" : response
    		}, function(user) {
    			location.reload();
    		});
    	}
    	});
    
    
    
    
