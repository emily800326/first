<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../../../V/css/style.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<link href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="../../api/nowtask.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.js"></script>

<title>科展初探系統</title>

</head>

<body>

<?php
include('../../../top.php');
if(!isset($_SESSION['user_id'])||$_SESSION['identify']!="A"&&$_SESSION['identify']!="T") { 
		   //因為需要用到JS所以不能放在head之前
			echo "<script>$('body').html('');alert('請先登入系統，確認權限！');window.location.href='/first/register/'</script>";

		}
?>

<div class="topword">觀看現有任務</div>

<div class="contact">

  <table id ="table_task"  >
        <thead>
         <tr>      
                <th >任務名稱</th>
                <th >科目</th>
                <th >發佈者</th>
                <th id="dele1">刪除</th>
		</tr>
        </thead>

        <tbody>
         <?php
		 include('../../../M/db.php');

		$get_pic_sql = " SELECT * FROM `task`  " ;                                          
		$get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
		$total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數

		for ($i=0;$i<$total_records;$i++) {
		  $row = mysql_fetch_assoc($get_pic_qry);

		echo '
				<tr>
		        <td>'.$row['tasktitle'].'</td>
		        <td>'.$row['subject'].'</td>';
		echo'       <td>'.$row['taskp'].'</td>	
		        <td class="dele2"><button  onclick="delCheck()"><a href=../C/deletenews.php?id='.$row['id'].'  >刪除</a></button></td>		                
		        </tr>
		      
		      ';
		}
		?>
        </tbody>
    </table>


<!--<input id="Btback" type="button"  class="BT" onClick="javascript:history.back(1)" value="返回" />-->
</div>


<?php
include('../../../footer.php');
?>



</body>
</html>