$(function(){
	var log=$("#log");

	var n=$("#name");
	var p=$("#pwd");
	p.prop("disabled",true);
	log.prop("disabled",true);

	n.on("keyup",function(){
		name=n.val().length;

		if(name>2&&name<20){
			p.prop("disabled",false);
			n.css("border","2px solid green");
		}else{
			n.css("border","2px solid red");
			p.prop("disabled",true);
			log.prop("disabled",true);
		}
	});

	p.on("keyup",function(){
		pwd=p.val().length;

		if(pwd>5&&pwd<20){
			log.prop("disabled",false);
			p.css("border","2px solid green");
		}else{
			p.css("border","2px solid red");
			log.prop("disabled",true);
		}
	});
});