function getState(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/signupvendor.php",
		data:'country_id='+val,
		beforeSend: function() {
			$("#state-list").addClass("loader");
		},
		success: function(data){
			$("#state-list").html(data);
			$('#city-list').find('option[value]').remove();
			$("#state-list").removeClass("loader");
		}
	});
}

function getCity(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/signupvendor.php",
		data:'state_id='+val,
		beforeSend: function() {
			$("#city-list").addClass("loader");
		},
		success: function(data){
			$("#city-list").html(data);
			$("#city-list").removeClass("loader");
		}
	});
}
function getStateforvendorprofile(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/vendoredit.php",
		data:'country_id='+val,
		beforeSend: function() {
			$("#state-list").addClass("loader");
		},
		success: function(data){
			$("#state-list").html(data);
			$('#city-list').find('option[value]').remove();
			$("#state-list").removeClass("loader");
		}
	});
}

function getCityforvendorprofile(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/vendoredit.php",
		data:'state_id='+val,
		beforeSend: function() {
			$("#city-list").addClass("loader");
		},
		success: function(data){
			$("#city-list").html(data);
			$("#city-list").removeClass("loader");
		}
	});
}
function getStateforbranch(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/requestbranch.php",
		data:'country_id='+val,
		beforeSend: function() {
			$("#state-list").addClass("loader");
		},
		success: function(data){
			$("#state-list").html(data);
			$('#city-list').find('option[value]').remove();
			$("#state-list").removeClass("loader");
		}
	});
}

function getCityforbranch(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/requestbranch.php",
		data:'state_id='+val,
		beforeSend: function() {
			$("#city-list").addClass("loader");
		},
		success: function(data){
			$("#city-list").html(data);
			$("#city-list").removeClass("loader");
		}
	});
}
function getsecondlevel(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/addnewproduct.php",
		data:'category_id='+val,
		beforeSend: function() {
			$("#state-list").addClass("loader");
		},
		success: function(data){
			$("#state-list").html(data);
			$('#city-list').find('option[value]').remove();
			$("#state-list").removeClass("loader");
		}
	});
}

function getthirdlevel(val) {
	$.ajax({
		type: "POST",
		url: "../app/model/addnewproduct.php",
		data:'sc_id='+val,
		beforeSend: function() {
			$("#city-list").addClass("loader");
		},
		success: function(data){
			$("#city-list").html(data);
			$("#city-list").removeClass("loader");
		}
	});
}