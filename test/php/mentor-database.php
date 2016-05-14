
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
  	<link href="css/index.css" rel="stylesheet" type="text/css">
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
						            <li><a data-toggle="tab" href="#menu1">Classified Search</a></li>
						            <li><a data-toggle="tab" href="#menu2">Add Information</a></li>
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
				      	<div class="col-lg-2 col-md-3 col-sm-4">
							<label>Classifacation</label>
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
							<button id="search-button" class="btn btn-primary" type="button">Submit</button>
						</div>
					</div>

					<div id="result-section" class="row">
						<div class="col-lg-10 col-md-12">
							<table id="result-table">
								<tr>
									<label>Specialty Search Hint:</label><br>
								</tr>
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
								  	<ul class="nav nav-tabs">
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
						      			<label><input type="checkbox" value="Capital Market"> Capital Market</label><br>
									    <label><input type="checkbox" value="Commercial Banking"> Commercial Banking</label><br>
									    <label><input type="checkbox" value="Corporate Finance"> Corporate Finance</label><br>
									    <label><input type="checkbox" value="Equity Research"> Equity Research</label><br>
									    <label><input type="checkbox" value="Finance Data"> Finance Data</label><br>
									</div>
									<div class="checkbox col-lg-3 col-md-4 col-sm-6">
										<label><input type="checkbox" value="Finance IT"> Finance IT</label><br>
									    <label><input type="checkbox" value="IBD"> IBD</label><br>
									    <label><input type="checkbox" value="M&A"> M&A</label><br>
									    <label><input type="checkbox" value="Operation"> Operation</label><br>
									    <label><input type="checkbox" value="Project Management"> Project Management</label><br>
									</div>
									<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    
									    <label><input type="checkbox" value="Quant"> Quant</label><br>
									    <label><input type="checkbox" value="Risk Management"> Risk Management</label><br>
									    <label><input type="checkbox" value="Sales Trading"> Sales/Trading</label><br>
									    <label><input type="checkbox" value="Wealth Management"> Wealth Management</label><br>
									</div>
						    	</div>
						    	<div id="buy-side" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label><input type="checkbox" value="Asset Management"> Asset Management</label><br>
									    <label><input type="checkbox" value="Hedge Fund"> Hedge Fund</label><br>
									    <label><input type="checkbox" value="Mutual Fund"> Mutual Fund</label><br>
									    <label><input type="checkbox" value="Private Equity"> Private Equity</label><br>
									    <label><input type="checkbox" value="Venture Capital"> Venture Capital</label><br>
									</div>
						    	</div>
						    	<div id="big-four" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label><input type="checkbox" value="Assurance"> Assurance</label><br>
									    <label><input type="checkbox" value="Advisory"> Advisory</label><br>
									    <label><input type="checkbox" value="Tax"> Tax</label><br>
									</div>
						    	</div>
						    	<div id="consulting" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label><input type="checkbox" value="Management Consulting"> Management Consulting</label><br>
									    <label><input type="checkbox" value="IT Consulting"> IT Consulting</label><br>
									    <label><input type="checkbox" value="HR Consulting"> HR Consulting</label><br>
									    <label><input type="checkbox" value="Strategy Consulting"> Strategy Consulting</label><br>
									</div>
						    	</div>
						    	<div id="other-fields" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label><input type="checkbox" value="Actuary"> Actuary</label><br>
									    <label><input type="checkbox" value="Data"> Data</label><br>
									    <label><input type="checkbox" value="HR"> HR</label><br>
									    <label><input type="checkbox" value="Insurance"> Insurance</label><br>
									    <label><input type="checkbox" value="IT"> IT</label><br>
									</div>
									<div class="checkbox col-lg-3 col-md-4 col-sm-6">
										<label><input type="checkbox" value="Law"> Law</label><br>
										<label><input type="checkbox" value="Marketing"> Marketing</label><br>
										<label><input type="checkbox" value="Real Estate"> Real Estate</label><br>
										<label><input type="checkbox" value="Supply Chain"> Supply Chain</label><br>
									</div>
						    	</div>
						    	<div id="expert-session" class="tab-pane fade">
						      		<div class="checkbox col-lg-3 col-md-4 col-sm-6">
									    <label><input type="checkbox" value="Resume Editing"> Resume Editing</label><br>
									    <label><input type="checkbox" value="Networking Skill"> Networking Skill</label><br>
									    <label><input type="checkbox" value="Mock Interview"> Mock Interview</label><br>
									    <label><input type="checkbox" value="Behavioral Question"> Behavioral Question</label><br>
									    <label><input type="checkbox" value="Technical Question"> Technical Question</label><br>
									</div>
						    	</div>
						    	<div id="specified" class="tab-pane fade">
						    		<div class="specified-specialty col-lg-4 col-md-8 col-sm-12">
						    			<label>Specified Field: </label><input id="specified-field"></input>
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
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Note</label>
			      			<input id="note"></input>
			      		</div>
			      		<div class="info-entry col-lg-4 col-md-6 col-sm-8">
			      			<label>Bio</label>
			      			<input id="bio_note"></input>
			      		</div>
			      	</div>
			      	<div class="row add-info">
			      		<div align="center" class="col-lg-8 col-md-12">
			      			<button id="add-button" class="btn btn-primary" type="button">Submit</button>
			      		</div>
		      		</div>
			    </div>
		  	</div>
		</div>
	</div>
</div>
<!--Jquery AJAX-->

<!--classify search-->
<script>
	$(document).ready(function(){
	    $("#search-button").click(function(){
	    	$("#result-table").empty();
	    	var option=$("#classification option:selected").text();
	    	//console.log(option);
	    	var key_word=$("#key-word").val();
	    	//console.log(key_word);
	        $.post("php/classify_search.php",
	        {
	          classification: option,
	          key_word: key_word
	        },
	        function(data,status){
	        	var header = "<tr><th>Mentor ID</th><th>Last Name</th><th>First Name</th><th>Company</th><th>Title</th><th>Location</th><th>Detail</th><th>Operation</th></tr>";
	        	$("#result-table").append(header);
	        	//console.log(data);
	        	data = JSON && JSON.parse(data) || $.parseJSON(data);
	        	for (var i =0; i < data.length; i++) {
	        		var mentor_id ="<td>" + data[i][0].mentor_id + "</td>";
	        		var lastname = "<td id='info-lastname-"+data[i][0].mentor_id+"'>" + data[i][0].lastname + "</td>";
	        		var firstname = "<td id='info-firstname-"+data[i][0].mentor_id+"'>" + data[i][0].firstname + "</td>";
	        		var company = "<td id='info-company-"+data[i][0].mentor_id+"'>" + data[i][0].company + "</td>";
	        		var title = "<td id='info-title-"+data[i][0].mentor_id+"'>" + data[i][0].title + "</td>";
	        		var location = "<td id='info-location-"+data[i][0].mentor_id+"'>" + data[i][0].location + "</td>";
	        		var email = "<td id='info-email-"+data[i][0].mentor_id+"'>" + data[i][0].email + "</td>";
	        		var phone = "<td id='info-phone-"+data[i][0].mentor_id+"'>" + data[i][0].phone + "</td>";
	        		var wechat = "<td id='info-wechat-"+data[i][0].mentor_id+"'>" + data[i][0].wechat + "</td>";
	        		var education = "<td id='info-education-"+data[i][0].mentor_id+"'>" + data[i][0].education + "</td>";
	        		var linkedin = "<td id='info-linkedin-"+data[i][0].mentor_id+"' colspan = '2'><a href="+data[i][0].linkedin+" target='_blank'>" + data[i][0].linkedin + "</a></td>";
	        		var evaluation = "<td id='info-evaluation-"+data[i][0].mentor_id+"' colspan = '2'><a href="+ data[i][0].evaluation +" target='_blank'>" + data[i][0].evaluation + "</a></td>";
	        		var note = "<td colspan = '1' id='info-note-"+data[i][0].mentor_id+"'>" + data[i][0].note + "</td>";
	        		var bio_note = "<td colspan = '3' class='bio' id='info-bio-note-"+data[i][0].mentor_id+"'>" + data[i][0].bio_note + "</td>";

	        		var specialties = "<td id='info-specialties-"+data[i][0].mentor_id+"' colspan = '4'>";
	        		var specified_field = "Specified-Field: ";
	        		for (var j = 0; j < data[i][1].length; j++) {
	        			if (data[i][1][j].field == "Specified") {
	        				specified_field = specified_field + data[i][1][j].specialty;
	        			}else{
	        				specialties = specialties + data[i][1][j].specialty + ";  ";
	        			}
	        		}
	        		if (specified_field != "Specified-Field: ") {
	        			specialties = specialties + specified_field + ";  </td>";
	        		}else{
	        			specialties = specialties + "</td>";
	        		}
	        		
	        		//console.log(specialties);
	        		var moreButton = "<td><button class='more-button btn btn-success' data-toggle='collapse' data-target='#detail-"+data[i][0].mentor_id+"'>More</button></td>";
	        		var editButton ="<td><div id='edit-button-"+data[i][0].mentor_id+"' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-"+data[i][0].mentor_id+"' href='#'>Edit</a></li><li><a class='info-delete' id='delete-"+data[i][0].mentor_id+"' href='#'>Delete</a></li></ul></div></td>";
	        		var detail = "<tr><td colspan='8' id='detail-"+data[i][0].mentor_id+"' class='collapse'><table id='embed-"+data[i][0].mentor_id+"' class='embed'><tr><th>Phone Number</th><th>Email</th><th>Wechat</th><th>Education</th></tr><tr>"+phone+email+wechat+education+"</tr><tr><th colspan = '2'>Linkedin</th><th colspan = '2'>Evaluation</th></tr><tr>"+linkedin+evaluation+"</tr><tr><th colspan = '4'>Specialties</th></tr><tr>"+specialties+"</tr><tr><th colspan = '1'>Note</th><th colspan = '3'>Bio</th></tr><tr>"+note+bio_note+"</tr></table></td></tr>";

	        		$("#result-table").append("<tr>" + mentor_id + lastname + firstname + company + title + location + moreButton + editButton + "</tr>" + detail);
	        	}

	        	var lastRow = "<tr><td colspan='8'><h4>This is the last row!</h4></td></tr>"
	        	$("#result-table").append(lastRow);
	        });
	    });
	});
</script>

<!--add infomation-->
<script>
	$(document).ready(function(){
		$("#add-button").click(function(){
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var company = $("#company").val();
			var title = $("#title").val();
			var email = $("#email").val();
			var phone = $("#phone").val();
			var wechat = $("#wechat").val();
			var education = $("#education").val();
			var location = $("#location").val();
			var checkedSellSide = [];
			var checkedBuySide = [];
			var checkedBigFour = [];
			var checkedConsulting = [];
			var checkedOtherFields = [];
			var checkedExpertSession = [];
			$("#sell-side .checkbox input").each(function(){
				if ($(this).is(":checked")) {
					checkedSellSide.push($(this).val());
				}
			});
			$("#buy-side .checkbox input").each(function(){
				if ($(this).is(":checked")) {
					checkedBuySide.push($(this).val());
				}
			});
			$("#big-four .checkbox input").each(function(){
				if ($(this).is(":checked")) {
					checkedBigFour.push($(this).val());
				}
			});
			$("#consulting .checkbox input").each(function(){
				if ($(this).is(":checked")) {
					checkedConsulting.push($(this).val());
				}
			});
			$("#other-fields .checkbox input").each(function(){
				if ($(this).is(":checked")) {
					checkedOtherFields.push($(this).val());
				}
			});
			$("#expert-session .checkbox input").each(function(){
				if ($(this).is(":checked")) {
					checkedExpertSession.push($(this).val());
				}
			});
			var specifiedField = $("#specified-field").val();
			var linkedin = $("#linkedin").val();
			var evaluation = $("#evaluation").val();
			var note = $("#note").val();
			var bioNote = $("#bio_note").val();

			//console.log(specifiedField);

			$.post("php/add_mentor_info.php",
			{
				firstname: firstname,
				lastname: lastname,
				company: company,
				title: title,
				email: email,
				phone: phone,
				wechat: wechat,
				education: education,
				location: location,
				checked_sell_side: checkedSellSide,
				checked_buy_side: checkedBuySide,
				checked_big_four: checkedBigFour,
				checked_consulting: checkedConsulting,
				checked_other_fields: checkedOtherFields,
				checked_expert_session: checkedExpertSession,
				specified_field: specifiedField,
				linkedin: linkedin,
				evaluation: evaluation,
				note: note,
				bio_note: bioNote
			},
			function(data, status){
				alert(data);
				if (data == "Information inserted successfully!") {
					$("input#lastname").val('');
					$("input#firstname").val('');
					$("input#company").val('');
					$("input#title").val('');
					$("input#email").val('');
					$("input#phone").val('');
					$("input#wechat").val('');
					$("input#education").val('');
					$("input#location").val('');
					$("input#linkedin").val('');
					$("input#evaluation").val('');
					$("input#note").val('');
					$("input#bio_note").val('');
					$("input#specified-field").val('');
					$("#buy-side .checkbox input").each(function(){
						$(this).prop('checked',false);
					});
					$("#sell-side .checkbox input").each(function(){
						$(this).prop('checked',false);
					});
					$("#big-four .checkbox input").each(function(){
						$(this).prop('checked',false);
					});
					$("#consulting .checkbox input").each(function(){
						$(this).prop('checked',false);
					});
					$("#other-fields .checkbox input").each(function(){
						$(this).prop('checked',false);
					});
					$("#expert-session .checkbox input").each(function(){
						$(this).prop('checked',false);
					});
				}
			});
		});
	});
</script>

<!--delete information-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#result-table").on("click", ".info-delete", function(){
			var mentorId = $(this).attr("id").substring(7);
			//console.log(mentorId+"delete");
			var confirmDelete = confirm("Are you sure to delete this record?");
			if (confirmDelete == true) {
				$.post("php/mentor_info_delete.php",
		        {
		          	mentor_id: mentorId
		        },
		        function(data, status){
		        	if (data == "Record deleted successfully!") {
		        		$("#search-button").trigger("click");
		        	}
		        	alert(data);
		        });
			}
		});
	});
</script>

<!--Edit-Button的点击关联More-Button-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#result-table").on("click", ".info-edit", function(){
			var index = $(".info-edit").index(this);
			if (!$("#result-table .collapse").eq(index).hasClass("in")) {
				$(".more-button").eq(index).trigger("click");
			}
		});
	});
</script>

<!--Edit function button tapped in dropdown list Edit mode-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#result-table").on("click", ".info-edit", function(){
			var mentorId = $(this).attr('id').substring(5);
			var embedId = "embed-"+mentorId;

			var specialtiesArray = $("#info-specialties-"+mentorId).html().split(';  ');
			console.log(specialtiesArray.toString());
			var updatedSpecialties = "";

			/*
						console.log(specialtiesArray.length);
						for (var i = 0; i < specialtiesArray.length; i++) {
							console.log(specialtiesArray[i]+"\n");
						}
			*/

			//****************************change to the edit mode**************************
			$("#edit-button-"+mentorId).replaceWith(function(){
				return "<button id='edit-button-"+mentorId+"' class='edit-button btn btn-success'>Done</button>";
			});
			$("#info-lastname-"+mentorId).replaceWith(function(){
				return "<td id='info-lastname-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-firstname-"+mentorId).replaceWith(function(){
				return "<td id='info-firstname-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-company-"+mentorId).replaceWith(function(){
				return "<td id='info-company-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-title-"+mentorId).replaceWith(function(){
				return "<td id='info-title-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-location-"+mentorId).replaceWith(function(){
				return "<td id='info-location-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-phone-"+mentorId).replaceWith(function(){
				return "<td id='info-phone-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-email-"+mentorId).replaceWith(function(){
				return "<td id='info-email-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-wechat-"+mentorId).replaceWith(function(){
				return "<td id='info-wechat-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-education-"+mentorId).replaceWith(function(){
				return "<td id='info-education-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-linkedin-"+mentorId).replaceWith(function(){
				return "<td colspan='2' id='info-linkedin-"+mentorId+"'><input value='"+$(this).find("a").html()+"'></input></td>";
			});
			$("#info-evaluation-"+mentorId).replaceWith(function(){
				return "<td colspan='2' id='info-evaluation-"+mentorId+"'><input value='"+$(this).find("a").html()+"'></input></td>";
			});

			$("#info-specialties-"+mentorId).replaceWith(function(){
				
				return '<td colspan="4" id="info-specialties-'+mentorId+'">'+
					'<table class="specialties-modify">'+
					'<tr>'+
						'<td colspan = "6">>>Finance Sell Side<<</td>'+
					'</tr>'+
				    '<tr>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Capital Market"> Capital Market</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Commercial Banking"> Commercial Banking</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Corporate Finance"> Corporate Finance</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Equity Research"> Equity Research</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Finance Data"> Finance Data</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Finance IT"> Finance IT</td>'+
				    '</tr>'+
				    '<tr>'+
				    	'<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="IBD"> IBD</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="M&A"> M&A</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Operation"> Operation</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Project Management"> Project Management</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Quant"> Quant</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Risk Management"> Risk Management</td>'+
				    '</tr>'+
				    '<tr>'+
						'<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Sales Trading"> Sales/Trading</td>'+
					    '<td><input class="sell-side-update" style="width:15px;" type="checkbox" value="Wealth Management"> Wealth Management</td>'+
				    '</tr>'+
				    '<tr>'+
				    	'<td colspan = "6">>>Finance Buy Side<<</td>'+
				    '</tr>'+
				    '<tr>'+
					    '<td><input class="buy-side-update" style="width:15px;" type="checkbox" value="Asset Management"> Asset Management</td>'+
					    '<td><input class="buy-side-update" style="width:15px;" type="checkbox" value="Hedge Fund"> Hedge Fund</td>'+
					    '<td><input class="buy-side-update" style="width:15px;" type="checkbox" value="Private Equity"> Private Equity</td>'+
					    '<td><input class="buy-side-update" style="width:15px;" type="checkbox" value="Venture Capital"> Venture Capital</td>'+
					    '<td><input class="buy-side-update" style="width:15px;" type="checkbox" value="Mutual Fund"> Mutual Fund</td>'+
				    '</tr>'+
				    '<tr>'+
				    	'<td colspan = "6">>>Accounting<<</td>'+
				    '</tr>'+
				    '<tr>'+
					    '<td><input class="big-four-update" style="width:15px;" type="checkbox" value="Assurance"> Assurance</td>'+
					    '<td><input class="big-four-update" style="width:15px;" type="checkbox" value="Advisory"> Advisory</td>'+
					    '<td><input class="big-four-update" style="width:15px;" type="checkbox" value="Tax"> Tax</td>'+
				    '</tr>'+
				    '<tr>'+
				    	'<td colspan = "6">>>Consulting<<</td>'+
				    '</tr>'+
				    '<tr>'+
					    '<td><input class="consulting-update" style="width:15px;" type="checkbox" value="Management Consulting"> Management Consulting</td>'+
					    '<td><input class="consulting-update" style="width:15px;" type="checkbox" value="IT Consulting"> IT Consulting</td>'+
					    '<td><input class="consulting-update" style="width:15px;" type="checkbox" value="HR Consulting"> HR Consulting</td>'+
					    '<td><input class="consulting-update" style="width:15px;" type="checkbox" value="Strategy Consulting"> Strategy Consulting</td>'+
				    '</tr>'+
				    '<tr>'+
				    	'<td colspan = "6">>>Other Fields<<</td>'+
				    '</tr>'+
				    '<tr>'+
					    '<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Actuary"> Actuary</td>'+
					    '<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Data"> Data</td>'+
					    '<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="HR"> HR</td>'+
					    '<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Insurance"> Insurance</td>'+
						'<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="IT"> IT</td>'+
						'<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Law"> Law</td>'+
					'</tr>'+
				    '<tr>'+
						'<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Marketing"> Marketing</td>'+
						'<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Real Estate"> Real Estate</td>'+
						'<td><input class="other-fields-update" style="width:15px;" type="checkbox" value="Supply Chain"> Supply Chain</td>'+
					'</tr>'+
					'<tr>'+
				    	'<td colspan = "6">>>Expert Session<<</td>'+
				    '</tr>'+
				    '<tr>'+
					    '<td><input class="expert-session-update" style="width:15px;" type="checkbox" value="Resume Editing"> Resume Editing</td>'+
					    '<td><input class="expert-session-update" style="width:15px;" type="checkbox" value="Networking Skill"> Networking Skill</td>'+
					    '<td><input class="expert-session-update" style="width:15px;" type="checkbox" value="Mock Interview"> Mock Interview</td>'+
					    '<td><input class="expert-session-update" style="width:15px;" type="checkbox" value="Behavioral Question"> Behavioral Question</td>'+
					    '<td><input class="expert-session-update" style="width:15px;" type="checkbox" value="Technical Question"> Technical Question</td>'+
				    '</tr>'+
					'<tr>'+
				    	'<td colspan = "6">>>Specified-Field<<</td>'+
				    '</tr>'+
				    '<tr>'+
				    	'<td id="specified-field-'+mentorId+'" colspan = "6"><input></input></td>'+
				    '</tr>'+
					'</table>'+
				'</td>';
			});

			$("#info-note-"+mentorId).replaceWith(function(){
				return "<td colspan='1' id='info-note-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-bio-note-"+mentorId).replaceWith(function(){
				return "<td colspan='3' class='bio' id='info-bio-note-"+mentorId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			//^^^^^^^^^^^^^^^^^^^^^^^^changed to the edit mode^^^^^^^^^^^^^^^^^^^^^^^^^
			
			for (var i = 0; i < specialtiesArray.length; i++) {
				$("td#info-specialties-"+mentorId+" .specialties-modify input").each(function(){
					if (specialtiesArray[i] === $(this).val()) {
						$(this).prop('checked',true);
					}
				});
				if (specialtiesArray[i].substr(0,17) === "Specified-Field: ") {
					$("#specified-field-"+mentorId+">input").val(specialtiesArray[i].substr(17));
				}
			}
			//**********Done button tapped*******************************
			$("button#edit-button-"+mentorId).on("click", function(){
				var lastname = $("td#info-lastname-"+mentorId+">input").val();
				var firstname = $("td#info-firstname-"+mentorId+">input").val();
				var company = $("td#info-company-"+mentorId+">input").val();
				var title = $("td#info-title-"+mentorId+">input").val();
				var location = $("td#info-location-"+mentorId+">input").val();
				var phone = $("td#info-phone-"+mentorId+">input").val();
				var email = $("td#info-email-"+mentorId+">input").val();
				var wechat = $("td#info-wechat-"+mentorId+">input").val();
				var education = $("td#info-education-"+mentorId+">input").val();
				var linkedin = $("td#info-linkedin-"+mentorId+">input").val();
				var evaluation = $("td#info-evaluation-"+mentorId+">input").val();
				var note = $("td#info-note-"+mentorId+">input").val();
				var bioNote = $("td#info-bio-note-"+mentorId+">input").val();
				var specifiedField = $("td#specified-field-"+mentorId+">input").val();
				var checkedSellSide = [];
				var checkedBuySide = [];
				var checkedBigFour = [];
				var checkedConsulting = [];
				var checkedOtherFields = [];
				var checkedExpertSession = [];
				$("td#info-specialties-"+mentorId+" input").each(function(){
					if ($(this).is(":checked")) {
						if ($(this).attr("class") == "sell-side-update") {
							checkedSellSide.push($(this).val());
						}else if($(this).attr("class") == "buy-side-update"){
							checkedBuySide.push($(this).val());
						}else if($(this).attr("class") == "big-four-update"){
							checkedBigFour.push($(this).val());
						}else if($(this).attr("class") == "consulting-update"){
							checkedConsulting.push($(this).val());
						}else if($(this).attr("class") == "other-fields-update"){
							checkedOtherFields.push($(this).val());
						}else if($(this).attr("class") == "expert-session-update"){
							checkedExpertSession.push($(this).val());
						}
					}
				});

				$.post("php/mentor_info_update.php",
				{
					mentor_id: mentorId,
					firstname: firstname,
					lastname: lastname,
					company: company,
					title: title,
					email: email,
					phone: phone,
					wechat: wechat,
					education: education,
					location: location,
					checked_sell_side: checkedSellSide,
					checked_buy_side: checkedBuySide,
					checked_big_four: checkedBigFour,
					checked_consulting: checkedConsulting,
					checked_other_fields: checkedOtherFields,
					checked_expert_session: checkedExpertSession,
					specified_filed:specifiedField,
					linkedin: linkedin,
					evaluation: evaluation,
					note: note,
					bio_note: bioNote
				},
				function(data, status){
					alert(data);
				});

				$("#edit-button-"+mentorId).replaceWith(function(){
					return "<div id='edit-button-"+mentorId+"' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-"+mentorId+"' href='#'>Edit</a></li><li><a class='info-delete' id='delete-"+mentorId+"' href='#'>Delete</a></li></ul></div>";
				});

				$("td#info-lastname-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-firstname-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-company-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-title-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-location-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-phone-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-email-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-wechat-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-education-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-linkedin-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-evaluation-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-specialties-"+mentorId+">table").replaceWith(function(){
					$("td#info-specialties-"+mentorId+">table>tbody>tr>td>input").each(function(){
						if ($(this).is(":checked")) {
							updatedSpecialties = updatedSpecialties + $(this).attr('value') + ";  ";
						}
					});
					if (specifiedField != "") {
	        			updatedSpecialties = updatedSpecialties + "Specified-Field: " + specifiedField +";  ";
	        		}
					return updatedSpecialties;
				});

				$("td#info-note-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-bio-note-"+mentorId+">input").replaceWith(function(){
					return $(this).val();
				});

			});

		});
	});
</script>

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
	    	$("#menu1").addClass('in active');
	    }else if (tabName === 'mentor-add') {
	    	$("#menu2").addClass('in active')
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
	});
</script>

</body>
</html>






















