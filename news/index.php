<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../V/css/style.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<link rel="stylesheet" href="../V/css/news.css"/>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.js"></script>
<script type="text/javascript" src="../V/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="../news/api/news.js"></script>

<title>科展初探系統</title>

</head>

<body>



<?php
include('../top.php');
?>

<div class="topword">最新消息</div>
<div class="contact">
    
     <table id ="table_news"  >
        <thead>
         <tr>      
                <th >發布時間</th>
                <th >標題</th>
                <th >發佈者</th>
                <th id="dele1">刪除</th>
		</tr>
        </thead>

        <tbody>
         <?php
		 include('../M/db.php');

		$get_pic_sql = " SELECT * FROM `news`  " ;                                          
		$get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
		$total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數

		for ($i=0;$i<$total_records;$i++) {
		  $row = mysql_fetch_assoc($get_pic_qry);

		echo '
				<tr>
		        <td>'.$row['posttime'].'</td>';
		echo"   <td><a href=../news/detail.php?id=".$row['id']." onclick='user_action(\"觀看最新消息\",this.href);'>".$row['topic']."</td>";
		echo'       <td>'.$row['who'].'</td>	
		        <td class="dele2"><button  onclick="delCheck()"><a href=../C/delete.php?id='.$row['id'].'&database=news   >刪除</a></button></td>		                
		        </tr>
		      
		      ';
		}
		?>
        </tbody>
    </table>


</div>


<?php
include('../footer.php');
?>



</body>

</html>