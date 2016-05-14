
<?php 
session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {

	header ("Location: login.php", true, 301);

}

?>


<!DOCTYPE html>
<html>

<head>
    <title>UCS System</title>

	<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link href="css/style.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>


<body>

<div class="container-fluid">
	<div class="row">
		<!--left side bar with tab in accordion-->
		<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
			<div class="left-sider-bar">

				<div class="main-header">
					<h1>UniCareer Staff System</h1>
				</div>

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
				      	<div class="panel-heading">
					        <h4 class="panel-title">
					          	<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Mentor Database</a>
					        </h4>
				      	</div>
				    	<div id="collapse1" class="panel-collapse collapse">
					        <div class="panel-body">
					          	<ul  class="nav nav-tabs nav-stacked">
						            <li><a id="mentor-search">Classified Search</a></li>
						            <li><a id="mentor-add">Add Information</a></li>
					          	</ul>
					        </div>
				      	</div>
				    </div>

				    <div class="panel panel-default">
				      	<div class="panel-heading">
					        <h4 class="panel-title">
					          	<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Mentee Database</a>
					        </h4>
				      	</div>
				    	<div id="collapse2" class="panel-collapse collapse">
					        <div class="panel-body">
					          	<ul class="nav nav-tabs nav-stacked">
						            <li><a id="mentee-search">Classified Search</a></li>
						            <li><a id="mentee-add">Add Information</a></li>
					          	</ul>
					        </div>
				      	</div>
				    </div>

				    <div class="panel panel-default">
				      	<div class="panel-heading">
					        <h4 class="panel-title">
					          	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Event Database</a>
					        </h4>
				      	</div>
				    	<div id="collapse3" class="panel-collapse collapse">
					        <div class="panel-body">
					          	<ul class="nav nav-tabs nav-stacked">
						            <li><a id="event-search">Classified Search</a></li>
						            <li><a id="event-add">Add Information</a></li>
					          	</ul>
					        </div>
				      	</div>
				    </div>

				    <div class="panel panel-default">
				      	<div class="panel-heading">
					        <h4 class="panel-title">
					          	<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Referral Database</a>
					        </h4>
				      	</div>
				    	<div id="collapse4" class="panel-collapse collapse">
					        <div class="panel-body">
					          	<ul class="nav nav-tabs nav-stacked">
						            <li><a id="referral-search">Classified Search</a></li>
						            <li><a id="referral-add">Add Information</a></li>
					          	</ul>
					        </div>
				      	</div>
				    </div>

				    <div class="panel panel-default">
				      	<div class="panel-heading">
					        <h4 class="panel-title">
					          	<a class="log-out">Log out</a>
					        </h4>
				      	</div>
				    </div>
				</div>
			</div>
		</div>

		<!--tab content section -->
		<div class="main-section col-lg-10 col-md-8 col-sm-6 col-xs-12">
			<div class="row tab-content">
				<div id="menu0" class="col-xs-12 tab-pane fade in active">
					<div id="notification" class="col-xs-12">
						<h2>Welcome to UniCareer Staff System!</h2>
						<h5>Your current authority level is <span id="authority-level"></span>.</h5>
						<h5>You are authorized to access and edit <span id="access-mentor"> Mentor Database</span><span id="access-mentee"> Mentee Database</span><span id="access-event"> Event Database</span><span id="access-all"> All Database</span>.</h5>
					</div>	
				</div>
		  	</div>
		</div>
	</div>
</div>

<!--Log Out-->
<script type="text/javascript">
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
</script>

<!--access control-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#access-mentor").hide();
		$("#access-mentee").hide();
		$("#access-event").hide();
		$("#access-all").hide();
		$.get("php/session_check.php",function(data){
			if (data === "1111") {
				$("#authority-level").html("Priority Privilege");
				$("#access-all").show();
			}else{
				$("#authority-level").html("Limited Permission");
				if(data.charAt(0) === '1'){
					$("#access-mentor").show();
				}
				if(data.charAt(1) === '1'){
					$("#access-mentee").show();
				}
				if(data.charAt(2) === '1'){
					$("#access-event").show();
				}
			}
		});
	});
</script>

<!--redirection-->
<script type="text/javascript">
	$(document).ready(function(){
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
</script>

</body>
</html>






















