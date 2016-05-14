
$(document).ready(function(){
    $("#search-button").click(function(){
    	$("#search-hint").hide();
    	$(".result-table").empty();
    	var option=$("#classification option:selected").text();
    	//console.log(option);
    	var key_word=$("#key-word").val();
    	//console.log(key_word);
        $.post("php/mentor_info_search.php",
        {
          classification: option,
          key_word: key_word
        },
        function(data,status){
        	var header = "<tr><th>Mentor ID</th><th>Last Name</th><th>First Name</th><th>Company</th><th>Title</th><th>Location</th><th>Detail</th><th>Operation</th></tr>";
        	$(".result-table").append(header);
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
        		var note = "<td colspan = '4' id='info-note-"+data[i][0].mentor_id+"'>" + data[i][0].note + "</td>";
        		var bio_note = "<td colspan = '4' class='bio' id='info-bio-note-"+data[i][0].mentor_id+"'>" + data[i][0].bio_note + "</td>";

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
        		var moreButton = "<td><button class='more-button btn btn-primary' data-toggle='collapse' data-target='#detail-"+data[i][0].mentor_id+"'>More</button></td>";
        		var editButton ="<td><div id='edit-button-"+data[i][0].mentor_id+"' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-"+data[i][0].mentor_id+"' href='#'>Edit</a></li><li><a class='info-delete' id='delete-"+data[i][0].mentor_id+"' href='#'>Delete</a></li></ul></div></td>";
        		var detail = "<tr><td colspan='8' id='detail-"+data[i][0].mentor_id+"' class='collapse'><table id='embed-"+data[i][0].mentor_id+"' class='embed'><tr><th>Phone Number</th><th>Email</th><th>Wechat</th><th>Education</th></tr><tr>"+phone+email+wechat+education+"</tr><tr><th colspan = '2'>Linkedin</th><th colspan = '2'>Evaluation</th></tr><tr>"+linkedin+evaluation+"</tr><tr><th colspan = '4'>Specialties</th></tr><tr>"+specialties+"</tr><tr><th colspan = '4'>Bio</th></tr><tr>"+bio_note+"</tr><tr><th colspan = '4'>Note</th></tr><tr>"+note+"</tr></table></td></tr>";

        		$(".result-table").append("<tr>" + mentor_id + lastname + firstname + company + title + location + moreButton + editButton + "</tr>" + detail);
        	}

        	var lastRow = "<tr><td colspan='8'><h4>This is the last row!</h4></td></tr>"
        	$(".result-table").append(lastRow);
        });
    });
});