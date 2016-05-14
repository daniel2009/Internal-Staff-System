
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

			var dataPost = {
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
			}
			
			$.post("php/mentor_info_add.php", dataPost, function(data, status){
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