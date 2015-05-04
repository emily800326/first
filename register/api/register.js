$(function() {
  $('.address').ajaddress({ city: "台東縣", county: "池上鄉" });


   $("#submit").on("click",function(){
      $.ajax({
	     url: "api/register.php",
		 type: "POST",
		 data:
		 {

		    loginid:$("#loginid").val(),
		    loginpw:$("#loginpw").val(),
		    action:'login_check'

		 },

		 error:function(){
		    alert("error");
		    return;

		 },

		 success:function(data){


		 	console.log(data);
			//console.log(data.length);

		    if(data=="NO"){
		       alert("請確認帳號和密碼");
		                  }

			else if(data=="T"){
			   alert("歡迎登入 老師！");
			   location.href="/first/";
			                   }
			else if(data=="S"){
			   alert("歡迎登入 學生！");
			    location.href="/first/";
			    }

         }


	  })


   })

$("#addone").hide();//新增一筆區塊隱藏

$("#submit_add").click(function(){

   $("#addone").dialog({
            	
                height:500,
                width:400,
                modal:true,	     //開起遮罩
                resizable:false,

                buttons:{
                "確定":function(){

            var emailRegxp = /[\w-]+@([\w-]+\.)+[\w-]+/;
            var numengtest = /[a-zA-Z0-9]/;
            if(numengtest.test($("#user_id").val() ) != true){
		    alert('帳號需改成英文數字格式，請重新輸入！');
		    return ;
            }if(numengtest.test($("#user_pw").val() ) != true){
		    alert('密碼需改成英文數字格式，請重新輸入！');
		    return ;
            }else if($("#user_id").val().length < 4 ||$("#user_id").val().length > 10){
			alert("帳號字數不符，請重新輸入！");
			return;
			}else if($("#user_pw").val().length < 6||$("#user_pw").val().length > 10 ){
			alert("密碼字數不符，請重新輸入！");
			return;
	    	}else if($("#user_pw").val() !==$("#user_pw2").val() ){
			alert("請確認密碼等兩個欄位有輸入正確！");
			return;
		    }else if(emailRegxp.test($("#email").val() ) != true){
		    alert('電子信箱格式錯誤，請重新輸入！');
		    return ;
		    }else if($("#user_id").val() 	== "" ||
			$("#user_pw").val() 		    == "" ||
			$("#user_pw2").val() 		    == "" ||
			$("#name").val() 	            == "" ||
			$("#birthday").val()	        == "" ||
			$("#gender").val()  	        == "" ||
			$("#email").val() 			    == "" ||
			$("#school").val() 	    		== "" ||
			$("#city").val() 	    		== "" ||
			$("#county").val() 	    		== ""  ){
			alert("請確認資料是否確實填寫！");
			return;
            }

            $.ajax({ //ajax傳值
               url:"api/register.php",
               type:"POST",
               data:{
                 
				  identify    : "T",//教師身分
	              user_id:  $("#user_id").val()  ,
				  user_pw:	$("#user_pw").val()  ,
				  name:		$("#name").val() 	 ,
				  birthday:	$("#birthday").val() ,
				  gender:	$("#gender").val()   ,
				  email:	$("#email").val()    ,
				  school:	$("#school").val() 	 ,
				  city:		$("#city").val() 	 ,
				  county:	$("#county").val() 	 ,
                  action:"t_addone"

               },
               error:function(){

                  alert("error add");
                  return;

               },
               success:function(data){
                  // $("#grid").trigger("reloadGrid");

                 console.log(data);  //印出傳送的資料

                  if(data=='add'){
					alert("註冊成功，感謝您的加入!");
					window.location.reload();

                  }else{
                  	alert("帳號重複囉!!! 請重新註冊。");
                  }

                 // console.log($("#students_number").val());
               }
            })
            $(this).dialog("close");
               },
        "取消":function(){$(this).dialog("close");}
                }
   });

});








})