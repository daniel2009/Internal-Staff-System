var getUrlParameter = function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;
	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	};

	$(document).ready(function(){

		var tabName = getUrlParameter('tab');
	    if(tabName === 'event-search'){
	    	$("#menu1").addClass('in active');
	    }else if (tabName === 'event-add') {
	    	$("#menu2").addClass('in active')
	    }

		$("#collapse1 a").click(function(){
			var tab = $(this).attr('id');
			$.get("php/session_check.php",function(data){
				if (data.charAt(0) === '1') {
					window.location.replace("mentor-database.php?tab=" + tab);
				}else{
					alert("Permission denied!");
				}
			});
		});
		$("#collapse2 a").click(function(){
			var tab = $(this).attr('id');
			$.get("php/session_check.php",function(data){
				if (data.charAt(1) === '1') {
					window.location.replace("mentee-database.php?tab=" + tab);
				}else{
					alert("Permission denied!");
				}
			});
		});
	});