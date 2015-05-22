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

		   if ($_SESSION['identify']=="T"){  //教師身分
		           echo '<script type="text/javascript">
		            $(document).ready(function (){
		            	$("#Btstuinfo").show();
		            	$("#Bteditask").show();
		            	$("#Btgrade").show();
		            	$("#Btupdate").show();
		            })</script>';

		   }elseif ($_SESSION['identify']=="S") {//學生身分
		   	        echo '<script type="text/javascript">
		            $(document).ready(function (){
		                $("#Btstuinfo").hide();
		                $("#Bteditask").hide();
		            	$("#Btgrade").hide();
		            	$("#Btupdate").hide();
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

</script>


<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="logo">
				<a href="/first/index.php"><img src="/first/V/img/logo.png" ></a>
			</div>
			<div class="webname">
				<font size="7"><b>科展初探系統</b></font>
			</div>
				<div class="header-right">
					<div class="menu">
						<ul class="navigatoin">
						  <li><a href="/first/index.php" class="active">首頁</a></li>
						  <li><a href="/first/news">最新消息</a></li>
						  <li><a href="/first/student/task">實驗任務</a></li>
						  <li><a href="/first/teacher/editask" id="Bteditask">編輯任務</a></li>
						  <li><a href="/first/teacher/grade" id="Btgrade">任務評分</a></li>
						  <li><a href="/first/teacher/update" id="Btupdate">更新</a></li>
						  <li><a href="/first/teacher/stuinfo" id="Btstuinfo">學生資料</a></li>
						  <li><a href="/first/userinfo" id="Btuserinfo"><span class="unread">!</span>';echo"".$d_name."";echo'</a></li>
						  <li><a href="/first/register" class="active" id="Btlogin">登入</a></li>
						  <li><a class="active CursorPointer" id="Btlogout">登出</a></li>
						</ul>  
					</div>
				</div>					
		</div>
	</div>
</div>
	
<div class="line">
	<img src="/first/V/img/line.png"  />
	<div class="clearfix"> </div>
</div>
	<div id="spot-im-root"></div>
<script type="text/javascript">!function(t,o,p){function e(){var t=o.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"==o.location.protocol?"https":"http")+":"+p,o.body.appendChild(t)}t.spotId="832e152d8b6dbca96cf91ce526610ba1",t.spotName="",t.allowDesktop=!0,t.allowMobile=!1,t.containerId="spot-im-root",e()}(window.SPOTIM={},document,"//www.spot.im/embed/scripts/launcher.js");</script>

  ';


?>
