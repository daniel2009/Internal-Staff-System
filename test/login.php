<?php 
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {

	header ("Location: index.php", true, 301);

}

?>

<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>UCSS Login</title>

	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="css/login.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="wrapper">
		<div class="container">
			<h1>UniCareer Staff System</h1>
			<form class="form">
				<input id="user_id" type="text" placeholder="Username">
				<input id="password" type="password" placeholder="Password">
				<button type="submit" id="login-button">Login</button>
			</form>
		</div>

		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#login-button").click(function(){
			var user_id = $("#user_id").val();
			var password = $("#password").val();
			$.post("php/login_be.php",
				{
					user_id:user_id,
					password:password
				},
				function(data, status){
					if (data === "Login check failed") {
						alert(data);
					}else{
						window.location.replace("index.php");
					}
					
				});
		});
	});
</script>

</body>
</html>
