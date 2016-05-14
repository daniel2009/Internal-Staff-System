<?php 
session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') || substr($_SESSION['authority'], 1, 1) != '1') {

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

<div class="container">
	<div class="row">
		<div class="col-md-12 main-section">
			<div class="row">
	    		<h3 class="mentee-profile-name"></h3>
	    	</div>

			<div class="row">
				<div class="col-lg-10 col-md-12">
			    	<ul class="nav nav-tabs horizontal-tab">
				    	<li class="active"><a data-toggle="tab" href="#basic-info">Basic Information</a></li>
				    	<li><a data-toggle="tab" href="#pre-talk">Pre-Talk Tracking</a></li>
				    	<li><a data-toggle="tab" href="#purchase-records">Purchased Service</a></li>
				    	<li><a data-toggle="tab" href="#other-records">Other Records</a></li>
				 	</ul>
			 	</div>
		 	</div>

		 	<div class="row tab-content result-section">
		 		<div id="basic-info" class="col-xs-12 tab-pane fade in active">
		 		</div>
		 		<div id="pre-talk" class="col-xs-12 tab-pane fade">
		 		</div>
		 		<div id="purchase-records" class="col-xs-12 tab-pane fade">
		 		</div>
		 		<div id="other-records" class="col-xs-12 tab-pane fade">
		 		</div>
		 	</div>
		</div>
	</div>
	
</div>

<!--Parse the Json and display the content-->
<script type="text/javascript" src="js/mentee_detail_show.js"></script>

<!--info edit-->
<script type="text/javascript" src="js/mentee_detail_edit.js"></script>

<!--Delete Button Tapped-->
<script type="text/javascript" src="js/mentee_detail_delete.js"></script>

<!--field autocomplete-->
<script type="text/javascript" src="js/mentee_detail_autocomplete.js"></script>

</body>
</html>


