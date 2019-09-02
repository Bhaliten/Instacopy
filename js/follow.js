$(function(){
	//Követés dolgok

    var follow=$(".follow");

    follow.on("click",function(){
        var t=$(this);
        var x=t.val().split("ß");
        
/*Azért használtam ezt a 'contains'-t mert különben az értéke a php miatt nem valami egyértemű*/
        if(t.text().indexOf("Követed") >=0){

            $.ajax({
                url: "ajax/Follow.php",
                type: "post",
                data:{
                    x:"0",
                    follower:x[1],
                    followed:x[0]
                },
                success: function(){
                    t.text("Követés");
                    t.removeClass("btn-success");
                    t.addClass("btn-primary");
                }
            });

           
        }else{

            $.ajax({
                url: "ajax/Follow.php",
                type: "post",
                data:{
                    x:"1",
                    follower:x[1],
                    followed:x[0]
                },
                success: function(){
                    t.text("Követed");
                    t.addClass("btn-success");
                     t.removeClass("btn-primary");
                }
            });

            
        }

    });
});