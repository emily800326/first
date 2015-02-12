<?php
session_start();
     $d_user_id  ='';
     $d_user_pw  ='';
     $d_name='';
     $d_identify='';


if( isset($_SESSION['user_id']) )//登入
   { echo '<script type="text/javascript">
            $(document).ready(function (){
            	$("#Btlogin").hide();
            	$("#Btlogout").show();
            	$("#Btuserinfo").show();		
            })</script>';

		   if ($_SESSION['identify']=="T"){//教師身分
		           echo '<script type="text/javascript">
		            $(document).ready(function (){
		            	$("#Btstuinfo").show();
		            })</script>';

		   }elseif ($_SESSION['identify']=="S") {//學生身分
		   	        echo '<script type="text/javascript">
		            $(document).ready(function (){
		                $("#Btstuinfo").hide();
		            })</script>'; 
           }

     $d_user_id  =$_SESSION['user_id'];
     $d_user_pw  =$_SESSION['user_pw'];
     $d_name	 =$_SESSION['name'];
     $d_identify =$_SESSION['identify'];
     
   }
    else //未登入
    	   { echo '<script type="text/javascript">
            $(document).ready(function (){
            	$("#Btlogin").show();
            	$("#Btlogout").hide();	
            	$("#Btuserinfo").hide();
            	$("#Btstuinfo").hide();
	
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
						  <li><a href="/first/teacher/stuinfo" id="Btstuinfo">學生資料管理</a></li>
						  <li><a href="/first/userinfo" id="Btuserinfo">';echo"".$d_name."";echo'</a></li>
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
	

  ';


?>
