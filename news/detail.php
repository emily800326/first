<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../V/css/style.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<link rel="stylesheet" href="../V/css/news.css"/>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


<title>科展初探系統</title>

</head>

<body>



<?php
include('../top.php');
?>

<div class="topword">最新消息</div>
<div class="contact">
		<?php
		
		 $IIID=$_GET["id"];

		 include('../M/db.php');
		$get_pic_sql = " SELECT * FROM `news` Where `id`='". $IIID."'" ;
		                                                         //LIMIT 0,3抓取三筆
		$get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
		$total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數
		$row = mysql_fetch_assoc($get_pic_qry);
		
		echo'
				<h1 class="blue">標題</h1> 
				
				<h3>'.$row['topic'].'</h3>
				<h1 class="blue">發佈時間</h1>   
				<h3>'.$row['posttime'].'</h3>
		        <h1 class="blue">內容</h1>		
		        <h3>'.$row['article'].'</h3>	
		        <h3 ><b class="blue">發佈者:</b>'.$row['who'].'</h3>
				<input name="Submit" type="button" id="Submit" onClick="javascript:history.back(1)" value="返回" />

		
		         ';




		?>

</div>


<?php
include('../footer.php');
?>



</body>
</html>