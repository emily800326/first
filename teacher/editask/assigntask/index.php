<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../../../V/css/style.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<?php
include('../../../top.php');	
if(!isset($_SESSION['user_id'])||$_SESSION['identify']!="A"&&$_SESSION['identify']!="T") { 
		   //因為需要用到JS所以不能放在head之前
			echo "<script>$('body').html('');alert('請先登入系統，確認權限！');window.location.href='/first/register/'</script>";

		}

?>
<title>科展初探系統</title>

</head>

<body>





<div class="topword">指定任務</div>

<div class="contact">
assigntask

<input id="Btback" type="button"  class="BT" onClick="javascript:history.back(1)" value="返回" />

</div>


<?php
include('../../../footer.php');
?>



</body>
</html>