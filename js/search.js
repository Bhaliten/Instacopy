$(function(){

	var search=$("#search");

	search.on("keyup",function(){


		if($(this).val().length>0){

		$.ajax({
			url: "ajax/search.php",
			type: "post",
			data:{
				detail: $(this).val()
			},
			success: function(data){
				$("#result").html(data);
				$("#result").css("height","100px");
			}
		});

		}else{
			$("#result").html(null);
			$("#result").css("height","0");
		}
	});
});