<meta charset="utf-8">

<?php


 	session_start();


		if($_SERVER['REQUEST_METHOD'] == 'POST') {


			include('../M/db.php');

			$user_id 	= $_POST['user_id'];				  // 使用者ID
			$identify 	= $_POST['identify'];		          // 老師端S/學生端T/管理員T
			$action 	= $_POST['action'];			          // 使用者動作名稱
			$point_id 	= $_POST['point_id'];	              // 抓取此按鈕的id


			$sql = "INSERT INTO `action` (`user_id`, `identify`, `action`,`point_id`)
			        VALUES('".$_SESSION['user_id']."', '".$_SESSION['identify']."', '".$action."','".$point_id."')";
			$qry = mysql_query($sql, $link) or die(mysql_error());

		}

?>
