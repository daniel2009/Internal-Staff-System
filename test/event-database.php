
<?php 
session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') || substr($_SESSION['authority'], 2, 1) != '1') {

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
				    	<div id="collapse3" class="panel-collapse collapse in">
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
		<div class="main-section col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<div class="row tab-content">

				<div id="menu1" class="col-xs-12 tab-pane fade">

					<div class="row">
						<h3>Classified Search</h3>
					</div>	

					<div class="search-section row">
						<div class="col-lg-4 col-md-3 col-sm-4">
							<label>Classification</label>	
							<select id="classification">
								<option> Default</option>
								<option> Date</option>
								<option disabled> Event Type</option>
								<option>>> Campus Talk</option>
								<option>>> Boot Camp</option>
								<option>>> Dine With Me</option>
								<option>>> Workshop</option>
								<option>>> Other</option>
							</select>						
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<label>Key Words:</label>
							<input class="search-field" id="key-word" type="text" placeholder="Key Words"></input>
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
							<h3>Add New Event Information</h3>
						</div>
						<div class="row">
							<div class="col-lg-10 col-md-12">
								<ul class="nav nav-tabs horizontal-tab">
									<li class="active"><a data-toggle="tab" href="#event-info">Event Information</a></li>
									<li><a data-toggle="tab" href="#mentor-attendence">Mentor Attendence</a></li>
								</ul>

							</div>


						</div>
						<div class="row tab-content">
							<div id="event-info" class="col-xs-12 tab-pane fade in active">
								<div class="row">
									<label class="info-classification">Event Information</label>
								</div>
								
								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
								      	<label>Type</label>
										<select id="type">
											<option>Campus Talk</option>
											<option>Boot Camp</option>
											<option>Dine With Me</option>
											<option>Workshop</option>
											<option>Other</option>
										</select>
								    </div>
								    <div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Date</label>
										<input id="date" type="date" required="true" min="2013-12-31"></input>
									</div>
								</div>
								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Location</label>
										<input id="location" required="true"></input>
									</div>
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Time</label>
										<input id="time" type="time"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-8 col-md-12 col-sm-12">
										<label>Topic</label>
										<input id="topic" required="true"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Ticket Price</label>
										<input id="ticket_price"></input>
									</div>
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Employee Leader</label>
										<input id="employee_leader"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Number of Mentors</label>
										<input id="number_of_mentors"></input>
									</div>

									<div class="info-entry col-lg-4 col-md-6 col-sm-8">
										<label>Number of Attendees</label>
										<input id="number_of_attendees"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-8 col-md-12 col-sm-8">
										<label>Notes</label>
										<textarea id="notes" rows="6"></textarea>
									</div>
								</div>
								<div class="row add-info">
									<div class="col-lg-8 col-md-12" align="center">
						      			<button type="button" id="event-info-submit" class="btn btn-primary submit-button">Submit</button>
						      		</div>
								</div>
							</div>

							<div id="mentor-attendence" class="col-xs-12 tab-pane fade">
								<div class="row">
									<label class="info-classification">Mentor Attendence</label>
								</div>
								
								<div class="row add-info">
									<div class="info-entry col-lg-8 col-md-12 col-sm-12 ui-widget">
										<label>Event keyword</label>
										<input id="event_keyword" class="event-autocomplete"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="info-entry col-lg-4 col-md-6 col-sm-8 ui-widget">
										<label>Mentor</label>
										<input id="mentor" class="mentor-autocomplete"></input>
									</div>
								</div>

								<div class="row add-info">
									<div class="col-lg-8 col-md-12" align="center">
						      			<button type="button" id="mentor-attending-submit" class="btn btn-primary submit-button">Submit</button>
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
<script type="text/javascript" src="js/event_access_control.js"></script>

<script type="text/javascript" src="js/event_add.js"></script>
<script type="text/javascript" src="js/event_edit.js"></script>
<script type="text/javascript" src="js/event_delete.js"></script>
<script type="text/javascript" src="js/event_classify_search.js"></script>
<script type="text/javascript" src="js/event_page_autocomplete.js"></script>
<script type="text/javascript" src="js/event_add_mentor_attendence.js"></script>
</body>
</html>






















