$(document).ready(function(){
	    $("#search-button").click(function(){

	    	$(".result-table").empty();
	    	$("#result-text").empty();
	    	$("#result-count").empty();
	    	var option = $("#classification option:selected").text();
	    	var startDate;
	    	var endDate;
	    	var key_word;
	    	var filterDate;
	    	//console.log(option);
	    	if (option === "Submission Date") {
	    		startDate = $("#date-from").val();
	    		endDate = $("#date-to").val();
	    	} else if (option === "Expire After"){
	    		filterDate = $("#filterDate").val();
	    	} else {
	    		key_word = $("#key-word").val();
	    	}
	    	
	    	//console.log(key_word);




	        $.post("php/referral_classify_search.php", 
	        {
	          classification: option,
	          key_word: key_word,
	          startDate: startDate,
	          endDate: endDate,
	          filterDate: filterDate
	        },
	        function(data,status){
	        	var header = "<tr><th>ID</th><th>Company</th><th>Position</th><th>Location</th><th>Type</th><th>Detail</th><th>Operation</th></tr>";
	        	$(".result-table").append(header);
	        	//console.log(data)
	        	data = JSON && JSON.parse(data) || $.parseJSON(data);
	        	for (var i = 0; i < data.length; i++) {
	        		var internal_referral_id = "<td>" + data[i][0].internal_referral_id + "</td>";
	        		var company = "<td id='info-company-" + data[i][0].internal_referral_id + "'>" + data[i][0].company + "</td>";
	        		var position = "<td id='info-position-" + data[i][0].internal_referral_id + "'>" + data[i][0].position + "</td>";
	        		var location = "<td id='info-location-" + data[i][0].internal_referral_id + "'>" + data[i][0].location + "</td>";
	        		var create_date = "<td id='info-create_date-" + data[i][0].internal_referral_id + "'>" + data[i][0].create_date + "</td>";
	        		var type = (data[i][0].type === "1") ? "Fulltime" : "Intern";
	        		type = "<td id='info-type-" + data[i][0].internal_referral_id + "'>" + type + "</td>";
	        		

	        		var requirement = "<td class='bio' colspan = '4' id='info-requirement-" + data[i][0].internal_referral_id + "'>" + data[i][0].requirement + "</td>";
	        		var job_description = "<td class='bio' colspan = '4' id='info-job_description-" + data[i][0].internal_referral_id + "'>" + data[i][0].job_description + "</td>";
	        		var link = "<td id='info-link-" + data[i][0].internal_referral_id + "'>" + data[i][0].link + "</td>";
	        		var expire_date = "<td id='info-expire_date-"+data[i][0].internal_referral_id + "'>" + data[i][0].expire_date + "</td>";
	        		var submission_date = "<td id='info-submission_date-" + data[i][0].internal_referral_id + "'>" + data[i][0].submission_date + "</td>";
	        		var moreButton = "<td><button class='more-button btn btn-success' data-toggle='collapse' data-target='#detail-"+data[i][0].internal_referral_id+"'>More</button></td>";
	        		var editButton = "<td><div id='edit-button-" + data[i][0].internal_referral_id + "' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-" + data[i][0].internal_referral_id + "' href='#'>Edit</a></li><li><a class='info-delete' id='delete-" + data[i][0].internal_referral_id + "' href='#'>Delete</a></li></ul></div></td>";
	        		var detail = "<tr><td colspan='8' id='detail-" + data[i][0].internal_referral_id + "' class='collapse'><table id='embed-" + data[i][0].internal_referral_id + "' class='embed'><tr><th>Created Date</th><th>Expired Date</th><th>Submission Date</th></tr><tr>" + create_date + expire_date + submission_date + "</tr><tr><th colspan = '4'>Link</th></tr><tr>" + link + "</tr><tr><th colspan = '4'>Requirement</th></tr><tr>" + requirement + "</tr><tr><th colspan = '4'>Job Description</th></tr><tr>" + job_description + "</tr></table></td></tr>";

	        		$(".result-table").append("<tr>" + internal_referral_id + company + position + location + type + moreButton + editButton + "</tr>" + detail);
	        	}

	        	var lastRow = "<tr><td colspan='8'><h4>This is the last row!</h4></td></tr>"
	        	$(".result-table").append(lastRow);
	        	$("#result-count").append(data.length);
	        	if (data.length > 1) {
	        		var text = " search results";
	        		$("#result-text").append(text);
	        	} else {
	        		var text = " search result";
	        		$("#result-text").append(text);
	        	}
	        });
	    });
	});