
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
				    	<div id="collapse2" class="panel-collapse collapse in">
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
					          	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Event Database</a>
					        </h4>
				      	</div>
				    	<div id="collapse3" class="panel-collapse collapse">
					        <div class="panel-body">
					          	<ul  class="nav nav-tabs nav-stacked">
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
		<div class="main-section col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<div class="row tab-content">

			    <div id="menu1" class="col-xs-12 tab-pane fade">
			    	<div class="row">
			    		<h3>Mentee Classified Search</h3>
			    	</div>

			    	<div id="basic-search" class="row search-section">
				      	<div class="col-lg-2 col-md-3">
							<label>Basic info:</label>
							<select class="basic-info-type">
								<option>First Name</option>
								<option>Last Name</option>
								<option>Wechat ID</option>
								<option>Email</option>
								<option>School</option>
								<option>Concentration</option>
								<option>Payment Date</option>
								<option>Service</option>
							</select>
						</div>

						<div class="col-lg-4 col-md-5 basic-search-input basic-key-word">
							<label>Key Words:</label>
							<input id="key-word" type="text" placeholder="Key Words"></input>
						</div>

						<div class="col-lg-4 col-md-5 basic-search-input basic-service">
							<label>Service:</label>
							<select class="service-select">
								<option value="default">Default</option>
								<option disabled></option>
								<option>UniMembership</option>
								<option>Profile Builder</option>
								<option>Mock Interview</option>
								<option>VIP Service</option>
								<option>Refer Me</option>
								<option disabled></option>
								<option>Event</option>
								<option disabled></option>
								<option>Pre-Talk</option>
								<option>Offer Tracking</option>
							</select>
						</div>
						<div class="col-lg-2 col-md-3 basic-search-input basic-date-from">
							<label>Date From:</label>
							<input type="date"></input>
						</div>
						<div class="col-lg-2 col-md-3 basic-search-input basic-date-to">
							<label>Date To:</label>
							<input type="date"></input>
						</div>

						<div class="col-lg-3 col-md-3">
							<button id="search-button" class="btn btn-primary" type="button">Search</button>
						</div>
					</div>

					<div id="service-filter" class="row search-section">
						<div class="col-lg-2 col-md-3 col-sm-4">
							<label>Service:</label>
							<select class="service-select">
								<option value="default">Default</option>
								<option disabled></option>
								<option>UniMembership</option>
								<option>Profile Builder</option>
								<option>Mock Interview</option>
								<option>VIP Service</option>
								<option>Refer Me</option>
								<option disabled></option>
								<option>Event</option>
								<option disabled></option>
								<option>Pre-Talk</option>
								<option>Offer Tracking</option>
							</select>
						</div>
					</div>

					<div id="advanced-search" class="row search-section">
						<div class="col-lg-6 col-md-10 col-sm-12">
							<div id="search-profile-builder" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: Profile Builder</label>
								</div>
								<div class="info-entry col-lg-6 ui-widget">
									<label>Mentor:</label>
									<input class="mentor-autocomplete"></input>
								</div>
							</div>
							<div id="search-mock-interview" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: Mock Interview</label>
								</div>
								<div class="info-entry col-lg-6 ui-widget">
									<label>Mentor:</label>
									<input class="mentor-autocomplete"></input>
								</div>
							</div>
							<div id="search-vip-service" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: VIP Service</label>
								</div>
								<div class="info-entry col-lg-6 ui-widget">
									<label>Lead Mentor:</label>
									<input class="mentor-autocomplete" id="search-vip-mentor"></input>
								</div>
								<div class="info-entry col-lg-6">
									<label>Job Location:</label>
									<input id="search-vip-location"></input>
								</div>
								<div class="info-entry col-lg-6">
									<label>MPF Track:</label>
									<select id="search-vip-mpf-track">
										<option value="default"></option>
										<option disabled>>>Finance Sell Side<<</option>
										<option>Capital Market</option>
										<option>Commercial Banking</option>
										<option>Corporation Finance</option>
										<option>Equity Research</option>
										<option>Finance Data</option>
										<option>Finance IT</option>
										<option>IBD</option>
										<option>M&A</option>
										<option>Operation</option>
										<option>Project Management</option>
										<option>Quant</option>
										<option>Risk Management</option>
										<option>Sales/Trading</option>
										<option>Wealth Management</option>
										<option disabled></option>
										<option disabled>>>Finance Buy Side<<</option>
										<option>Asset Management</option>
										<option>Hedge Fund</option>
										<option>Mutual Fund</option>
										<option>Private Equity</option>
										<option>Venture Capital</option>
										<option disabled></option>
										<option disabled>>>Big Four<<</option>
										<option>Assurance</option>
										<option>Advisory</option>
										<option>Tax</option>
										<option disabled></option>
										<option disabled>>>Consulting<<</option>
										<option>Management Consulting</option>
										<option>IT Consulting</option>
										<option>HR Consulting</option>
										<option>Strategy Consulting</option>
										<option disabled></option>
										<option disabled>>>Other Fields<<</option>
										<option>Actuary</option>
										<option>Data</option>
										<option>HR</option>
										<option>Insurance</option>
										<option>IT</option>
										<option>Law</option>
										<option>Marketing</option>
										<option>Real Estate</option>
										<option>Supply Chain</option>
									</select>
								</div>
							</div>
							<div id="search-refer-me" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: Refer Me</label>
						      	</div>
						      	<div class="info-entry col-lg-6">
						      		<label>Job Type</label><br>
						      		<input type="radio" name="search-refer-job-type" value="1"> Fulltime</input>
						      		<input type="radio" name="search-refer-job-type" value="0"> Intern</input>
						      	</div>
						      	<div class="info-entry col-lg-6">
									<label>Field</label>
									<select id="search-refer-field">
										<option value="default"></option>
										<option disabled>>>Finance Sell Side<<</option>
										<option>Capital Market</option>
										<option>Commercial Banking</option>
										<option>Corporation Finance</option>
										<option>Equity Research</option>
										<option>Finance Data</option>
										<option>Finance IT</option>
										<option>IBD</option>
										<option>M&A</option>
										<option>Operation</option>
										<option>Project Management</option>
										<option>Quant</option>
										<option>Risk Management</option>
										<option>Sales/Trading</option>
										<option>Wealth Management</option>
										<option disabled></option>
										<option disabled>>>Finance Buy Side<<</option>
										<option>Asset Management</option>
										<option>Hedge Fund</option>
										<option>Mutual Fund</option>
										<option>Private Equity</option>
										<option>Venture Capital</option>
										<option disabled></option>
										<option disabled>>>Big Four<<</option>
										<option>Assurance</option>
										<option>Advisory</option>
										<option>Tax</option>
										<option disabled></option>
										<option disabled>>>Consulting<<</option>
										<option>Management Consulting</option>
										<option>IT Consulting</option>
										<option>HR Consulting</option>
										<option>Strategy Consulting</option>
										<option disabled></option>
										<option disabled>>>Other Fields<<</option>
										<option>Actuary</option>
										<option>Data</option>
										<option>HR</option>
										<option>Insurance</option>
										<option>IT</option>
										<option>Law</option>
										<option>Marketing</option>
										<option>Real Estate</option>
										<option>Supply Chain</option>
									</select>
								</div>
								<div class="info-entry col-lg-6 ui-widget">
									<label>Lead Mentor:</label>
									<input class="mentor-autocomplete" id="search-refer-lead-mentor"></input>
								</div>
								<div class="info-entry col-lg-6 ui-widget">
									<label>Mock Interview Mentor:</label>
									<input class="mentor-autocomplete" id="search-refer-mock-mentor"></input>
								</div>
							</div>
							<div id="search-event" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: Event</label>
								</div>
								<div class="info-entry col-lg-6">
									<label>Event:</label>
									<input class="event-autocomplete" id="search-event"></input>
								</div>
							</div>
							<div id="search-pre-talk" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: Pre-Talk</label>
								</div>
								<div class="info-entry col-lg-6">
									<label>Source:</label>
									<input id="search-pre-talk-source"></input>
								</div>
								<div class="info-entry col-lg-6">
									<label>Date:</label>
									<input type="date" id="search-pre-talk-date"></input>
								</div>
								<div class="info-entry col-lg-6 ui-widget">
									<label>Mentor:</label>
									<input class="mentor-autocomplete" id="search-pre-talk-mentor"></input>
								</div>
								<div class="info-entry col-lg-6">
									<label>Close Status</label><br>
				      				<input type="radio" name="search-pre-talk-close-status" value="1"> Closed</input>
				      				<input type="radio" name="search-pre-talk-close-status" value="0"> Processing</input>
								</div>
							</div>
							<div id="search-offer-tracking" class="row advanced-search-box">
								<div class="col-xs-12">
									<label>Advanced Search: Offer Tracking</label>
								</div>
								<div class="info-entry col-lg-6">
									<label>Source:</label><br>
									<input type="radio" name="search-offer-tracking-source" value="referral"> Internal Referral</input>
									<input type="radio" name="search-offer-tracking-source" value="other"> Other Offer</input>
								</div>
								<div class="info-entry col-lg-6">
						      		<label>Job Type</label><br>
						      		<input type="radio" name="search-offer-tracking-type" value="1"> Fulltime</input>
						      		<input type="radio" name="search-offer-tracking-type" value="0"> Intern</input>
						      	</div>
								<div class="info-entry col-lg-6">
									<label>Position:</label>
									<input id="search-offer-tracking-position"></input>
								</div>
								<div class="info-entry col-lg-6">
									<label>Company:</label>
									<input id="search-offer-tracking-company"></input>
								</div>
								<div class="info-entry col-lg-12">
									<label>Status:</label><br>
									<input type="radio" name="search-offer-tracking-status" value="referred"> Referred</input>
				      				<input type="radio" name="search-offer-tracking-status" value="interviewed"> Interviewed</input>
				      				<input type="radio" name="search-offer-tracking-status" value="hired"> Hired</input>
				      				<input type="radio" name="search-offer-tracking-status" value="fail"> Failed</input>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-8 col-md-12">
							<hr>
						</div>
					</div>

					<div class="row result-section">
						<div class="col-lg-10 col-md-12">
							<table class="result-table">
							</table>
						</div>
					</div>

			    </div>

			    <div id="menu2" class="col-xs-12 tab-pane fade">

			    	<div class="row">
			    		<h3>Add New Mentee Infomation</h3>
			    	</div>

			    	<div class="row">
			    		<div class="col-lg-10 col-md-12">
					    	<ul class="nav nav-tabs horizontal-tab">
						    	<li class="active"><a data-toggle="tab" href="#basic-info">Basic Information</a></li>
						    	<li><a data-toggle="tab" href="#pre-talk">Pre-Talk Tracking</a></li>
						    	<li><a data-toggle="tab" href="#purchase-records">Purchase Records</a></li>
						    	<li><a data-toggle="tab" href="#other-records">Other Records</a></li>
						 	</ul>
					 	</div>
				 	</div>

				 	<div class="row tab-content add-mentee-info">
				    	<div id="basic-info" class="col-xs-12 tab-pane fade in active">
				    		<div class="row">
				    			<label class="info-classification">Basic Information</label>
				    		</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-2 col-md-6 col-sm-8">
					      			<label>First Name</label>
					      			<input type="text" id="firstname" placeholder="Required" required></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-6 col-sm-8">
					      			<label>Last Name</label>
					      			<input type="text" id="lastname" placeholder="Required" required></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-6 col-sm-8">
					      			<label>Other Name</label>
					      			<input type="text" id="othername"></input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>Email</label>
					      			<input type="text" id="email"></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-6 col-sm-8">
					      			<label>Phone Number</label>
					      			<input type="text" id="phone"></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-6 col-sm-8">
					      			<label>Wechat ID</label>
					      			<input type="text" id="wechat"></input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>Location</label>
					      			<input type="text" id="location"></input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>School</label>
					      			<input type="text" id="school"></input>
					      		</div>
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>Degree</label>
									<select id="degree">
										<option value="default">Undefined</option>
										<option disabled></option>
										<option>Bachelor</option>
										<option>Bachelor of Art</option>
										<option>Bachelor of Business Administration</option>
										<option>Bachelor of Science</option>
										<option disabled></option>
										<option>Master</option>
										<option>Master of Arts</option>
										<option>Master of Business Administration</option>
										<option>Master of Business Logistics Engineering</option>
										<option>Master of Economics</option>
										<option>Master of Management</option>
										<option>Master of Public Administrations</option>
										<option>Master of Science</option>
										<option>Master of Engineering</option>
										<option disabled></option>
										<option>Ph.D</option>
										<option disabled></option>
									</select>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>Graduation Date</label>
					      			<input type="date" id="graduation-date"></input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>1st Concentration</label>
					      			<input type="text" id="first-concentration"></input>
					      		</div>
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>2nd Concentration</label>
					      			<input type="text" id="second-concentration" placeholder="Optional"></input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>UniMembership</label><br>
				      				<input type="radio" name="is-unimember" value="1"> UniMember</input>
				      				<input type="radio" name="is-unimember" value="0"> Non-UniMenber</input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div align="center" class="col-lg-8 col-md-12">
					      			<button type="button" id="basic-info-submit" class="btn btn-primary submit-button">Submit</button>
					      		</div>
					      	</div>
				      	</div>

				      	<div id="pre-talk" class="col-xs-12 tab-pane fade">
				      		<div class="row">
				      			<label class="info-classification">Pre-Talk Tracking</label>
				      		</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-2 col-md-4 col-sm-6 ui-widget">
					      			<label>Mentee</label>
					      			<input type="text" id="pre-talk-mentee" class="mentee-autocomplete" placeholder="Required" required></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-4 col-sm-6">
					      			<label>Source</label>
					      			<input type="text" id="pre-talk-source"></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-4 col-sm-6">
					      			<label>Pre-Talk Date</label>
					      			<input type="date" id="pre-talk-date"></input>
					      		</div>
					      		<div class="info-entry col-lg-2 col-md-4 col-sm-6">
					      			<label>Pre-Talk time</label>
					      			<input type="time" id="pre-talk-time"></input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8 ui-widget">
					      			<label for="pre-talk-mentor">Pre-Talk Mentor</label>
					      			<input type="text" id="pre-talk-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
					      		</div>
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>Pre-Talk Close Status</label><br>
				      				<input type="radio" name="pre-talk-close-status" value="1"> Closed</input>
				      				<input type="radio" name="pre-talk-close-status" value="0"> Processing</input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-8 col-md-12 col-sm-12">
					      			<label>Close Notes</label><br>
					      			<textarea id="pre-talk-close-notes" rows="6"></textarea>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
					      			<label>Recommend Service</label><br>
					      			<select id="pre-talk-recommend-service">
					      				<option value="default">Undifined</option>
										<option>UniMembership</option>
										<option>UniAcademy</option>
										<option>Profile Builder</option>
										<option>Personal Mentor</option>
										<option>Mock Interview</option>
										<option>VIP Service</option>
										<option>Refer Me</option>
									</select>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-8 col-md-12 col-sm-12">
					      			<label>3 Days Follow</label><br>
					      			<textarea id="pre-talk-3-days-follow" rows="6"></textarea>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-8 col-md-8 col-sm-8">
					      			<label>Final Close Status</label><br>
					      			<input type="radio" name="pre-talk-final-close-status" value="1"> Closed</input>
				      				<input type="radio" name="pre-talk-final-close-status" value="0"> Processing</input>
					      		</div>
					      	</div>
					      	<div class="row add-info">
					      		<div align="center" class="col-lg-8 col-md-12">
					      			<button type="button" id="pre-talk-submit" class="btn btn-primary submit-button">Submit</button>
					      		</div>
					      	</div>
				      	</div>

				      	<div id="purchase-records" class="col-xs-12 tab-pane fade">
				      		<div class="row">
				      			<label class="info-classification">Purchase Records</label>
				      		</div>
				      		<div class="row add-info">
				      			<div class="info-entry col-lg-4 col-md-6 col-sm-8 col-xs-12 ui-widget">
					      			<label>Mentee</label>
					      			<input type="text" id="purchase-records-mentee" class="mentee-autocomplete" placeholder="Required" required></input>
					      		</div>
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8 col-xs-12">
					      			<label>Purchased Service</label><br>
					      			<select id="purchased-service">
										<option value="default">UniMembership</option>
										<option>UniAcademy</option>
										<option>Profile Builder</option>
										<option>Mock Interview</option>
										<option>VIP Service</option>
										<option>Refer Me</option>
										<option>Personal Mentor</option>
										<option>Event</option>
									</select>
					      		</div>
					      		
					      	</div>
					      	<div class="row add-info">
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8 col-xs-12">
					      			<label>Payment Date</label>
					      			<input type="date" id="payment-date" required></input>
					      		</div>
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8 col-xs-12">
					      			<label>Payment Amount</label>
					      			<input type="text" id="payment-amount"></input>
					      		</div>
					      	</div>

					      	<div class="row" id="purchase-record-detail">
					      		<div class="col-lg-9 col-md-12 record-box vip-service-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">VIP Service</label>
					      				</div>
					      			</div>
						      		<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Session Quantity</label>
							      			<input type="text" id="session-quantity"></input>
							      		</div>
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>1st Job Location</label>
							      			<input type="text" id="vip-job-location-1"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>2nd Job Location</label>
							      			<input type="text" id="vip-job-location-2"></input>
							      		</div>
							      	</div>
							      	
							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>MPF Track 1</label>
							      			<select id="vip-mpf-track-1">
							      				<option value="default">Default</option>
												<option disabled>>>Finance Sell Side<<</option>
												<option>Capital Market</option>
												<option>Commercial Banking</option>
												<option>Corporation Finance</option>
												<option>Equity Research</option>
												<option>Finance Data</option>
												<option>Finance IT</option>
												<option>IBD</option>
												<option>M&A</option>
												<option>Operation</option>
												<option>Project Management</option>
												<option>Quant</option>
												<option>Risk Management</option>
												<option>Sales/Trading</option>
												<option>Wealth Management</option>
												<option disabled></option>
												<option disabled>>>Finance Buy Side<<</option>
												<option>Asset Management</option>
												<option>Hedge Fund</option>
												<option>Mutual Fund</option>
												<option>Private Equity</option>
												<option>Venture Capital</option>
												<option disabled></option>
												<option disabled>>>Big Four<<</option>
												<option>Assurance</option>
												<option>Advisory</option>
												<option>Tax</option>
												<option disabled></option>
												<option disabled>>>Consulting<<</option>
												<option>Management Consulting</option>
												<option>IT Consulting</option>
												<option>HR Consulting</option>
												<option>Strategy Consulting</option>
												<option disabled></option>
												<option disabled>>>Other Fields<<</option>
												<option>Actuary</option>
												<option>Data</option>
												<option>HR</option>
												<option>Insurance</option>
												<option>IT</option>
												<option>Law</option>
												<option>Marketing</option>
												<option>Real Estate</option>
												<option>Supply Chain</option>
											</select>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>MPF Track 2</label>
							      			<select id="vip-mpf-track-2">
							      				<option value="default">Default</option>
												<option disabled>>>Finance Sell Side<<</option>
												<option>Capital Market</option>
												<option>Commercial Banking</option>
												<option>Corporation Finance</option>
												<option>Equity Research</option>
												<option>Finance Data</option>
												<option>Finance IT</option>
												<option>IBD</option>
												<option>M&A</option>
												<option>Operation</option>
												<option>Project Management</option>
												<option>Quant</option>
												<option>Risk Management</option>
												<option>Sales/Trading</option>
												<option>Wealth Management</option>
												<option disabled></option>
												<option disabled>>>Finance Buy Side<<</option>
												<option>Asset Management</option>
												<option>Hedge Fund</option>
												<option>Mutual Fund</option>
												<option>Private Equity</option>
												<option>Venture Capital</option>
												<option disabled></option>
												<option disabled>>>Big Four<<</option>
												<option>Assurance</option>
												<option>Advisory</option>
												<option>Tax</option>
												<option disabled></option>
												<option disabled>>>Consulting<<</option>
												<option>Management Consulting</option>
												<option>IT Consulting</option>
												<option>HR Consulting</option>
												<option>Strategy Consulting</option>
												<option disabled></option>
												<option disabled>>>Other Fields<<</option>
												<option>Actuary</option>
												<option>Data</option>
												<option>HR</option>
												<option>Insurance</option>
												<option>IT</option>
												<option>Law</option>
												<option>Marketing</option>
												<option>Real Estate</option>
												<option>Supply Chain</option>
											</select>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>MPF Built Date</label>
							      			<input type="date" id="vip-mpf-built-date"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Mentor List Sent Date</label>
							      			<input type="date" id="vip-mentor-list-sent-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Lead Mentor picked Date</label>
							      			<input type="date" id="vip-lead-mentor-picked-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label>Lead Mentor</label>
							      			<input type="text" id="vip-lead-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Mentor Changed Date</label>
							      			<input type="date" id="vip-mentor-changed-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-mentor-changed-to">Mentor Changed To</label>
							      			<input type="text" id="vip-mentor-changed-to" class="mentor-autocomplete"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-first-mentor">1st Mentor</label>
							      			<input type="text" id="vip-first-mentor" class="mentor-autocomplete"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-second-mentor">2nd Mentor</label>
							      			<input type="text" id="vip-second-mentor" class="mentor-autocomplete"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-third-mentor">3rd Mentor</label>
							      			<input type="text" id="vip-third-mentor" class="mentor-autocomplete"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-assist-mentor-1">Assist Mentor 1</label>
							      			<input type="text" id="vip-assist-mentor-1" class="mentor-autocomplete"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-assist-mentor-2">Assist Mentor 2</label>
							      			<input type="text" id="vip-assist-mentor-2" class="mentor-autocomplete"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="vip-assist-mentor-3">Assist Mentor 3</label>
							      			<input type="text" id="vip-assist-mentor-3" class="mentor-autocomplete"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-8 col-md-12 col-sm-12 col-xs-12 ui-widget">
							      			<label>Free Boot Camp</label>
							      			<input type="text" id="vip-free-boot-camp" class="event-autocomplete"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Complete</label><br>
							      			<input type="radio" name="vip-complete" value="1"> YES</input>
						      				<input type="radio" name="vip-complete" value="0"> NO</input>
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box mock-interview-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Mock Interview</label>
					      				</div>
					      			</div>
						      		<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Interview Company</label>
							      			<input type="text" id="interview-company"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Interview Position</label>
							      			<input type="text" id="interview-position"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Interview Date</label>
							      			<input type="date" id="interview-date"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="mock-mentor">Mentor</label>
							      			<input type="text" id="mock-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Mock Date</label>
							      			<input type="date" id="mock-date"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Result</label><br>
							      			<input type="radio" name="mock-result" value="1"> Pass</input>
						      				<input type="radio" name="mock-result" value="0"> Fail</input>
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box refer-me-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Refer Me</label>
					      				</div>
					      			</div>
						      		<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Job Type</label><br>
							      			<input type="radio" name="refer-job-type" value="1"> Full Time</input>
						      				<input type="radio" name="refer-job-type" value="0"> Intern</input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Field</label>
							      			<select id="refer-field">
							      				<option value="default">Default</option>
												<option disabled>>>Finance Sell Side<<</option>
												<option>Capital Market</option>
												<option>Commercial Banking</option>
												<option>Corporation Finance</option>
												<option>Equity Research</option>
												<option>Finance Data</option>
												<option>Finance IT</option>
												<option>IBD</option>
												<option>M&A</option>
												<option>Operation</option>
												<option>Project Management</option>
												<option>Quant</option>
												<option>Risk Management</option>
												<option>Sales/Trading</option>
												<option>Wealth Management</option>
												<option disabled></option>
												<option disabled>>>Finance Buy Side<<</option>
												<option>Asset Management</option>
												<option>Hedge Fund</option>
												<option>Mutual Fund</option>
												<option>Private Equity</option>
												<option>Venture Capital</option>
												<option disabled></option>
												<option disabled>>>Big Four<<</option>
												<option>Assurance</option>
												<option>Advisory</option>
												<option>Tax</option>
												<option disabled></option>
												<option disabled>>>Consulting<<</option>
												<option>Management Consulting</option>
												<option>IT Consulting</option>
												<option>HR Consulting</option>
												<option>Strategy Consulting</option>
												<option disabled></option>
												<option disabled>>>Other Fields<<</option>
												<option>Actuary</option>
												<option>Data</option>
												<option>HR</option>
												<option>Insurance</option>
												<option>IT</option>
												<option>Law</option>
												<option>Marketing</option>
												<option>Real Estate</option>
												<option>Supply Chain</option>
											</select>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Position</label>
							      			<input type="text" id="refer-position"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="refer-lead-mentor">Lead Mentor</label>
							      			<input type="text" id="refer-lead-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="refer-mock-mentor">Mock Interview Mentor</label>
							      			<input type="text" id="refer-mock-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>1st Interview Date</label>
							      			<input type="date" id="refer-first-interview-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>1st Interview Company</label>
							      			<input type="text" id="refer-first-interview-company"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>1st Interview Position</label>
							      			<input type="text" id="refer-first-interview-position"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>1st Interview Result</label><br>
							      			<input type="radio" name="refer-first-result" value="1"> Pass</input>
						      				<input type="radio" name="refer-first-result" value="0"> Fail</input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>1st Interview Note</label>
							      			<textarea id="refer-first-notes" rows="6"></textarea>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>2nd Interview Date</label>
							      			<input type="date" id="refer-second-interview-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>2nd Interview Company</label>
							      			<input type="text" id="refer-second-interview-company"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>2nd Interview Position</label>
							      			<input type="text" id="refer-second-interview-position"></input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>2nd Interview Result</label><br>
							      			<input type="radio" name="refer-second-result" value="1"> Pass</input>
						      				<input type="radio" name="refer-second-result" value="0"> Fail</input>
							      		</div>
							      	</div>
							      	<div class="row add-info">
							      		<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>2nd Interview Note</label>
							      			<textarea id="refer-second-notes" rows="6"></textarea>
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box profile-builder-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Profile Builder</label>
					      				</div>
					      			</div>

					      			<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Start Date</label>
							      			<input type="date" id="profile-builder-start-date"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>First Revision Date</label>
							      			<input type="date" id="profile-builder-first-revision-date"></input>
							      		</div>
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Second Revision Date</label>
							      			<input type="date" id="profile-builder-Second-revision-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Third Revision Date</label>
							      			<input type="date" id="profile-builder-Third-revision-date"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="profile-builder-mentor">Mentor</label>
							      			<input type="text" id="profile-builder-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Offer</label><br>
							      			<input type="radio" name="profile-builder-offer" value="1"> Yes</input>
						      				<input type="radio" name="profile-builder-offer" value="0"> No</input>
							      		</div>
							      		
							      	</div>

							      	<div class="row add-info">
							      		<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>Note</label>
							      			<textarea id="profile-builder-note" rows="6"></textarea>
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box event-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Event</label>
					      				</div>
					      			</div>

					      			<div class="row add-info">
						      			<div class="info-entry col-lg-8 col-md-12 col-sm-12 col-xs-12 ui-widget">
							      			<label>Event</label>
							      			<input type="text" id="event-entry" class="event-autocomplete"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info event-detail">
						      			<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      		</div>
							      	</div>
					      		</div>
					      	</div>

					      	<div class="row add-info">
					      		<div class="info-entry col-lg-8 col-md-12" align="center">
					      			<button type="button" id="add-purchase-record" class="btn btn-primary submit-button">Add Record</button>
					      		</div>
					      	</div>

				      	</div>

				      	<div id="other-records" class="col-xs-12 tab-pane fade">
				      		<div class="row">
				      			<label class="info-classification">Other Records</label>
				      		</div>
				      		<div class="row add-info">
				      			<div class="info-entry col-lg-4 col-md-6 col-sm-8 col-xs-12 ui-widget">
					      			<label>Mentee</label>
					      			<input type="text" id="other-records-mentee" class="mentee-autocomplete" placeholder="Required" required></input>
					      		</div>
					      		<div class="info-entry col-lg-4 col-md-6 col-sm-8 col-xs-12">
					      			<label>Record Type</label><br>
					      			<select id="other-record-type">
					      				<option>Internal Referral Tracking</option>
					      				<option>Other Offer Tracking</option>
										<option>UniCareer Credit</option>
										<option>Session Tracking</option>
									</select>
					      		</div>
					      	</div>

					      	<div class="row" id="other-record-detail">
					      		<div class="col-lg-9 col-md-12 record-box internal-referral-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Internal Referral Tracking</label>
					      				</div>
					      			</div>

					      			<div class="row add-info">
						      			<div class="info-entry col-lg-8 col-md-12 col-sm-12 col-xs-12 ui-widget">
							      			<label>Internal Referral</label>
							      			<input type="text" id="internal-referral" class="internal-referral-autocomplete" placeholder="Required" required></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Refer Date</label>
							      			<input type="date" id="internal-referral-refer-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Interview Date</label>
							      			<input type="date" id="internal-referral-interview-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Hired Date</label>
							      			<input type="date" id="internal-referral-hired-date"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-8 col-md-12 col-sm-12 col-xs-12">
							      			<label>Status/Result</label><br>
							      			<input type="radio" name="internal-referral-result" value="referred"> Referred</input>
						      				<input type="radio" name="internal-referral-result" value="interviewed"> Interviewed</input>
						      				<input type="radio" name="internal-referral-result" value="hired"> Hired</input>
						      				<input type="radio" name="internal-referral-result" value="fail"> Failed</input>
							      		</div>
							      	</div>

							      	<div class="row add-info internal-referral-detail">
						      			<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box unicareer-credit-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">UniCareer Credit</label>
					      				</div>
					      			</div>

					      			<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Issue Date</label>
							      			<input type="date" id="unicareer-credit-issue-date"></input>
							      		</div>

							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Reason</label>
							      			<input type="text" id="unicareer-credit-reason" placeholder="Required" required></input>
							      		</div>

							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Amount</label>
							      			<input type="text" id="unicareer-credit-amount"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Use Date</label>
							      			<input type="date" id="unicareer-credit-use-date"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>Note</label>
							      			<textarea id="unicareer-credit-note" rows="6"></textarea>
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box offer-tracking-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Other Offer Tracking</label>
					      				</div>
					      			</div>

					      			<div class="row add-info">
					      				<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Offer Date</label>
							      			<input type="date" id="offer-tracking-date"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Job Type</label><br>
							      			<input type="radio" name="offer-tracking-type" value="1"> Fulltime</input>
						      				<input type="radio" name="offer-tracking-type" value="0"> Intern</input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Location</label>
							      			<input type="text" id="offer-tracking-location"></input>
							      		</div>
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Company</label>
							      			<input type="text" id="offer-tracking-company" placeholder="Required" required></input>
							      		</div>

						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Position</label>
							      			<input type="text" id="offer-tracking-position"></input>
							      		</div>
							      	</div>
					      		</div>

					      		<div class="col-lg-9 col-md-12 record-box session-tracking-record">
					      			<div class="row">
					      				<div class="col-xs-12">
					      					<label class="info-classification">Session Tracking</label>
					      				</div>
					      			</div>

					      			<div class="row add-info">
							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 ui-widget">
							      			<label for="session-mentor">Mentor</label>
							      			<input type="text" id="session-mentor" class="mentor-autocomplete" placeholder="Required" required></input>
							      		</div>

							      		<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Date</label>
							      			<input type="date" id="session-date"></input>
							      		</div>

						      			<div class="info-entry col-lg-4 col-md-6 col-sm-12 col-xs-12">
							      			<label>Session NO.</label>
							      			<input type="text" id="session-number"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
							      		<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>Topic</label>
							      			<input type="text" id="session-topic"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>Assignment</label>
							      			<input type="text" id="session-assignment"></input>
							      		</div>
							      	</div>

							      	<div class="row add-info">
						      			<div class="info-entry col-lg-12 col-md-12 col-sm-12 col-xs-12">
							      			<label>Note</label>
							      			<textarea id="session-note" rows="6"></textarea>
							      		</div>
							      	</div>
					      		</div>
					      	</div>

					      	<div class="row add-info">
					      		<div class="info-entry col-lg-8 col-md-12" align="center">
					      			<button type="button" id="add-other-record" class="btn btn-primary submit-button">Add Record</button>
					      		</div>
					      	</div>
				      	</div>
			      	</div>
			    </div>
		  	</div>
		</div>
	</div>
</div>

<!--Info Insert-->
<script type="text/javascript" src="js/mentee_add.js"></script>

<!--Classified Search-->
<script type="text/javascript" src="js/mentee_classify_search.js"></script>

<!--field autocomplete-->
<script type="text/javascript" src="js/mentee_page_autocomplete.js"></script>

<!--Log Out-->
<script type="text/javascript" src="js/log_out.js"></script>

<!--access control-->
<script type="text/javascript" src="js/mentee_access_control.js"></script>

</body>
</html>






















