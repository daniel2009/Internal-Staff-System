$(document).ready(function(){
	$(".log-out").click(function(){
		var confirmLogout = confirm("Are you sure to log out?");
		if (confirmLogout == true) {
			$.get('php/log_out.php', function(data){
				if (data === "success") {
					window.location.replace("login.php");
				}
			});
		}
	});
});