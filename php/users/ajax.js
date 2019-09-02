$(function(){
	

	$.ajax({
		url: "All.php",
		type: "post",
		data:{
			name: $("#full").text()
		},
		success: function(data){
			$("#full").html(data)
		}
	});
});