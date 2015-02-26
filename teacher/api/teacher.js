
$(function() {
 $('.address').ajaddress({ city: "台東縣", county: "池上鄉" });  

$(document).ready(function(){

    	var setLanguage={

		    "sProcessing":   "處理中...",
		    "sLengthMenu":   "顯示 _MENU_ 項結果",
		    "sZeroRecords":  "沒有符合結果",
		    "sInfo":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
		    "sInfoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
		    "sInfoFiltered": "(從 _MAX_ 項結果過濾)",
		    "sInfoPostFix":  "",
		    "sSearch":       "全部欄位搜尋:",
		    "sUrl":          "",
		    "oPaginate": {
		        "sFirst":    "首頁",
		        "sPrevious": "上頁",
		        "sNext":     "下頁",
		        "sLast":     "尾頁",
		    }
		};

		var opt;

		opt={
	           "oLanguage":setLanguage,
	           "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "全部"]],
	            "bPaginate":true, //開起換頁
                //"sScrollY":"380px", //設定成拉頁y
                //"sScrollX":"400px", //設定成拉頁x
               // "sWidth":"5%",
	    };
		$("#table_s").dataTable(opt);
    	  

      var table = $('#table_s').DataTable();
		$('#container').css( 'display', 'block' );
		table.columns.adjust().draw();


     });




$(document).ready(function(){//多搜尋列表
    $('#table_s').dataTable().columnFilter({

    	sPlaceHolder: "head:after",
			


			aoColumns: [
						{ type: "text" },//user_id
						{ type: "text" },//user_pw
						{ type: "text" },//name
					    { type: "select", values: [ '男', '女']  }, //性別
						{ type: "select", values: [ '老師', '學生'  ]    },//身分
						{ type: "text" },//county,city
						{ type: "text" }, //class.grade
						{ type: "text" }, //email
		     			null,
		     			]

		});


   });	




$("#addone").hide();
$("#addall").hide();

$("#Btaddone").click(function(){

   $("#addone").dialog({
            	
                //height:500,
                width:400,
                modal:true,	     //開遮罩
                resizable:false,
       

                buttons:{
                "確定":function(){

            
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
		    }else if($("#user_id").val() 	== "" ||
			$("#user_pw").val() 		    == "" ||
			$("#user_pw2").val() 		    == "" ||
			$("#name").val() 	            == "" ||
			$("#gender").val()  	        == "" ||
			$("#grade").val() 			    == "" ||
			$("#school").val() 	    		== "" ||
			$("#city").val() 	    		== "" ||
			$("#county").val() 	    		== "" ||			
			$("#class").val() 	    		== "" ||
			$("#stu_id").val() 	    		== "" ||
			$("#supervisor").val() 	    	== ""  ){
			alert("請確認資料是否確實填寫！");
			return;
            }

            $.ajax({ //ajax傳值
               url:"../../register/api/register.php",
               type:"POST",
               data:{

				  identify: 	"S",//學生身分
	              user_id:  	$("#user_id").val()  ,
				  user_pw:		$("#user_pw").val()  ,
				  name:			$("#name").val() 	 ,
				  gender:		$("#gender").val()   ,
				  grade:		$("#grade").val()    ,
				  school:		$("#school").val() 	 ,
				  city:			$("#city").val()     ,
				  county:		$("#county").val() 	 ,
				  nclass:		$("#class").val() 	 ,
				  stu_id:		$("#stu_id").val() 	 ,
				  supervisor: 	$("#supervisor").val(),

                  action:"s_addone"

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

$("#Btaddall").click(function(){

   $("#addall").dialog({

                //height:500,
                width:550,
                modal:true,	     //開起遮罩
                resizable:false,
                buttons:{
                "確定":function(){

            if($("#allschool").val() 	== "" ||
			$("#allcity").val() 	    		== "" ||
			$("#allcounty").val() 	    		== "" ||
			$("#allclass").val() 	    		== "" ||
			$("#allsupervisor").val() 	    	== ""  ){
			alert("請確認資料是否確實填寫！");
			return;
            }
            $.ajax({ //ajax傳值
               url:"../../register/api/register.php",
               type:"POST",
               data:{

				  identify: 	"S",//學生身分

				  school:		$("#allschool").val() 	 ,
				  city:			$("#allcity").val()      ,
				  county:		$("#allcounty").val() 	 ,
				  nclass:		$("#allclass").val() 	 ,
				  supervisor: 	$("#allsupervisor").val(),
                  action:"importall"

               },
               error:function(){

                  alert("error add");
                  return;

               },
               success:function(data){
          
                 console.log(data);  //印出傳送的資料

                  if(data=='add'){
					alert("批次匯入成功!");
					//window.location.reload();

                  }else{
                  	alert("請重新上傳資料。");
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


 });

function delCheck()
        {
            var flag=window.confirm("你確認要刪除嗎?");
            if(flag==true)
			{
			}
			else if(flag==false){
			window.event.returnValue=false;
			}

        }