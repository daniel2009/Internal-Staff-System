
$(document).ready(function(){
//Edit button tapped, Enable Edit Mode---------------------------------------------------------------------
	$(".result-section").on("click", ".operation-button", function(){
		var contentType = $(this).attr('id').substring(0,2);

		if (contentType === "bi") {
			$(this).replaceWith(function(){
				return "<button type='button' class='btn btn-primary delete-button' id='"+contentType+"-delete'>Delete</button>"+
						"<button type='button' class='btn btn-primary done-button' id='"+contentType+"-done'>Done</button>";
			});
			$(".basic-info-section .result-table td").append(function(){
				var content = $(this).html();
				if (!$(this).hasClass("non-text-input")) {
					$(this).html('');
					return "<input value='"+content+"'></input>";
				}else if ($(this).hasClass("bi-degree")) {
					$(this).html('');
					return 	"<select>"+
								"<option value='default'>"+content+"</option>"+
								"<option disabled></option>"+
								"<option>Bachelor</option>"+
								"<option>Bachelor of Art</option>"+
								"<option>Bachelor of Business Administration</option>"+
								"<option>Bachelor of Science</option>"+
								"<option disabled></option>"+
								"<option>Master</option>"+
								"<option>Master of Arts</option>"+
								"<option>Master of Business Administration</option>"+
								"<option>Master of Business Logistics Engineering</option>"+
								"<option>Master of Economics</option>"+
								"<option>Master of Management</option>"+
								"<option>Master of Public Administrations</option>"+
								"<option>Master of Science</option>"+
								"<option>Master of Engineering</option>"+
								"<option disabled></option>"+
								"<option>Ph.D</option>"+
								"<option disabled></option>"+
							"</select>";
				}
			});
			$(".basic-info-section .result-table td>input[type='radio']").prop("disabled", false);

		}else if(contentType === "pt"){
			$(this).replaceWith(function(){
				return "<button type='button' class='btn btn-primary delete-button' id='"+contentType+"-delete'>Delete</button>"+
						"<button type='button' class='btn btn-primary done-button' id='"+contentType+"-done'>Done</button>";
			});
			$(".pre-talk-section .result-table td").append(function(){
				var content = $(this).html();
				if ($(this).hasClass("ui-widget mentor")) {
					$(this).html('');
					return "<input class='mentor-autocomplete' value='"+content+"'></input>";
				}else if(!$(this).hasClass("non-text-input") && !$(this).hasClass("ui-widget mentor")){
					$(this).html('');
					return "<input value='"+content+"'></input>";
				}else if ($(this).hasClass("pt-close-note") || $(this).hasClass("pt-three-days")) {
					$(this).html('');
					var textArea = $("<textarea row='6'></textarea>");
					textArea.text(content);
					return textArea;
				}else if($(this).hasClass("pt-recommend")) {
					$(this).html('');
					return 	"<select>"+
			      				"<option value='default'>"+content+"</option>"+
			      				"<option disabled></option>"+
								"<option>UniMembership</option>"+
								"<option>UniAcademy</option>"+
								"<option>Profile Builder</option>"+
								"<option>Personal Mentor</option>"+
								"<option>Mock Interview</option>"+
								"<option>VIP Service</option>"+
								"<option>Refer Me</option>"+
								"<option>Event</option>"+
							"</select>";
				}
			});
			$(".pre-talk-section .result-table td>input[type='radio']").prop("disabled", false);

		}else{
			var serviceRecordId = $(this).attr('id').substring(8);
			$(this).replaceWith(function(){
				return "<button type='button' class='btn btn-primary delete-button' id='"+contentType+"-delete-"+serviceRecordId+"'>Delete</button>"+
					"<button type='button' class='btn btn-primary done-button' id='"+contentType+"-done-"+serviceRecordId+"'>Done</button>";
			});

			$("#"+contentType+"-section-"+serviceRecordId+" .result-table td").append(function(){
				var content = $(this).html();
				if ($(this).hasClass("ui-widget mentor")) {
					$(this).html('');
					return "<input class='mentor-autocomplete' value='"+content+"'></input>";
				}else if($(this).hasClass("ui-widget event")){
					$(this).html('');
					return "<input class='event-autocomplete' value='"+content+"'></input>";
				}else if($(this).hasClass("ui-widget internal-referral")){
					$(this).html('');
					return "<input class='internal-referral-autocomplete' value='"+content+"'></input>";
				}else if(!$(this).hasClass("non-text-input") && !$(this).hasClass("ui-widget")){
					$(this).html('');
					return "<input value='"+content+"'></input>";
				}else if($(this).hasClass("note")){
					$(this).html('');
					var textArea = $("<textarea row='6'></textarea>");
					textArea.text(content);
					return textArea;
				}else if ($(this).hasClass("vs-mpf-1") || $(this).hasClass("vs-mpf-2")) {
					$(this).html('');
					return 	"<select>"+
			      				"<option value='default'>"+content+"</option>"+
								"<option disabled>>>Finance Sell Side<<</option>"+
								"<option>Capital Market</option>"+
								"<option>Commercial Banking</option>"+
								"<option>Corporation Finance</option>"+
								"<option>Equity Research</option>"+
								"<option>Finance Data</option>"+
								"<option>Finance IT</option>"+
								"<option>IBD</option>"+
								"<option>M&A</option>"+
								"<option>Operation</option>"+
								"<option>Project Management</option>"+
								"<option>Quant</option>"+
								"<option>Risk Management</option>"+
								"<option>Sales/Trading</option>"+
								"<option>Wealth Management</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Finance Buy Side<<</option>"+
								"<option>Asset Management</option>"+
								"<option>Hedge Fund</option>"+
								"<option>Mutual Fund</option>"+
								"<option>Private Equity</option>"+
								"<option>Venture Capital</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Big Four<<</option>"+
								"<option>Assurance</option>"+
								"<option>Advisory</option>"+
								"<option>Tax</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Consulting<<</option>"+
								"<option>Management Consulting</option>"+
								"<option>IT Consulting</option>"+
								"<option>HR Consulting</option>"+
								"<option>Strategy Consulting</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Other Fields<<</option>"+
								"<option>Actuary</option>"+
								"<option>Data</option>"+
								"<option>HR</option>"+
								"<option>Insurance</option>"+
								"<option>IT</option>"+
								"<option>Law</option>"+
								"<option>Marketing</option>"+
								"<option>Real Estate</option>"+
								"<option>Supply Chain</option>"+
							"</select>";
				}else if ($(this).hasClass("rm-field")) {
					$(this).html('');
					return 	"<select>"+
			      				"<option value='default'>"+content+"</option>"+
								"<option disabled>>>Finance Sell Side<<</option>"+
								"<option>Capital Market</option>"+
								"<option>Commercial Banking</option>"+
								"<option>Corporation Finance</option>"+
								"<option>Equity Research</option>"+
								"<option>Finance Data</option>"+
								"<option>Finance IT</option>"+
								"<option>IBD</option>"+
								"<option>M&A</option>"+
								"<option>Operation</option>"+
								"<option>Project Management</option>"+
								"<option>Quant</option>"+
								"<option>Risk Management</option>"+
								"<option>Sales/Trading</option>"+
								"<option>Wealth Management</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Finance Buy Side<<</option>"+
								"<option>Asset Management</option>"+
								"<option>Hedge Fund</option>"+
								"<option>Mutual Fund</option>"+
								"<option>Private Equity</option>"+
								"<option>Venture Capital</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Big Four<<</option>"+
								"<option>Assurance</option>"+
								"<option>Advisory</option>"+
								"<option>Tax</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Consulting<<</option>"+
								"<option>Management Consulting</option>"+
								"<option>IT Consulting</option>"+
								"<option>HR Consulting</option>"+
								"<option>Strategy Consulting</option>"+
								"<option disabled></option>"+
								"<option disabled>>>Other Fields<<</option>"+
								"<option>Actuary</option>"+
								"<option>Data</option>"+
								"<option>HR</option>"+
								"<option>Insurance</option>"+
								"<option>IT</option>"+
								"<option>Law</option>"+
								"<option>Marketing</option>"+
								"<option>Real Estate</option>"+
								"<option>Supply Chain</option>"+
							"</select>";
				}
			});

			$("#"+contentType+"-section-"+serviceRecordId+" .result-table td>input[type='radio']").prop("disabled", false);
		}

	});

//Done Button Tapped, send the updated data to backend, end the edit mode-----------------------------------
	$(".result-section").on("click", ".done-button", function(){
		var contentType = $(this).attr('id').substring(0,2);
		var menteeId 	= $(".mentee-id").html();
		var dataPost 	= {
			menteeId:menteeId,
			contentType:contentType
		}

		if (contentType === "bi") {
			dataPost.firstName 			= $(".bi-firstname>input").val();
			dataPost.lastName 			= $(".bi-lastname>input").val();
			dataPost.otherName 			= $(".bi-othername>input").val();
			dataPost.location 			= $(".bi-location>input").val();
			dataPost.firstConcen 		= $(".bi-first-concen>input").val();
			dataPost.secondConcen 		= $(".bi-second-concen>input").val();
			dataPost.isUniMember 		= $("input[name='is-unimember']:checked").val();
			dataPost.school 			= $(".bi-school>input").val();
			dataPost.degree 			= $(".bi-degree>select").children(":selected").html();
			dataPost.gradDate 			= $(".bi-graduation-date>input").val();
			dataPost.phone 				= $(".bi-phone>input").val();
			dataPost.wechat 			= $(".bi-wechat>input").val();
			dataPost.email 				= $(".bi-email>input").val();

		}else if (contentType === "pt") {
			var idIndex = $(".pt-mentor>input").val().indexOf(":");
			dataPost.ptMentorId 		= $(".pt-mentor>input").val().substring(0, idIndex);
			dataPost.ptSource 			= $(".pt-source>input").val();
			dataPost.ptDate 			= $(".pt-date>input").val();
			dataPost.ptTime 			= $(".pt-time>input").val();
			dataPost.ptCloseStatus 		= $("input[name='pt-close-status']:checked").val();
			dataPost.ptCloseNote 		= $(".pt-close-note>textarea").val();
			dataPost.ptThreeDays 		= $(".pt-three-days>textarea").val();
			dataPost.ptRecommend 		= $(".pt-recommend>select").children(":selected").html();
			dataPost.ptFinalClose 		= $("input[name='pt-final-close']:checked").val();

		}else{
			var serviceRecordId = $(this).attr('id').substring(8);
			dataPost.serviceRecordId = serviceRecordId;
			sectionId = "#"+contentType+"-section-"+dataPost.serviceRecordId+" ";

			if (contentType === "pb") {
				var idIndex = $(sectionId+".pb-mentor>input").val().indexOf(":");
				dataPost.pbMentorId 		= $(sectionId+".pb-mentor>input").val().substring(0, idIndex);
				dataPost.payDate 			= $(sectionId+".pb-pay-date>input").val();
				dataPost.payAmount 			= $(sectionId+".pb-pay-amount>input").val();
				dataPost.pbStartDate 		= $(sectionId+".pb-start-date>input").val();
				dataPost.pbFirstRevDate 	= $(sectionId+".pb-first-rev-date>input").val();
				dataPost.pbSecondRevDate 	= $(sectionId+".pb-second-rev-date>input").val();
				dataPost.pbThirdRevDate 	= $(sectionId+".pb-third-rev-date>input").val();
				dataPost.pbOffer 			= $(sectionId+".pb-offer>input[type='radio']:checked").val();
				dataPost.pbNote 			= $(sectionId+".pb-note>textarea").val();

			}else if (contentType === "mi") {
				var idIndex = $(sectionId+".mi-mentor>input").val().indexOf(":");
				dataPost.miMentorId 		= $(sectionId+".mi-mentor>input").val().substring(0, idIndex);
				dataPost.payDate 			= $(sectionId+".mi-pay-date>input").val();
				dataPost.payAmount 	 		= $(sectionId+".mi-pay-amount>input").val();
				dataPost.miIvCom 			= $(sectionId+".mi-iv-com>input").val();
				dataPost.miIvPos 			= $(sectionId+".mi-iv-pos>input").val();
				dataPost.miIvDate 			= $(sectionId+".mi-iv-date>input").val();
				dataPost.miMockDate 		= $(sectionId+".mi-mock-date>input").val();
				dataPost.miResult 			= $(sectionId+".mi-result>input[type='radio']:checked").val();

			}else if (contentType === "vs") {
				dataPost.payDate 				= $(sectionId+".vs-pay-date>input").val();
				dataPost.payAmount 				= $(sectionId+".vs-pay-amount>input").val();
				dataPost.vsSessionQuantity 		= $(sectionId+".vs-ses-quant>input").val();
				dataPost.vsJobLoc1 				= $(sectionId+".vs-job-loc-1>input").val();
				dataPost.vsJobLoc2 				= $(sectionId+".vs-job-loc-2>input").val();
				dataPost.vsMpfTrack1 			= $(sectionId+".vs-mpf-1>select").children(":selected").html();
				dataPost.vsMpfTrack2 			= $(sectionId+".vs-mpf-2>select").children(":selected").html();
				dataPost.vsMpfBuiltDate 		= $(sectionId+".vs-mpf-date>input").val();
				dataPost.vsMentorListSentDate	= $(sectionId+".vs-mentorlist-date>input").val();
				dataPost.vsLeadMentorPickedDate = $(sectionId+".vs-lead-pick-date>input").val();
				var lmIdIndex = $(sectionId+".vs-lead-mentor>input").val().indexOf(":");
				dataPost.vsLeadMentorId 		= $(sectionId+".vs-lead-mentor>input").val().substring(0, lmIdIndex);
				dataPost.vsMentorChangeDate 	= $(sectionId+".vs-mentor-change-date>input").val();
				var cmIdIndex = $(sectionId+".vs-mentor-changed-to>input").val().indexOf(":");
				dataPost.vsMentorChangedToId 	= $(sectionId+".vs-mentor-changed-to>input").val().substring(0, cmIdIndex);
				var fmIdIndex = $(sectionId+".vs-first-mentor>input").val().indexOf(":");
				dataPost.vsFirstMentorId 		= $(sectionId+".vs-first-mentor>input").val().substring(0, fmIdIndex);
				var smIdIndex = $(sectionId+".vs-second-mentor>input").val().indexOf(":");
				dataPost.vsSecondMentorId 		= $(sectionId+".vs-second-mentor>input").val().substring(0, smIdIndex);
				var tmIdIndex = $(sectionId+".vs-third-mentor>input").val().indexOf(":");
				dataPost.vsThirdMentorId 		= $(sectionId+".vs-third-mentor>input").val().substring(0, tmIdIndex);
				var afIdIndex = $(sectionId+".vs-assist-mentor-1>input").val().indexOf(":");
				dataPost.vsAssistMentor1 		= $(sectionId+".vs-assist-mentor-1>input").val().substring(0, afIdIndex);
				var asIdIndex = $(sectionId+".vs-assist-mentor-2>input").val().indexOf(":");
				dataPost.vsAssistMentor2 		= $(sectionId+".vs-assist-mentor-2>input").val().substring(0, asIdIndex);
				var atIdIndex = $(sectionId+".vs-assist-mentor-3>input").val().indexOf(":");
				dataPost.vsAssistMentor3 		= $(sectionId+".vs-assist-mentor-3>input").val().substring(0, atIdIndex);
				var evIdIndex = $(sectionId+".vs-free-boot-camp>input").val().indexOf(":");
				dataPost.vsFreeBootCampId 		= $(sectionId+".vs-free-boot-camp>input").val().substring(0, evIdIndex);
				dataPost.vsComplete 			= $(sectionId+".vs-complete>input[type='radio']:checked").val();

			}else if (contentType === "rm") {
				dataPost.payDate 				= $(sectionId+".rm-pay-date>input").val();
				dataPost.payAmount 				= $(sectionId+".rm-pay-amount>input").val();
				dataPost.rmJobType 				= $(sectionId+".rm-job-type>input[type='radio']:checked").val();
				dataPost.rmField 				= $(sectionId+".rm-field>select").children(":selected").html();
				dataPost.rmPosition 			= $(sectionId+".rm-pos>input").val();
				var lmIdIndex = $(sectionId+".rm-lead-mentor>input").val().indexOf(":");
				dataPost.rmLeadMentorId 		= $(sectionId+".rm-lead-mentor>input").val().substring(0, lmIdIndex);
				var mmIdIndex = $(sectionId+".rm-mock-mentor>input").val().indexOf(":");
				dataPost.rmMockMentorId 		= $(sectionId+".rm-mock-mentor>input").val().substring(0, mmIdIndex);
				dataPost.rmFirstIvDate  		= $(sectionId+".rm-first-iv-date>input").val();
				dataPost.rmFirstIvCom 			= $(sectionId+".rm-first-iv-com>input").val();
				dataPost.rmFirstIvPosition 		= $(sectionId+".rm-first-iv-pos>input").val();
				dataPost.rmFirstIvResult 		= $(sectionId+".rm-first-iv-res>input[type='radio']:checked").val();
				dataPost.rmFirstIvNote 			= $(sectionId+".rm-first-iv-note>textarea").val();
				dataPost.rmSecIvDate  			= $(sectionId+".rm-sec-iv-date>input").val();
				dataPost.rmSecIvCom 			= $(sectionId+".rm-sec-iv-com>input").val();
				dataPost.rmSecIvPosition 		= $(sectionId+".rm-sec-iv-pos>input").val();
				dataPost.rmSecIvResult 			= $(sectionId+".rm-sec-iv-res>input[type='radio']:checked").val();
				dataPost.rmSecIvNote 			= $(sectionId+".rm-sec-iv-note>textarea").val();

			}else if (contentType === "ev") {
				dataPost.payDate 				= $(sectionId+".ev-pay-date>input").val();
				dataPost.payAmount 				= $(sectionId+".ev-pay-amount>input").val();
				var idIndex = $(sectionId+".ev-event>input").val().indexOf(":");
				dataPost.eventId 				= $(sectionId+".ev-event>input").val().substring(0, idIndex);

			}else if (contentType === "um") {
				dataPost.payDate 				= $(sectionId+".um-pay-date>input").val();
				dataPost.payAmount 				= $(sectionId+".um-pay-amount>input").val();

			}else if (contentType === "ua") {
				dataPost.payDate 				= $(sectionId+".ua-pay-date>input").val();
				dataPost.payAmount 				= $(sectionId+".ua-pay-amount>input").val();

			}else if (contentType === "pm") {
				dataPost.payDate 				= $(sectionId+".pm-pay-date>input").val();
				dataPost.payAmount 				= $(sectionId+".pm-pay-amount>input").val();

			}else if (contentType === "ir") {
				console.log(sectionId);
				var idIndex = $(sectionId+".internal-referral>input").val().indexOf(":");
				dataPost.irId 					= $(sectionId+".internal-referral>input").val().substring(0, idIndex);
				dataPost.irRecordId 			= $(sectionId+".ir-record-id").html();
				dataPost.irReferDate 			= $(sectionId+".ir-refer-date>input").val();
				dataPost.irCurStatus 			= $(sectionId+".ir-cur-status>input[type='radio']:checked").val();
				dataPost.irivDate 				= $(sectionId+".ir-iv-date>input").val();
				dataPost.irhrDate 				= $(sectionId+".ir-hr-date>input").val();

			}else if (contentType === "of") {
				dataPost.ofId 					= $(sectionId+".of-id").html();
				dataPost.ofDate 				= $(sectionId+".of-date>input").val();
				dataPost.ofType 				= $(sectionId+".of-type>input[type='radio']:checked").val();
				dataPost.ofLoc 					= $(sectionId+".of-loc>input").val();
				dataPost.ofCom 					= $(sectionId+".of-com>input").val();
				dataPost.ofPos 					= $(sectionId+".of-pos>input").val();

			}else if (contentType === "st") {
				var idIndex = $(sectionId+".st-mentor>input").val().indexOf(":");
				dataPost.stMentorId 			= $(sectionId+".st-mentor>input").val().substring(0, idIndex);
				dataPost.stRecordId 			= $(sectionId+".st-id").html();
				dataPost.stSesNum 				= $(sectionId+".st-ses-num>input").val();
				dataPost.stDate 				= $(sectionId+".st-date>input").val();
				dataPost.stTopic 				= $(sectionId+".st-topic>textarea").val();
				dataPost.stAssignment 			= $(sectionId+".st-assignment>textarea").val();
				dataPost.stNote 				= $(sectionId+".st-note>textarea").val();

			}else if (contentType === "uc") {
				dataPost.ucRecordId 			= $(sectionId+".uc-id").html();
				dataPost.ucIssueDate 			= $(sectionId+".uc-issue-date>input").val();
				dataPost.ucAmount 				= $(sectionId+".uc-amount>input").val();
				dataPost.ucUseDate 				= $(sectionId+".uc-use-date>input").val();
				dataPost.ucReason  				= $(sectionId+".uc-reason>textarea").val();
				dataPost.ucNote 				= $(sectionId+".uc-note>textarea").val();
			}
		}


		$.post("php/mentee_info_update.php", dataPost, function(data, status){
			alert(data);
			if(data === "Update Successfully!"){
				if (contentType === "bi") {
					$("#bi-delete").remove();

					$("#bi-done").replaceWith(function(){
						return "<button type='button' class='btn btn-primary operation-button' id='bi-edit'>Edit Info</button>";
					});

					$(".basic-info-section .result-table td").append(function(){
						if (!$(this).hasClass("non-text-input")) {
							var updatedValue = $(this).children().val();
							$(this).children().remove();
							return updatedValue;
						}else if ($(this).hasClass("bi-degree")) {
							var updatedValue = $(this).find("select").children(":selected").html();
							$(this).children().remove();
							return 	updatedValue;
						}
					});

					$(".basic-info-section .result-table td>input[type='radio']").prop("disabled", true);

				}else if(contentType === "pt"){
					$("#pt-delete").remove();

					$("#pt-done").replaceWith(function(){
						return "<button type='button' class='btn btn-primary operation-button' id='pt-edit'>Edit Info</button>";
					});

					$(".pre-talk-section .result-table td").append(function(){
						if (!$(this).hasClass("non-text-input")) {
							var updatedValue = $(this).children().val();
							$(this).children().remove();
							return updatedValue;
						}else if ($(this).hasClass("pt-close-note") || $(this).hasClass("pt-three-days")) {
							var updatedValue = $(this).children().val();
							$(this).children().remove();
							return updatedValue;
						}else if($(this).hasClass("pt-recommend")) {
							var updatedValue = $(this).find("select").children(":selected").html();
							$(this).children().remove();
							return 	updatedValue;
						}
					});
					$(".pre-talk-section .result-table td>input[type='radio']").prop("disabled", true);

				}else{
					$("#"+contentType+"-delete-"+serviceRecordId).remove();

					$("#"+contentType+"-done-"+serviceRecordId).replaceWith(function(){
						return "<button type='button' class='btn btn-primary operation-button' id='"+contentType+"-edit-"+serviceRecordId+"'>Edit Info</button>";
					});

					$("#"+contentType+"-section-"+serviceRecordId+" .result-table td").append(function(){
						if (!$(this).hasClass("non-text-input") || $(this).hasClass("note")) {
							var updatedValue = $(this).children().val();
							$(this).children().remove();
							return updatedValue;
						}else if ($(this).hasClass("vs-mpf-1") || $(this).hasClass("vs-mpf-2") || $(this).hasClass("rm-field")) {
							var updatedValue = $(this).find("select").children(":selected").html();
							$(this).children().remove();
							return 	updatedValue;
						}
					});

					$("#"+contentType+"-section-"+serviceRecordId+" .result-table td>input[type='radio']").prop("disabled", true);
				}
			}
		});
	});
});