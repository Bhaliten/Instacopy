$(function(){
	var reg=$("#reg");

	var n=$("#name");
	var p=$("#pwd");
	var p2=$("#pwd2");
	var i=$("#info");

	p.prop("disabled",true);
	p2.prop("disabled",true);
	reg.prop("disabled",true);


	n.on("keyup",function(){
		name=n.val().length;

		if(name>2&&name<20){
			p.prop("disabled",false);
			n.css("border","2px solid green");


				$.ajax({
					url: "ajax/name.php",
					type: "post",
					data:{
						name: n.val()
					},
					success: function(data){
						i.html(data);
					}
				});

		}else{
			n.css("border","2px solid red");
			p.prop("disabled",true);
			reg.prop("disabled",true);
		}
	});

	n.focusout(function(){

		if(i.text().length>0){
			p.prop("disabled",true);
			n.css("border","2px solid red");
			alert("A név foglalt!");
		}	
		
	});

	p.on("keyup",function(){
		pwd=p.val().length;

		if(pwd>5&&pwd<20){
			if(p.val()!=p2.val()){
				reg.prop("disabled",true);
				p.css("border","2px solid red");
				p2.css("border","2px solid red");
				i.html("A két jelszó nem azonos!");
			}else{
				i.html(null);
				reg.prop("disabled",false);
				p2.css("border","2px solid green");
				p.css("border","2px solid green");
			}
			p2.prop("disabled",false);
		}else{
			p.css("border","2px solid red");
			p2.prop("disabled",true);
			reg.prop("disabled",true);
		}
	});

	p2.on("keyup",function(){

		pwd2=p2.val().length;

		if(pwd2>5&&pwd<20){
			if(p.val()!=p2.val()){
				reg.prop("disabled",true);
				p2.css("border","2px solid red");
				i.html("A két jelszó nem azonos!");
			}else{
				i.html(null);
				reg.prop("disabled",false);
				p2.css("border","2px solid green");
				p.css("border","2px solid green");
			}
		}else{
			p2.css("border","2px solid red");
			reg.prop("disabled",true);
		}
	});
});