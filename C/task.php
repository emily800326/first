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
      
    //echo"<script>alert('->' + ".$_POST["toolsbox"].");</script>";

 	case "save": //存入任務

                $tasktitle				= $_POST['tasktitle'];
                $subject 				= $_POST['subject'];
                $tfrom					= $_POST['tfrom'];
                $relate 				= $_POST['relate'];
                $degree					= $_POST['degree'];
                $tools 					= $_POST['tools'];
                $toolsbox 				= $_POST['toolsbox'];
                $research_purposes_1 	= $_POST['research_purposes_1'];
                $research_step_1		= $_POST['research_step_1'];
                $discuss_1				= $_POST['discuss_1'];
                $conclusion_1			= $_POST['conclusion_1'];
                $research_purposes_2 	= $_POST['research_purposes_2'];
                $research_step_2		= $_POST['research_step_2'];
                $discuss_2				= $_POST['discuss_2'];
                $conclusion_2			= $_POST['conclusion_2'];
                $research_purposes_3 	= $_POST['research_purposes_3'];
                $research_step_3		= $_POST['research_step_3'];
                $discuss_3				= $_POST['discuss_3'];
                $conclusion_3			= $_POST['conclusion_3']; 

            foreach ($tfrom as $value) {

            	$tfromlist .= $value.",";
		
			}
            foreach ($degree as $value) {

            	$degreelist .= $value.",";
		
			}			


     
	        $sql="INSERT INTO task(taskp,tasktitle,subject,tfrom,relate,degree,tools,toolsphoto,research_purposes_1,research_step_1,discuss_1,conclusion_1,research_purposes_2,research_step_2,discuss_2,conclusion_2,research_purposes_3,research_step_3,discuss_3,conclusion_3)VALUES('".$_SESSION['name']."','".$tasktitle."','".$subject."','".$tfromlist."','".$relate."','".$degreelist."','".$tools."','".$toolsbox."','".$research_purposes_1."','".$research_step_1."','".$discuss_1."','".$conclusion_1."','".$research_purposes_2."','".$research_step_2."','".$discuss_2."','".$conclusion_2."','".$research_purposes_3."','".$research_step_3."','".$discuss_3."','".$conclusion_3."')";
			mysql_query($sql);

	break;




	







}




?>