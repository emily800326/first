<?php
	  
include('../M/db.php');
session_start();

$action="";

if(isset($_POST["action"])){
	$action =  $_POST["action"];
}else{
	$action="";
}

switch($_POST["action"]){
      

	case "changeinfo":
	   $type = $_POST["type"];
		//include('../M/db.php');	
		switch ($type) {
		
			case "t_info":
			   $name   		=$_POST['name'];
			   $birthday	=$_POST['birthday'];
			   $gender		=$_POST['gender'];
			   $email		=$_POST['email'];
			   $school		=$_POST['school'];
			   $city   		=$_POST['city'];
			   $county		=$_POST['county'];
				mysql_query("UPDATE `user_info` SET `name` 			= '".$name."',
													`birthday` 		= '".$birthday."',
													`gender` 		= '".$gender."',
													`email` 		= '".$email."',
													`school` 		= '".$school."',
													`city` 			= '".$city."',
													`county` 		= '".$county."',		
													`update_time` 	= NOW()
													WHERE `user_id` = '".$_SESSION['user_id']."'",$link) or die(mysql_error());
				if(mysql_error()){
					exit('{"Error":"Error"}');
				}else{
					exit('{"Success":"Success"}');
				}
  	 		break;

  	 		case "s_info":
			   $name   		=$_POST['name'];
			   $birthday	=$_POST['birthday'];
			   $gender		=$_POST['gender'];
			   $email		=$_POST['email'];
			   $school		=$_POST['school'];
			   $city   		=$_POST['city'];
			   $county		=$_POST['county'];
			   $stu_id		=$_POST['stu_id'];
			   $class		=$_POST['nclass'];
			   $grade   	=$_POST['grade'];
				mysql_query("UPDATE `user_info` SET `name` 			= '".$name."',
													`birthday` 		= '".$birthday."',
													`gender` 		= '".$gender."',
													`email` 		= '".$email."',
													`school` 		= '".$school."',
													`city` 			= '".$city."',
													`county` 		= '".$county."',
													`stu_id` 		= '".$stu_id."',
													`class` 		= '".$class."',
													`grade` 		= '".$grade."',		
													`update_time` 	= NOW()
													WHERE `user_id` = '".$_SESSION['user_id']."'",$link) or die(mysql_error());
				if(mysql_error()){
					exit('{"Error":"Error"}');
				}else{
					exit('{"Success":"Success"}');
				}
  	 		break;
  	 		
  	 		case "pw":
					$oldpw = $_POST['oldpw'];
					$newpw = $_POST['newpw'];
		  
				mysql_query("UPDATE `user_info` SET `user_pw` 	    = '".$newpw."',
													`update_time` 	= NOW()
													WHERE `user_id` = '".$_SESSION['user_id']."'",$link) or die(mysql_error());
				if(mysql_error()){
					exit('{"Error":"Error"}');
				}else{
					exit('{"Success":"Success"}');
				}
  	 		break;
    }

 	case "saveindex": //把文章存入首頁
		    $article        =$_POST['data'];
	        $sql="INSERT INTO indexpage(article,who)VALUES('".$article."','".$_SESSION['name']."')";
			mysql_query($sql);
	break;

 	case "savenews": //把文章存入最新消息
		    $article        =$_POST['data'];
	        $topic		    =$_POST['topic'];
	        $sql="INSERT INTO news(article,who,topic)VALUES('".$article."','".$_SESSION['name']."','".$topic."')";
			mysql_query($sql);
	break;


 	case "savemessage": //傳送訊息

	        $topic		    =$_POST['topic'];
	        $mtype          =$_POST['mtype'];
		    $content        =$_POST['data'];
			$mtowho         =$_POST['mtowho'];

	        $sql="INSERT INTO message(topic,mtype,content,mperson,mtowho)VALUES('".$topic."','".$mtype."','".$content."','".$_SESSION['name']."','".$mtowho."')";
			mysql_query($sql);
	break;
	









}




?>