<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="V/css/style.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


<title>科展初探系統</title>

</head>

<body>



<?php
include('top.php');
?>


<div class="contact">
		<?php
		 include('/M/db.php');
		$get_pic_sql = " SELECT * FROM `indexpage` order by `posttime` DESC LIMIT 0,1" ;
		                                                            //LIMIT 0,1抓取一筆
		$get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
		$total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數
	
		for ($i=0;$i<$total_records;$i++) {
		                $row = mysql_fetch_assoc($get_pic_qry);
		echo '
				
		       '.$row['article'].'
		      
		      ';
		}

		?>

</div>

<?php
include('footer.php');
?>



</body>
</html>