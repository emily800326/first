<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../../V/css/style.css"/>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


<title>科展初探系統</title>

</head>

<body>



<?php
include('../../top.php');
?>
<div class="topword">實驗任務</div>

<div class="contact">
	<a href="./Physical" onclick="user_action('觀看物理任務',this.href);"><div class="Bttask" >物理</div></a>
	<a href="./Chemistry" onclick="user_action('觀看化學任務',this.href);"><div class="Bttask">化學</div></a>
	<a href="./Biology" onclick="user_action('觀看生物任務',this.href);"><div class="Bttask">生物</div></a>
	<a href="./Earthscience" onclick="user_action('觀看地球科學任務',this.href);"><div class="Bttask">地球科學</div></a>
	<a href="./AppliedScience" onclick="user_action('觀看應用科學任務',this.href);" ><div class="Bttask">應用科學</div></a>
	<a href="./Math" onclick="user_action('觀看數學任務',this.href);"><div class="Bttask">數學</div></a>
	<a href="./Aasignstu" onclick="user_action('觀看指定任務',this.href);"><div class="Bttasks" id="assignstu">指定任務!</div></a>
	<a href="./tasking" onclick="user_action('觀看進行中的任務',this.href);"><div class="Bttasking" id="tasking">進行中的任務</div></a>
</div>


<?php
include('../../footer.php');
?>



</body>
</html>