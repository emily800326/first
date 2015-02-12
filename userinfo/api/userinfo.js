
$(function() {
    $('.address').ajaddress({ city: "台東縣", county: "池上鄉" });
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );


   	$( "#show_t_info" ).dialog({
          autoOpen: false,
          //height:500,
          width:400,
          modal:true,
          buttons: {
          "確認": function() {
             var emailRegxp = /[\w-]+@([\w-]+\.)+[\w-]+/;
            if(emailRegxp.test($("#t_email").val() ) != true){
		    alert('電子信箱格式錯誤，請重新輸入！');
		    return ;
		    }else if(
			$("#t_name").val() 	            == "" ||
			$("#t_birthday").val()	        == "" ||
			$("#t_gender").val()  	        == "" ||
			$("#t_email").val() 		    == "" ||
			$("#t_school").val() 	    	== "" ||
			$("#t_city").val() 	    		== "" ||
			$("#t_county").val() 	    	== ""  )
			{
			alert("請確認資料是否確實填寫！");
			return;
		    }else{
		    	$.ajax({
				url      : "../C/data.php",
				type     : "POST",
				dataType : "json",
				data : {
						type        : "t_info",
						name        :$("#t_name").val(),
					  	birthday    :$("#t_birthday").val(),
					  	gender      :$("#t_gender").val(),
					  	email       :$("#t_email").val(),
					  	school      :$("#t_school").val(),
					  	city        :$("#t_city").val(),
					  	county      :$("#t_county").val(),
						action		:"changeinfo"
		               },
					    error : function(e, status){
					    	    alert(e.responseText);
								alert("警告：\n\n儲存失敗！");
								return;
							                       },
						success:function(data){
							    //console.log(data);
			 					//alert("系統通知：\n\n修改成功！");
			 					window.location.reload();
								return;
		                                      },
                        })

             			$(this).dialog("close");
             }

                  } ,

            "取消": function() {
                    $(this).dialog("close");
                                } ,
               },

       });

   $( "#show_s_info" ).dialog({
          autoOpen: false,
          //height:500,
          width:400,
          modal:true,
          buttons: {
          "確認": function() {
             var emailRegxp = /[\w-]+@([\w-]+\.)+[\w-]+/;
            if(emailRegxp.test($("#s_email").val() ) != true){
		    alert('電子信箱格式錯誤，請重新輸入！');
		    return ;
		    }else if(
			$("#s_name").val() 	            == "" ||
			$("#s_birthday").val()	        == "" ||
			$("#s_gender").val()  	        == "" ||
			$("#s_email").val() 		    == "" ||
			$("#s_school").val() 	    	== "" ||
			$("#s_city").val() 	    		== "" ||
			$("#s_county").val() 	    	== "" ||
			$("#s_stu_id").val() 	    	== "" ||
			$("#s_class").val() 	    	== "" ||
			$("#s_grade").val() 	    	== ""  )
			{
			alert("請確認資料是否確實填寫！");
			return;
		    }else{
		    	$.ajax({
				url      : "../C/data.php",
				type     : "POST",
				dataType : "json",
				data : {
						type        : "s_info",
						name        :$("#s_name").val(),
					  	birthday    :$("#s_birthday").val(),
					  	gender      :$("#s_gender").val(),
					  	email       :$("#s_email").val(),
					  	school      :$("#s_school").val(),
					  	city        :$("#s_city").val(),
					  	county      :$("#s_county").val(),
					  	stu_id      :$("#s_stu_id").val(),
					  	nclass      :$("#s_class").val(),
					  	grade       :$("#s_grade").val(),
					  	
						action		:"changeinfo"
		               },
					    error : function(e, status){
					    	    alert(e.responseText);
								alert("警告：\n\n儲存失敗！");
								return;
							                       },
						success:function(data){
							    //console.log(data);
			 					//alert("系統通知：\n\n修改成功！");
			 					window.location.reload();
								return;
		                                      },
                        })

             			$(this).dialog("close");
             }

                  } ,

            "取消": function() {
                    $(this).dialog("close");
                                } ,
               },

       });

   	$( "#showpw" ).dialog({
          autoOpen: false,
         // height:500,
          width:400,
          modal:true,
          buttons: {
          "確認": function() {
             var check_pw = $("#checkpw").val();
              var numengtest = /[a-zA-Z0-9]/;

           if($("#c_newpw").val() != $("#c_newpw2").val()){
			    alert("請確認新密碼!");
			}if(numengtest.test($("#c_newpw").val() ) != true){
		    alert('密碼需改成英文數字格式，請重新輸入！');
		    return ;
            }else if($("#c_newpw").val().length < 6||$("#c_newpw").val().length > 10 ){
			alert("密碼字數不符，請重新輸入！");
			return;
	    	}else if($("#c_oldpw").val() == ""){
				alert("請輸入舊密碼。");
			}else if($("#c_newpw").val() == "" || $("#c_newpw2").val()==""){
				alert("請輸入新密碼。");
			}else if($("#c_oldpw").val() != check_pw){
				alert("舊密碼有誤！請重新輸入。");
				//alert (check_pw); 顯示舊密碼

			}else if(
			$("#c_oldpw").val() 	            == "" ||
			$("#c_newpw").val()	                == "" ||
			$("#c_newpw2").val() 	        	== ""  )
			{
			alert("請確認資料是否確實填寫！");
			return;
		    }else{
		    	$.ajax({
				url      : "../C/data.php",
				type     : "POST",
				dataType : "json",
				data : {
						type        : "pw",
						oldpw       :$("#c_oldpw").val(),
					  	newpw       :$("#c_newpw").val(),
						action		:"changeinfo"
		               },
					    error : function(e, status){
					    	    alert(e.responseText);
								alert("警告：\n\n儲存失敗！");
								return;
							                       },
						success:function(data){
							    //console.log(data);
			 					//alert("系統通知：\n\n修改成功！");
			 					window.location.reload();
								return;
		                                      },
                        })

             			$(this).dialog("close");
             }

                  } ,

            "取消": function() {
                    $(this).dialog("close");
                                } ,
               },

       });
	
    $( "#change_t_info" ).click(function() {
          $( "#show_t_info" ).dialog( "open" );
          return false;
          });
	
    $( "#change_s_info" ).click(function() {
	      $( "#show_s_info" ).dialog( "open" );
	      return false;
      });


    $( "#changepw" ).click(function() {
          $( "#showpw" ).dialog( "open" );
          return false;
          });





 });