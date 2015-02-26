<meta charset="utf-8">

<?php

include('../api/db.php');

    $IIID=$_GET["id"];

    
    $sql = "DELETE FROM `user_info` WHERE  `id`='". $IIID."'";
    $qry = mysql_query($sql, $link) or die(mysql_error());
    //$row = mysql_fetch_assoc($qry);

    echo '<meta http-equiv=REFRESH CONTENT=0.01;url=../stuinfo/index.php>'; //跳轉回原頁面


?>


