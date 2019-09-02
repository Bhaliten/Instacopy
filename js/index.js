$(function(){
	$("#upload").prop("disabled",true);
    var desc=$("#description");
    desc.prop("disabled",true);
    var upload=$("#upload");


	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#prev').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function(){
        readURL(this);
        upload.prop("disabled",false);
        desc.prop("disabled",false);
        upload.css("border","2px solid blue");
    });

    
    
    desc.on("keydown",function(){
        var char=desc.val().length;
        $("#number").html("255/"+char);

        if(char>254){
           upload.css("border","2px solid red");
            upload.prop("disabled",true);
        }else{
           
            upload.prop("disabled",false);
             upload.css("border","2px solid blue");
        }
    });


});