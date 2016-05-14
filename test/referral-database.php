
<?php 
session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') || substr($_SESSION['authority'], 3, 1) != '1') {

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
  	

</head>

<body>

<div class="container-fluid">
	<div class="row">
		<!--left side bar with tab in accordion-->
		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
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
				    	<div id="collapse4" class="panel-collapse collapse in">
					        <div class="panel-body">
					          	<ul class="nav nav-tabs nav-stacked">
						            <li id="menu-1"><a data-toggle="tab" href="#menu1">Classified Search</a></li>
						            <li id="menu-2"><a data-toggle="tab" href="#menu2">Add Information</a></li>
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
		<div class="main-section col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<div class="row tab-content">

				<div id="menu1" class="col-xs-12 tab-pane fade">

					<div class="row">
						<h3>Referral Classified Search</h3>
					</div>	

					<div class="search-section row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<label>Classification</label>	
							<select id="classification">
								<option>Default</option>
								<option>Company</option>
								<option>Position</option>
								<option>Location</option>
								<option disabled>Type</option>
								<option>>>Fulltime</option>
								<option>>>Intern</option>
								<option>Submission Date</option>
								<option>Expire After</option>
							</select>						
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 search-key-word">
							<label>Key Words:</label>
							<input class="search-field" id="key-word" type="text" placeholder="Key Words"></input>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-4 date-from">
							<label>Date From:</label>
							<input type="date" id="date-from"></input>
						</div>

						<div class="col-lg-2 col-md-4 col-sm-4 date-to">
							<label>Date To:</label>
							<input type="date" id="date-to"></input>
						</div>
						
						<div class="col-lg-2 col-md-4 col-sm-4 filterDate">
							<label>Expire After</label>
							<input type="date" id="filterDate"></input>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4">
							<button id="search-button" class="btn btn-primary" type="button">Search</button>
						</div>
					</div>


					<div class="result-section row">
						<div class="col-lg-2 col-md-2">
							<p><span id="result-count"></span><span id="result-text"></span></p>
						</div>
						<div class="col-lg-12 col-md-12">
							<table class="result-table">
							</table>
						</div>
						
					</div>

				</div>



				<div id="menu2" class="col-xs-12 tab-pane fade">
					<form name="myform" novalidate>
						<div class="row">
							<h3>Add New Referral Information</h3>
						</div>
						<div class="row">
							<div class="col-lg-10 col-md-12">
								<ul class="nav nav-tabs horizontal-tab">
									<li class="active"><a data-toggle="tab" href="#referral-info">Referral Information</a></li>
								</ul>
							</div>
						</div>

						<div class="row tab-content">
							<div id="referral-info" class="col-xs-12 tab-pane fade in active">
								<div class="row">
									<label class="info-classification">Referral Information</label>
								</div>
								
								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Type</label>
										<div>
											<input type="radio" value="1" name="job-type"> Fulltime</input>
											<input type="radio" value="0" name="job-type"> Intern</input>
										</div>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Location</label>
										<input id="location"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
								      	<label>Company</label>
								      	<input id="company" required="true"></input>
								    </div>
								    <div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Position</label>
										<input id="position" required="true"></input>
									</div>									
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Created Date</label>
										<input id="create_date" type="date" required="true" min="2013-12-31"></input>
									</div>
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Submission Date</label>
										<input id="submission_date" type="date" required="true" min="2013-12-31"></input>
									</div>
								</div>


								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Expired Date</label>
										<input id="expire_date" type="date"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-8 col-md-12 col-sm-12">
										<label>Link</label>
										<input id="link"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-8 col-md-12 col-sm-12">
										<label>Requirement</label>
										<textarea id="requirement" rows="6"></textarea>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-8 col-md-12 col-sm-12">
										<label>Job Description</label>
										<textarea id="job_description" rows="6"></textarea>
									</div>
								</div>

								<div class="row add-info">
									<div class="col-lg-8 col-md-12" align="center">
						      			<button type="button" id="referral-info-submit" class="btn btn-primary submit-button">Submit</button>
						      		</div>
								</div>
							</div>
						</div>
					</form>
						
				</div>
		  	</div>
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--Log Out-->
<script type="text/javascript" src="js/log_out.js"></script>

<!--access control-->
<script type="text/javascript" src="js/referral_access_control.js"></script>

<script type="text/javascript" src="js/referral_add.js"></script>
<script type="text/javascript" src="js/referral_edit.js"></script>
<script type="text/javascript" src="js/referral_delete.js"></script>
<script type="text/javascript" src="js/referral_classify_search.js"></script>
<script type="text/javascript" src="js/referral_search_field_show_hide.js"></script>
</body>
</html>






















