
$(document).ready(function(){
	$(".result-table").on("click", ".info-edit", function(){
	//edit button correspond to more button
		var index = $(".info-edit").index(this);
		if (!$(".result-table .collapse").eq(index).hasClass("in")) {
			$(".more-button").eq(index).trigger("click");
		}

		var mentorId = $(this).attr('id').substring(5);
		var embedId = "embed-"+mentorId;

		var specialtiesArray = $("#info-specialties-"+mentorId).html().split(';  ');
		//console.log(specialtiesArray.toString());
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
		
		$("#info-bio-note-"+mentorId).append(function(){
			var content = $(this).html();
			$(this).html('');
			var textArea = $("<textarea rows='6'></textarea>");
			textArea.text(content);
			return textArea;
		});

		$("#info-note-"+mentorId).append(function(){
			var content = $(this).html();
			$(this).html('');
			var textArea = $("<textarea rows='6'></textarea>");
			textArea.text(content);
			return textArea;
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
			var note = $("td#info-note-"+mentorId+">textarea").val();
			var bioNote = $("td#info-bio-note-"+mentorId+">textarea").val();
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

			var dataPost = {
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
			}
			
			$.post("php/mentor_info_update.php", dataPost, function(data, status){
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

			$("td#info-note-"+mentorId+">textarea").replaceWith(function(){
				return $(this).val();
			});

			$("td#info-bio-note-"+mentorId+">textarea").replaceWith(function(){
				return $(this).val();
			});

		});

	});
});