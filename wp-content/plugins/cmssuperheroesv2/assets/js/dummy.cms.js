(function($){
    "use strict";
    var cmsDummyData = function(current_data,p,theme){
    	$.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'cmsdummy',
                'current_data':  current_data,
                'theme' : theme
            },
            success: function(data, textStatus, XMLHttpRequest){
                $('.cms-dummy-process-bar').css({
                    'width':p+'%',
                    '-webkit-transition':'width 1s',
                    'transition':'width 1s'
                });
                $('#cms-msg .cms-status').text(' Loading '+p+'%');
                if(isNaN(current_data)){
                    $('#cms-msg').parent().css('width','100%');
                    $('#cms-msg').append(data);
                }
                if(current_data=='grid'){
                    p+=5;
                    cmsDummyData(1,p,theme);
                }
                if(current_data>0 && current_data<15){
                    cmsDummyData(current_data+1,p+5,theme);
                }
                if(current_data==15){
                    cmsDummyData(16,100,theme);
                }
                if(current_data==16){
                    $('#cms-msg').parent().css('width','100%');
                    $('#cms-msg .cms-status').text(' Loading 100%');
                    $('#cms-msg').append(data);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                $('#notify-msg').append('<br /> Have an error during import sample data. Please reload this page and try again.');
                $('#cms-msg').append("<br />error status: " + textStatus);
                $('#cms-msg').append("<br />errorThrown: " + errorThrown);
            }
        });
    }
    $(document).ready(function(){
    	$("#dummy-data").on("click",function(){
    		var r = confirm("Are you want import the demo data?");
        	if(r == true){
        		$('.cms-dummy-process').show();
	            var theme = $('#smof_data-theme .redux-image-select-selected').find('input').val();
	            $(this).attr('disabled','true');
	            $('#cms-msg .cms-status').text(' Loading ');
	            var p = 0;
	            var arr = ["options","widget","slider","grid"];
	            arr.forEach(function(entry){
	                p+=5;
	                cmsDummyData(entry,p,theme);
	            });
        	}
    	});
    });
})(jQuery)