<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../../V/css/style.css"/>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<link href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../V/js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="../../teacher/api/teacher.js"></script>
<script type="text/javascript" src="../../V/js/aj-address.js"></script>

<title>科展初探系統</title>

</head>

<body>



<?php
include('../../top.php');
?>

<div class="contact" >

<button id="Btaddone" class="btstyle" >新增一筆</button>
<button id="Btaddall" class="btstyle" >批次匯入</button>
<button id="Btdelete" class="btstyle" >刪除</button>

    <div class="tabledata">
         <table id ="table_s"  >
            <thead>
                 <tr>      
                        <th >使用者帳號</th>
                        <th >使用者密碼</th>
                        <th >姓名</th>
                        <th >性別</th>
                        <th >身分</th>
                        <th >學校地區</th>
                        <th >年級/班級</th>    
                        <th >email</th>
				</tr>
          </thead>

           <tbody>
                    <?php
                include('../../M/db.php');

                $get_pic_sql = " SELECT * FROM `user_info` " ;
                //只顯示學生資料SELECT * FROM  `user_info` WHERE  `identify` LIKE  'S'
                // -->all
                $get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
                $total_fields=mysql_num_fields($get_pic_qry);// 取得欄位數
                $total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數
                //$total_id=array();
                //$count_id=0;
                for ($i=0;$i<$total_records;$i++) {
                $row = mysql_fetch_assoc($get_pic_qry);

                //$total_id[$count_id]=$row['ID'];
                //$count_id++;  
                //<td><input type="checkbox" id="select" value=""></input></td>

                echo '
                        <tr>
                          
                            <td>'.$row['user_id'].'</td>
                            <td>'.$row['user_pw'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>';       	         
					              if($row['identify']=="T"){
					                echo '老師';
					              }else if($row['identify']=="S"){
					                 echo '學生';
					              }       
	                 echo' </td>
                            <td>'.$row['city']."-".$row['county'].'</td>
                            <td>';       	         
					              if($row['grade']==""||$row['class']==""){
					                echo ' ';
					              }else {
					                 echo $row['grade']."年".$row['class']."班";
					              }       
	                  echo'</td>
                            <td>'.$row['email'].'</td>

                        </tr>';

                 }
                //將陣列以欄位名索引<td>'.$row['class'].'</td>
                ?>
           </tbody>
    </table>

    </div>

    <div id="addone" title="個人資料">
		
			<table>
            <tr>
    			<th>帳號:</th>
   				 <td><input type="text"  id="user_id" placeholder="4~10碼英文數字" ></td>
   			</tr>
            <tr>
    			<th>密碼:</th>
   				 <td><input type="password"  id="user_pw" placeholder="6~10英文數字"></td>
   			</tr> 
   			<tr>
    			 <th>確認密碼:</th>
   				 <td><input type="password"  id="user_pw2" placeholder="再次輸入密碼"></td>
   			</tr> 
   			<tr>
    			<th>姓名:</th>
   				 <td><input type="text"  id="name"  ></td>
   			</tr>  			
			<tr>
    			<th>性別:</th>
   				 <td> <select id="gender"><option value="男">男</option>
                                          <option value="女">女</option></select></td>
   			</tr> 
   			<tr>
    			<th>學校:</th>
   				 <?php echo ' <td><input type="text"  id="school" value="'.$_SESSION['school'].'" disabled></td>'; ?>
   			</tr> 
   			<tr>
    			<th>學校地區:</th>
   				 <?php echo ' <td><input type="text"  id="city" value="'.$_SESSION['city'].'" disabled></td>
   				     <tr><th><td><input type="text"  id="county" value="'.$_SESSION['county'].'" disabled></td></th></tr>'; ?>
   			</tr>			
   			<tr>
    			<th>年級:</th>
   				 <td><input type="text"  id="grade"  ></td>
   			</tr> 
    		<tr>
    			<th>班級:</th>
   				 <td><input type="text"  id="class"  ></td>
   			</tr>   
   			<tr>
    			<th>學號:</th>
   				 <td><input type="text"  id="stu_id"  ></td>
   			</tr>			
   			<tr>
    			<th>指導老師:</th>
   				 <?php echo ' <td><input type="text"  id="supervisor" value="'.$_SESSION['name'].'" disabled></td>'; ?>
   			</tr>

			</table>
		</form>
	</div>

     <div id="addall" title="多筆資料匯入">
		
			<table> 
   			<tr>
    			<th>學校:</th>
   				 <?php echo ' <td><input type="text"  id="allschool" value="'.$_SESSION['school'].'" disabled></td>'; ?>
   			</tr> 	
    		<tr>
    			<th>學校地區:</th>
   				 <?php echo ' <td><input type="text"  id="allcity" value="'.$_SESSION['city'].'" disabled></td>
   				     <tr><th><td><input type="text"  id="allcounty" value="'.$_SESSION['county'].'" disabled></td></th></tr>'; ?>
   			</tr>  					
   			<tr>
    			<th>年級:</th>
   				 <td><input type="text"  id="allgrade"  ></td>
   			</tr> 
    		<tr>
    			<th>班級:</th>
   				 <td><input type="text"  id="allclass"  ></td>
   			</tr>
   			<tr>
    			<th>指導老師:</th>
   				 <?php echo ' <td><input type="text"  id="allsupervisor" value="'.$_SESSION['name'].'" disabled></td>'; ?>
   			</tr>
   			<tr>
    			<th>匯入csv檔案:</th>
   				 <td><input type="file"  id="file"  ></td>
   			</tr>  

			</table>
		</form>
	</div>




</div>


<?php
include('../../footer.php');
?>



</body>
</html>