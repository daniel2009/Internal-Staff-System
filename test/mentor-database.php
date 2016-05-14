
<?php 
session_start();

if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') || substr($_SESSION['authority'], 0, 1) != '1') {

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
				    	<div id="collapse1" class="panel-collapse collapse in">
					        <div class="panel-body">
					          	<ul  class="nav nav-tabs nav-stacked">
						            <li id="menu-1"><a data-toggle="tab" href="#menu1">Classified Search</a></li>
						            <li id="menu-2"><a data-toggle="tab" href="#menu2">Add Information</a></li>
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
		<div class="main-section col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<div class="row tab-content">
			    <div id="menu1" class="col-xs-12 tab-pane fade">

			    	<div class="row">
			    		<h3>Mentor Classified Search</h3>
			    	</div>

		    		<div class="search-section row">
				      	<div class="col-lg-2 col-md-3 col-sm-4">
							<label>Classifacation:</label>
							<select id="classification">
								<option>Default</option>
								<option disabled></option>
								<option>Basic Info</option>
								<option>>>> First Name</option>
								<option>>>> Last Name</option>
								<option>>>> Company</option>
								<option>>>> Title</option>
								<option>>>> Location</option>
								<option disabled></option>
								<option>Specialty</option>
								<option>>>> Finance Sell Side</option>
								<option>>>> Finance Buy Side</option>
								<option>>>> Big Four</option>
								<option>>>> Consulting</option>
								<option>>>> Other Fields</option>
								<option disabled></option>
								<option>Expert Session</option>
								<option disabled></option>
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

					<div class="row result-section">
						<div class="col-lg-10 col-md-12">
							<label id="search-hint">Specialty Search Hint:</label><br>
							<table class="result-table">
								<tr>
									<th colspan = "4">Finance</th>
								</tr>
								<tr>
									<th colspan = "3">Sell Side</th>
									<th colspan = "1">Buy Side</th>
								</tr>
								<tr>
									<td>Capital Market</td>
									<td>Commercial Banking</td>
									<td>Corporate Finance</td>
									<td>Asset Management</td>
								<tr>
									<td>Equity Research</td>
									<td>Finance Data</td>
									<td>Finance IT</td>
									<td>Hedge Fund</td>
								</tr>
								<tr>
									<td>IBD</td>
									<td>M&A</td>
									<td>Operation</td>
									<td>Private Equity</td>
								</tr>
								<tr>
									<td>Project Management</td>
									<td>Quant</td>	
									<td>Risk Management
									<td>Venture Capital</td>
								</tr>
								<tr>
									<td>Sales & Trading
									<td>Wealth Management</td>
									<td></td>
									<td>Mutual Fund</td>
								</tr>
								<tr>
									<th colspan = "4">Big Four</th>
								</tr>
								<tr>
									<td>Assurance</td>
									<td>Advisory</td>
									<td>Tax</td>
								</tr>
								<tr>
									<th colspan = "4">Consulting</th>
								</tr>
								<tr>
									<td>Management Consulting</td>
									<td>IT Consulting</td>
									<td>HR Consulting</td>
									<td>Strategy Consulting</td>
								</tr>
								<tr>
									<th colspan="4">Other Fields</th>
								</tr>
								<tr>
									<td>Actuary</td>
									<td>Data</td>
									<td>Supply Chain</td>
									<td>HR</td>
								</tr>
								<tr>
									<td>Insurance</td>
									<td>IT</td>
									<td>Law</td>
									<td>Marketing</td>
								</tr>
								<tr>
									<td>Real Estate</td>
								</tr>
								<tr>
									<th colspan = "4">Expert Session</th>
								</tr>
								<tr>
									<td>Resume Editing</td>
									<td>Networking Skill</td>
									<td>Mock Interview</td>
									<td>Behavioral Question</td>
								</tr>
								<tr>
									<td>Technical Question</td>
								</tr>
							</table>
						</div>
					</div>
			    </div>
			    <div id="menu2" class="col-xs-12 tab-pane fade">
			    	<div class="row">
			      		<h3>Add New Mentor Infomation</h3>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>First Name</label>
			      			<input id="firstname" placeholder="Required"></input>
			      		</div>
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Last Name</label>
			      			<input id="lastname"></input>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Company</label>
			      			<input id="company"></input>
			      		</div>
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Title</label>
			      			<input id="title"></input>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Email</label>
			      			<input id="email"></input>
			      		</div>
			      		<div class="info-entry col-lg-2 col-md-4 col-sm-6">
			      			<label>Phone Number</label>
			      			<input id="phone"></input>
			      		</div>
			      		<div class="info-entry col-lg-2 col-md-4 col-sm-6">
			      			<label>Wechat ID</label>
			      			<input id="wechat"></input>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Education</label>
			      			<input id="education"></input>
			      		</div>
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Location</label>
			      			<input id="location"></input>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div id="specialty" class="info-entry col-xs-12">
			      			<label>Specialty</label>
			      			<div class="row">
			      				<div class="col-lg-10 col-md-12">
								  	<ul class="nav nav-tabs horizontal-tab">
								    	<li class="active"><a data-toggle="tab" href="#sell-side">Finance Sell Side</a></li>
								    	<li><a data-toggle="tab" href="#buy-side">Finance Buy Side</a></li>
								    	<li><a data-toggle="tab" href="#big-four">Big Four</a></li>
								    	<li><a data-toggle="tab" href="#consulting">Consulting</a></li>
								    	<li><a data-toggle="tab" href="#other-fields">Other Fields</a></li>
								    	<li><a data-toggle="tab" href="#expert-session">Expert Session</a></li>
								    	<li><a data-toggle="tab" href="#specified">Specified</a></li>
								 	</ul>
							 	</div>
						 	</div>

						  	<div class="row tab-content">
						    	<div id="sell-side" class="tab-pane fade in active">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
						      			<label class="checkbox-label"><input type="checkbox" value="Capital Market"> Capital Market</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Commercial Banking"> Commercial Banking</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Corporate Finance"> Corporate Finance</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Equity Research"> Equity Research</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Finance Data"> Finance Data</label><br>
									</div>
									<div class="checkbox col-lg-3 col-md-4 col-sm-6">
										<label class="checkbox-label"><input type="checkbox" value="Finance IT"> Finance IT</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="IBD"> IBD</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="M&A"> M&A</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Operation"> Operation</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Project Management"> Project Management</label><br>
									</div>
									<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    
									    <label class="checkbox-label"><input type="checkbox" value="Quant"> Quant</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Risk Management"> Risk Management</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Sales Trading"> Sales/Trading</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Wealth Management"> Wealth Management</label><br>
									</div>
						    	</div>
						    	<div id="buy-side" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label class="checkbox-label"><input type="checkbox" value="Asset Management"> Asset Management</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Hedge Fund"> Hedge Fund</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Mutual Fund"> Mutual Fund</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Private Equity"> Private Equity</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Venture Capital"> Venture Capital</label><br>
									</div>
						    	</div>
						    	<div id="big-four" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label class="checkbox-label"><input type="checkbox" value="Assurance"> Assurance</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Advisory"> Advisory</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Tax"> Tax</label><br>
									</div>
						    	</div>
						    	<div id="consulting" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label class="checkbox-label"><input type="checkbox" value="Management Consulting"> Management Consulting</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="IT Consulting"> IT Consulting</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="HR Consulting"> HR Consulting</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Strategy Consulting"> Strategy Consulting</label><br>
									</div>
						    	</div>
						    	<div id="other-fields" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label class="checkbox-label"><input type="checkbox" value="Actuary"> Actuary</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Data"> Data</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="HR"> HR</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Insurance"> Insurance</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="IT"> IT</label><br>
									</div>
									<div class="checkbox col-lg-3 col-md-4 col-sm-6">
										<label class="checkbox-label"><input type="checkbox" value="Law"> Law</label><br>
										<label class="checkbox-label"><input type="checkbox" value="Marketing"> Marketing</label><br>
										<label class="checkbox-label"><input type="checkbox" value="Real Estate"> Real Estate</label><br>
										<label class="checkbox-label"><input type="checkbox" value="Supply Chain"> Supply Chain</label><br>
									</div>
						    	</div>
						    	<div id="expert-session" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label class="checkbox-label"><input type="checkbox" value="Resume Editing"> Resume Editing</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Networking Skill"> Networking Skill</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Mock Interview"> Mock Interview</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Behavioral Question"> Behavioral Question</label><br>
									    <label class="checkbox-label"><input type="checkbox" value="Technical Question"> Technical Question</label><br>
									</div>
						    	</div>
						    	<div id="specified" class="tab-pane fade">
						    		<div class="specified-specialty col-lg-4 col-md-8 col-sm-12">
						    			<label class="checkbox-label">Specified Field: </label><input id="specified-field"></input>
						    		</div>
						    	</div>
						  	</div>
						</div>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Linkedin</label>
			      			<input id="linkedin"></input>
			      		</div>
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Evaluation Online</label>
			      			<input id="evaluation"></input>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-8 col-md-12">
			      			<label>Bio</label>
			      			<textarea rows="6" id="bio_note"></textarea>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div class="info-entry col-lg-8 col-md-12">
			      			<label>Note</label>
			      			<textarea rows="6" id="note"></textarea>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div align="center" class="col-lg-8 col-md-12">
			      			<button id="add-button" class="btn btn-primary submit-button" type="button">Submit</button>
			      		</div>
		      		</div>
			    </div>
		  	</div>
		</div>
	</div>
</div>
<!--Jquery AJAX-->

<!--classify search-->
<script type="text/javascript" src="js/mentor_classify_search.js"></script>

<!--add infomation-->
<script type="text/javascript" src="js/mentor_add.js"></script>

<!--delete information-->
<script type="text/javascript" src="js/mentor_delete.js"></script>

<!--Edit function button tapped in dropdown list Edit mode-->
<script type="text/javascript" src="js/mentor_edit.js"></script>

<!--access control-->
<script type="text/javascript" src="js/mentor_access_control.js"></script>

<!--Log Out-->
<script type="text/javascript" src="js/log_out.js"></script>

</body>
</html>






















