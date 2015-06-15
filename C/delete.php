<meta charset="utf-8">

<?php


include('../M/db.php');

    $IIID=$_GET["id"]; 
    $where=$_GET["database"]; 
    
    $sql = "DELETE FROM `". $where."` WHERE  `id`='". $IIID."'";
    $qry = mysql_query($sql, $link) or die(mysql_error());
    //$row = mysql_fetch_assoc($qry);

    echo '<script language="JavaScript">history.go(-1); //回上一頁
        </script>'; //跳轉回原頁面<

?>


