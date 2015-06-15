<?php
	session_start();
     $d_user_id  ='';
     $d_user_pw  ='';
     $d_name='';
     $d_identify='';

if( isset($_SESSION['user_id']) )//登入(老師學生都會看到的功能)
   { echo '<script type="text/javascript">
            $(document).ready(function (){
            	$("#Btlogin").hide();
            	$("#Btlogout").show();
            	$("#Btuserinfo").show();
            })</script>';

		   if ($_SESSION['identify']=="T"){
		        //教師身分
		           echo '<script type="text/javascript">
		            $(document).ready(function (){
		            	$("#Btstuinfo").show();
		            	$("#Bteditask").show();
		            	$("#Btgrade").show();
		            	$("#Btupdate").show();
		            	$("#dele1").hide();
		            	$(".dele2").hide();
		            })</script>';

		   }elseif ($_SESSION['identify']=="S") {//學生身分
		   	        echo '<script type="text/javascript">
		            $(document).ready(function (){
		                $("#Btstuinfo").hide();
		                $("#Bteditask").hide();
		            	$("#Btgrade").hide();
		            	$("#Btupdate").hide();
		            	$("#dele1").hide();
		            	$(".dele2").hide();
		            })</script>';
           }elseif ($_SESSION['identify']=="A") {//管理員身分
		   	        echo '<script type="text/javascript">
		            $(document).ready(function (){
		            	$("#Btstuinfo").show();
		            	$("#Bteditask").show();
		            	$("#Btgrade").show();
		            	$("#Btupdate").show();
		            	$("#dele1").show();//新聞的刪除欄位
		            	$(".dele2").show();//新聞的刪除按鈕
		            })</script>';
           }

     $d_user_id  =$_SESSION['user_id'];  //紀錄ID
     $d_user_pw  =$_SESSION['user_pw'];  //紀錄密碼
     $d_name	 =$_SESSION['name'];     //紀錄姓名
     $d_identify =$_SESSION['identify']; //紀錄身分

   }
    else //未登入
    	   { echo '<script type="text/javascript">
            $(document).ready(function (){
            	$("#Btlogin").show();       <!-- 登入 -->
            	$("#Btlogout").hide();	    <!-- 登出 -->
            	$("#Btuserinfo").hide();    <!-- 個人資料 -->
            	$("#Btstuinfo").hide();     <!-- 編輯學生資料 -->
            	$("#Bteditask").hide();     <!-- 編輯任務 -->
            	$("#Btgrade").hide();       <!-- 評分 -->
            	$("#Btupdate").hide();      <!-- 更新 -->
            	$("#assignstu").hide(); 	<!-- 指定任務 -->
            	$("#tasking").hide(); 	    <!-- 進行中的任務 -->
            })</script>';}


echo'
<script type="text/javascript">

$(document).ajaxError(function(e, jqxhr, settings, exception) {

  if (jqxhr.readyState == 0 || jqxhr.status == 0) {

    return;
  }
});

 $(document).ready(function (){


 	<!-- script-nav -->
	$("span.menu").click(function(){
		$("ul.navigatoin").slideToggle("slow" , function(){
		});
	});

    <!-- logout -->
	$("#Btlogout").click(function(){

		$.ajax({
            url: "http://140.115.126.235/first/register/api/register.php",
            type: "post",
            datatype:"json",
            data:
		 {
		    action:"logout"
		 },

            error:function(xhr, ajaxOptions, thrownError){
            	 console.log(xhr.status);
                 },

            success: function(data) {
            	console.log(data);
              if (data == "success") {
                alert("成功登出!歡迎再次登入系統!!!");
                location.href = "/first/index.php";
              					     }
                                    }
          });
	});




	})


	//紀錄使用者情況
		function user_action( action, point_id) {
			if( "$d_user_id" != null){

				console.log( action, point_id);  //印出傳送資料


				//利用XMLHttpRequest方法傳值(好用可以學起來！不用換頁傳值！)
				var xhr = new XMLHttpRequest();
		        var url = "/first/C/history.php"; //接值的網頁
		        var params = "action=" + action + "&&point_id=" + point_id;  

		        xhr.open("POST", url, true);
		        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		        xhr.onreadystatechange = function() {
		        	if(xhr.readyState == 4 && xhr.status == 200) {
		             	var return_data = xhr.responseText;
		            }
		        }
		        xhr.send(params);
			}
		}






</script>


<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="logo">
				<a href="/first/index.php"><img src="/first/V/img/logo.png" ></a>
			</div>
			<div class="webname">
				<font size="6"><b>科展初探系統</b></font>
			</div>

					<div class="menu">
						<ul class="navigatoin"> ';
		echo "			  <li><a href='/first/index.php' class='active' onclick='user_action(\"科展系統首頁\",this.href);'>首頁</a></li>
						  <li><a href='/first/news' 
						  onclick='user_action(\"最新消息\",this.href);'>最新消息</a></li>
						  <li><a href='/first/student/task' 
						  onclick='user_action(\"實驗任務\",this.href);'>實驗任務</a></li>
						  <li><a href='/first/teacher/editask' id='Bteditask' onclick='user_action(\"編輯任務\",this.href);'>編輯任務</a></li>
						  <li><a href='/first/teacher/grade' id='Btgrade' onclick='user_action(\"任務評分\",this.href);'>任務評分</a></li>
						  <li><a href='/first/teacher/update' id='Btupdate' onclick='user_action(\"系統\",this.href);'>系統</a></li>
						  <li><a href='/first/teacher/stuinfo' id='Btstuinfo' onclick='user_action(\"學生資料\",this.href);'>學生資料</a></li>
						  <li><a href='/first/userinfo' id='Btuserinfo' onclick='user_action(\"個人資料\",this.href);'><span class='unread'>!</span>".$d_name."</a></li>
						  <li><a href='/first/register' class='active' id='Btlogin'>登入</a></li>
						  <li><a class='active CursorPointer' id='Btlogout' onclick='user_action(\"登出\",this.id);'>登出</a></li> ";
			echo'		</ul>
					</div>

		</div>
	</div>
</div>



  ';


?>
