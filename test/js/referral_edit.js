$(document).ready(function(){
		$(".result-table").on("click", ".info-edit", function(){
			var internalReferralId = $(this).attr('id').substring(5);
			var embedId = "embed-" + internalReferralId;

			

			//****************************change to the edit mode**************************
			$("#edit-button-" + internalReferralId).replaceWith(function(){
				return "<button id='edit-button-" + internalReferralId + "' class='edit-button btn btn-success'>Done</button>";
			});
			$("#info-company-" + internalReferralId).replaceWith(function(){
				return "<td id='info-company-" + internalReferralId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-position-" + internalReferralId).replaceWith(function(){
				return "<td id='info-position-" + internalReferralId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-location-" + internalReferralId).replaceWith(function(){
				return "<td id='info-location-"+internalReferralId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-type-" + internalReferralId).replaceWith(function(){ 
				//return "<td id='info-type-" + internalReferralId+"'><input type='radio' class='referral_form' value='1'> Fulltime</input><input type='radio' class='referral_form' value='0'> Intern</input></td>";
				//return "<td id='info-type-" + internalReferralId+"'><input value='"+$(this).html() +"' type='radio'></input></td>";
				
				return "<td id='info-type-" + internalReferralId+"'><input type='radio' name='job-type' value='1'> Fulltime</input><input type='radio' name='job-type' value='0'> Intern</input></td>";
			});
			$("#info-create_date-" + internalReferralId).replaceWith(function(){
				return "<td id='info-create_date-" + internalReferralId+"'><input value='"+$(this).html()+"' type='date'></input></td>";
			});
			$("#info-expire_date-" + internalReferralId).replaceWith(function(){
				return "<td id='info-expire_date-" + internalReferralId+"'><input value='"+$(this).html()+"' type='date'></input></td>";
			});
			$("#info-submission_date-" + internalReferralId).replaceWith(function(){
				return "<td id='info-submission_date-" + internalReferralId+"'><input value='"+$(this).html()+"' type='date'></input></td>";
			});
			$("#info-link-" + internalReferralId).replaceWith(function(){
				return "<td id='info-link-" + internalReferralId+"'><input value='"+$(this).html()+"'></input></td>";
			});
			$("#info-requirement-" + internalReferralId).replaceWith(function(){
				return "<td class='bio' colspan='4' id='info-requirement-"+internalReferralId+"'><textarea value='"+$(this).html()+"'></textarea></td>";
			});
			
			$("#info-job_description-" + internalReferralId).replaceWith(function(){
				return "<td class='bio' colspan='4' id='info-job_description-"+internalReferralId+"'><textarea value='"+$(this).html()+"'></textarea></td>";
			});
			
			//**********Done button tapped*******************************
			$("button#edit-button-" + internalReferralId).on("click", function(){
				var company = $("td#info-company-"+internalReferralId+">input").val();
				var position = $("td#info-position-"+internalReferralId+">input").val();
				var location = $("td#info-location-"+internalReferralId+">input").val();
				var type = $("td#info-type-"+internalReferralId+">input[name='job-type']:checked").val();

				var create_date = $("td#info-create_date-"+internalReferralId+">input").val();
				var expire_date = $("td#info-expire_date-"+internalReferralId+">input").val();
				var submission_date = $("td#info-submission_date-"+internalReferralId+">input").val();
				var link = $("td#info-link-"+internalReferralId+">input").val();
				var requirement = $("td#info-requirement-"+internalReferralId+">textarea").val();
				var job_description = $("td#info-job_description-"+internalReferralId+">textarea").val();
			
				$.post("php/referral_info_update.php",
				{
					internal_referral_id: internalReferralId,
					company: company,
					position: position,
					location: location,
					type: type,
					create_date: create_date,
					expire_date: expire_date,
					submission_date: submission_date,
					link: link,
					requirement: requirement,
					job_description: job_description
				},
				function(data, status){
					alert(data);
				});

				$("#edit-button-"+internalReferralId).replaceWith(function(){
					return "<div id='edit-button-"+internalReferralId+"' class='dropdown'><button class='edit-button btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Edit<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='info-edit' id='edit-"+internalReferralId+"' href='#'>Edit</a></li><li><a class='info-delete' id='delete-"+internalReferralId+"' href='#'>Delete</a></li></ul></div>";
				});

				$("td#info-company-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-position-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-location-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-type-"+internalReferralId).replaceWith(function(){
					if ($(this).find("input[name='job-type']:checked").val() === "1") {
						return '<td id="info-type-' + internalReferralId + '">Fulltime<//td>';
					} else {
						return '<td id="info-type-' + internalReferralId + '">Intern<//td>';
					}
					//return '<td id="info-type-' + internalReferralId + '">' + $(this).find("input[name='job-type']:checked").val() + '<//td>';
				});

				$("td#info-create_date-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-expire_date-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-submission_date-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-link-"+internalReferralId+">input").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-requirement-"+internalReferralId+">textarea").replaceWith(function(){
					return $(this).val();
				});

				$("td#info-job_description-"+internalReferralId+">textarea").replaceWith(function(){
					return $(this).val();
				});

			});

		});
	});