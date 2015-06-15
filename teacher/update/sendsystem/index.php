<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../../../V/css/style.css"/>
<link rel="stylesheet" href="../../../V/css/update.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="../../../V/js/ckeditor/ckeditor.js"></script>
<script src="../../../V/js/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="../../api/teacher.js"></script>

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

<div class="topword">系統站內信</div>

<div class="contact">
	 <table id="message">
	     <tr>
		     <td>主旨：</td>
		     <td><input type="text" id="topic"  value=""></td>
	     </tr>
	     <tr>
		     <td>類型:</td>
		     <td><select id="mtype"><option value="系統通知">系統通知</option>
		                            <option value="私人訊息">私人訊息</option></select></td>
	      </tr> 
	      <tr>                           
	   		 <td>傳送對象：</td>
	    	 <td><input type="text" id="mtowho" value=""></td>
	     </tr> 
	</table>

    <textarea  class="ckeditor" id="editor3" ></textarea>
	 <!-- 隱藏更新上傳者 -->
	 <button id="postmessage"  class="BT" >送出</button>    
	<input id="Btback" type="button"  class="BT" onClick="javascript:history.back(1)" value="返回" />
</div>


<?php
include('../../../footer.php');
?>



</body>
</html>