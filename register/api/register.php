<?php

require_once('../../M/db.php');
session_start();

$action="";

if(isset($_POST["action"])){
	$action =  $_POST["action"];
}else{
	$action="";
}
$data_values="";
switch($_POST["action"]){
      
      case "logout" :      
	   session_unset();
	   session_destroy();
	   echo "success";
	  // header("location: after_header.php?no_redir=yes"); //轉址
	   exit();
	  break;



	case "t_addone":
	    
	   $user_id 	=$_POST['user_id'];
       $user_pw		=$_POST['user_pw'];
	   $name   		=$_POST['name'];
	   $birthday	=$_POST['birthday'];
	   $gender		=$_POST['gender'];
	   $email		=$_POST['email'];
	   $school		=$_POST['school'];
	   $city   		=$_POST['city'];
	   $county		=$_POST['county'];
	   $identify	=$_POST['identify'];

	   // echo "link-->".$link;
		//echo "iD-->".$user_id;   //ID
		$query = "SELECT `user_id` FROM `user_info` WHERE `user_id`='".$user_id."';";
		//echo "query-->".$query;      //印出
    	$query  = mysql_query($query);
    	$result = mysql_num_rows($query);

		//echo "有幾個-->".$result;   //重複幾個
	   //exit;
		if((int)$result>0){
			echo "repeat"; //重複了
		}else{

			echo "add";

			$sql="INSERT INTO user_info(user_id,user_pw,identify,name,birthday,gender,email,school,city,county)
			VALUES('".$user_id."','".$user_pw."','".$identify."','".$name."','".$birthday."','".$gender."','".$email."','".$school."','".$city."','".$county."')";

			mysql_query($sql);

		}
		


	break;

	case "s_addone":
	    
	   $user_id 	=$_POST['user_id'];
       $user_pw		=$_POST['user_pw'];
	   $name   		=$_POST['name'];
	   $gender		=$_POST['gender'];
	   $school		=$_POST['school'];
	   $city		=$_POST['city'];
	   $county		=$_POST['county'];
	   $identify	=$_POST['identify'];
	   $grade		=$_POST['grade'];
	   $class		=$_POST['nclass'];
	   $stu_id		=$_POST['stu_id'];
	   $supervisor	=$_POST['supervisor'];

	   // echo "link-->".$link;
		//echo "iD-->".$user_id;   //ID
		$query = "SELECT `user_id` FROM `user_info` WHERE `user_id`='".$user_id."';";
		//echo "query-->".$query;      //印出
    	$query  = mysql_query($query);
    	$result = mysql_num_rows($query);

		//echo "有幾個-->".$result;   //重複幾個
	   //exit;
		if((int)$result>0){
			echo "repeat"; //重複了
		}else{

			echo "add";

			$sql="INSERT INTO user_info(user_id,user_pw,identify,name,gender,school,city,county,grade,class,stu_id,supervisor)
			VALUES('".$user_id."','".$user_pw."','".$identify."','".$name."','".$gender."','".$school."','".$city."','".$county."','".$grade."','".$class."','".$stu_id."','".$supervisor."')";

			mysql_query($sql);

		}

	break;

	case "importall":
     $error ="";
     $msg   ="";
     $fileElementId = 'allfile';
 	if(!empty($_FILES[$fileElementId]['error']))
	{
		switch($_FILES[$fileElementId]['error'])
		{

			case '1':
				$error = '上傳檔案超過php.ini所能傳送的大小。';
				break;
			case '2':
				$error = '上傳檔案超過HTML form所能傳送的大小。';
				break;
			case '3':
				$error = '該檔案只有部分上傳。';
				break;
			case '4':
				$error = '沒有上傳檔案。';
				break;

			case '6':
				$error = '暫時的資料夾不存在。';
				break;
			case '7':
				$error = '無法寫進磁碟當中。';
				break;
			case '8':
				$error = '檔案上傳終止，請檢察網絡。';
				break;
			case '999':
			default:
				$error = '系統發生錯誤。';
		}
	}elseif(empty($_FILES['allfile']['tmp_name']) || $_FILES['allfile']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else
	{

	$handle = fopen($_FILES['allfile']['tmp_name'], 'r');
	$result = input_csv($handle); //解析csv
	$len_result = count($result);
       


	if($len_result==0){
		$msg .= "沒有資料！";
		exit;
	}
	for ($i = 1; $i < $len_result; $i++) { //循环获取各字段值
	    $a 				= iconv('big5', 'utf-8', $result[$i][0]); //name
		$b 				= iconv('big5', 'utf-8', $result[$i][1]); //gender
		$c 				= $result[$i][2];						//user_id	
		$d 				= $result[$i][3];						//user_pw
		$e 				= $result[$i][4];						//identify
		$f 				= $result[$i][5];						//stu_id
		$g 				= $result[$i][6];						//birthday
		$h 				= $result[$i][7];						//email
		$school  		=$_POST['school'];
		$city		    =$_POST['city'];
		$county		    =$_POST['county'];
		$grade		    =$_POST['grade'];
		$class		    =$_POST['nclass'];
		$supervisor	    =$_POST['supervisor'];	
		//$name = iconv('big5', 'utf-8', $result[$i][0]); //!!big5轉utf8
		//$sex = iconv('big5', 'utf-8', $result[$i][1]);
		//$age = $result[$i][2];
		
		$data_values .= "('$school','$city','$county','$grade','$class','$supervisor','$a','$b','$c','$d','$e','$f','$g','$h'),";
	}

	$data_values = substr($data_values,0,-1); //去掉最后一个逗号
	fclose($handle); //关闭指针
	$query = mysql_query("insert into user_info (school,city,county,grade,class,supervisor,name,gender,user_id,user_pw,identify,stu_id,birthday,email) values $data_values");//輸入資料庫！



	if($query){
		$msg .= "批次上傳成功!";
	}else{
		$msg .= "批次上傳失敗。";
	}



			@unlink($_FILES['fileToUpload']);
	}
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";    

   
   	break;

	 case "login_check" :

      $loginid=$_POST["loginid"];
      $loginpw=$_POST["loginpw"];
      //print_r('loginid-->'.$loginid.'/');  //顯示登入ID
      //print_r('loginpw-->'.$loginpw.'/');  //顯示登入PW
      //登入check
      $sql= "select * from `user_info` where `user_id`='".$loginid."' and `user_pw`='".$loginpw."'";
      $result= mysql_query($sql,$link) or die (mysql_error());



	  $row = mysql_fetch_array($result);
  		//更新最後登入time
      $sql = "UPDATE `user_info` SET `recent_login_time` = NOW() WHERE `user_id` = '".$loginid."'";
      mysql_query($sql, $link) or die(mysql_error());
         

	  if(mysql_num_rows($result) !==0){

	     //session_start();
	      $_SESSION['user_id']	=$row['user_id'];    	//userid
	      $_SESSION['user_pw']	=$row['user_pw'];    	//userpw
	      $_SESSION['name']		=$row['name'];    		//姓名
	      $_SESSION['identify'] =$row['identify'];		//身分 (T/S)
		  $_SESSION['county']	=$row['county'];		//學校縣市
		  $_SESSION['city']  	=$row['city'];			//學校區
		  $_SESSION['school']	=$row['school'];		//校名
		  $_SESSION['degree']  	=$row['degree'];		//學歷-國小
		  $_SESSION['grade']  	=$row['grade'];  		//年級
		  $_SESSION['class']  	=$row['class'];			//班級
		  $_SESSION['birthday'] =$row['birthday'];		//生日
		  $_SESSION['email']  	=$row['email'];			//email
          
          $name = $row['name'];

		  if($row['identify']=='T'){

		     echo 'T';

          }
		  else {
		     echo "S";
		  }
	  }
	  else{
	      echo "NO";
	  }
	  

     break;



}


function input_csv($handle) { 
    $out = array (); 
    $n = 0; 
    while ($data = fgetcsv($handle, 10000)) { 
        $num = count($data); 
        for ($i = 0; $i < $num; $i++) { 
            $out[$n][$i] = $data[$i]; 
        } 
        $n++; 
    } 
    return $out; 
} 




?>
