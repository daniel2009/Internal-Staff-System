

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
    if(tabName === 'mentor-search'){
    	$("#menu-1").addClass('active');
    	$("#menu1").addClass('in active');
    }else if (tabName === 'mentor-add') {
    	$("#menu-2").addClass('active');
    	$("#menu2").addClass('in active');
    }

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

	$("#collapse3 a").click(function(){
		var tab = $(this).attr('id');
		$.get("php/session_check.php",function(data){
			if (data.charAt(2) === '1') {
				window.location.replace("event-database.php?tab=" + tab);
			}else{
				alert("Permission denied!");
			}
		});
	});
	$("#collapse4 a").click(function(){
		var tab = $(this).attr('id');
		$.get("php/session_check.php",function(data){
			if (data.charAt(3) === '1') {
				window.location.replace("referral-database.php?tab=" + tab);
			}else{
				alert("Permission denied!");
			}
		});
	});
});