<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../V/css/style.css"/>
<link rel="stylesheet" href="api/userinfo.css"/>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="api/userinfo.js"></script>
<script type="text/javascript" src="../V/js/aj-address.js"></script>

<title>科展初探系統</title>

</head>

<body>


<?php
include('../top.php');
		if(!isset($_SESSION['user_id'])){ //因為需要用到JS所以不能放在head之前
			echo "<script>$('body').html('');alert('請先登入系統！');window.location.href='/first/register/'</script>";
		}
?>

<div class="topword">個人功能</div>
<div class="contact">
	<div id="tabs">
	  
	  <ul>
	    <li><a href="#userinformation" onclick="user_action('觀看個人資料',this.href);">個人資料</a></li>
	    <li><a href="#mytask" onclick="user_action('我的任務',this.href);">我的任務</a></li>
	    <li><a href="#systemmessage" onclick="user_action('系統通知',this.href);"><d class="unread">!</d>系統通知</a></li>
	  </ul>

	  <div id="userinformation">
	    <h2>個人資料</h2> 
	   <?php


       $get_pic_sql = "SELECT * FROM `user_info` WHERE  `user_id`='". $d_user_id."'";
       //print_r($get_pic_sql);
       include('../M/db.php');
	   $get_pic_qry = mysql_query($get_pic_sql, $link) or die(mysql_error());
       $total_records=mysql_num_rows($get_pic_qry); // 取得記錄筆數
       $row = mysql_fetch_assoc($get_pic_qry);
       
        if ($d_identify=="T"||$d_identify=="A") {
        	echo '
        <br/> 
        <table class="usert_table">

	        <tr>
	          <th align="right" ><p>使用者名稱：</p></th>
	          <td >'.$row['name'].'</td>
	        </tr>
	        <tr>
	          <th align="right"  >登入身分：</p></th>';
              if($row['identify']=="T"){
                echo '<td >老師</td>';
              }else if($row['identify']=="S"){
                 echo '<td >學生</td>';
              }else if($row['identify']=="A"){
                 echo '<td >管理員</td>';
              }
	echo'   </tr>
	        <tr>
	          <th align="right"  >性別：</p></th>
	          <td >'.$row['gender'].'</td>
	        </tr>
	        <tr>
	          <th align="right"  >生日：</p></th>
	          <td >'.$row['birthday'].'</td>
	        </tr>
	        <tr>
	          <th align="right" ><p>校名：</p></th>
	          <td >'.$row['school'].'</td> 
	        </tr> 
	        <tr>
	          <th align="right" ><p>學校地區：</p></th>
	          <td >'.$row['city'].$row['county'].' </td>
	         </tr> 
	        <tr>
	          <th align="right" ><p>E-mail：</p></th>
	          <td >'.$row['email'].' </td>
	         </tr> 
	          <tr>
	          <th align="right" ><p>最後更新資料時間：</p></th>
	          <td >'.$row['update_time'].' </td>
	         </tr> 
	         <tr>
	          <th align="right" ><p>最後登入時間：</p></th>
	          <td >'.$row['recent_login_time'].' </td>
	         </tr> 
        </table><br/>';
   echo"  <button  id='change_t_info'  class='BT2' onclick='user_action(\"修改個人資料\",this.id);' >修改資料</button>
           <button  id='changepw'   class='BT2' onclick='user_action(\"變更密碼\",this.id);'>變更密碼</button>";
        
        } elseif($d_identify=="S") {

        	echo '
        <br/> 
        <table class="users_table">

	        <tr>
	          <th align="right" ><p>使用者名稱：</p></th>
	          <td >'.$row['name'].'</td>
	        </tr>
	        <tr>
	          <th align="right"  >登入身分：</p></th>';
              if($row['identify']=="T"){
                echo '<td >老師</td>';
              }else if($row['identify']=="S"){
                 echo '<td >學生</td>';
              }else if($row['identify']=="A"){
                 echo '<td >管理員</td>';
              }
	echo'   </tr>
	        <tr>
	          <th align="right"  >性別：</p></th>
	          <td >'.$row['gender'].'</td>
	        </tr>
	        <tr>
	          <th align="right" ><p>校名：</p></th>
	          <td >'.$row['school'].'</td> 
	        </tr> 
	        <tr>
	          <th align="right" ><p>學校地區：</p></th>
	          <td >'.$row['city'].$row['county'].' </td>
	         </tr> 
	        <tr>
	          <th align="right" ><p>就讀：</p></th>
	          <td >'.$row['grade']."年".$row['class']."班".' </td>
	         </tr> 
	        <tr>
	          <th align="right" ><p>學號：</p></th>
	          <td >'.$row['stu_id'].' </td>
	         </tr>	         	         
	          <tr>
	          <th align="right" ><p>最後更新資料時間：</p></th>
	          <td >'.$row['update_time'].' </td>
	         </tr> 
	         <tr>
	          <th align="right" ><p>最後登入時間：</p></th>
	          <td >'.$row['recent_login_time'].' </td>
	         </tr> 
        </table><br/>';
    echo "       <button  id='change_s_info' class='BT2' onclick='user_action(\"修改個人資料\",this.id);'>修改資料</button>
           <button  id='changepw'  class='BT2' onclick='user_action(\"變更密碼\",this.id);'>變更密碼</button>";
         


        }
        
       // print_r($row);   //印ID筆數的所有資料?>
         
<div id="show_s_info" title="修改個人資料">

             
	<?php echo' <table class="change_userinfo_table" >
	        <tr>
	          <th align="right" ><p>使用者名稱：</p></th>
	          <td ><input type="text" id="s_name" value="'.$row['name'].'" disabled></td>
	        </tr>
	        <tr>
	          <th align="right"  >登入身分：</p></th>';       	         
              if($row['identify']=="T"){
                echo '<td >老師</td>';
              }else if($row['identify']=="S"){
                 echo '<td >學生</td>';
              }else if($row['identify']=="A"){
                 echo '<td >管理員</td>';
              }       
		echo'</tr>
	        <tr>
	          <th align="right"  >性別：</p></th>
         <td>
            <select id="s_gender" >';
            $arrayName = array( "" ,
                                "男" ,
                                "女" ,
                               );
            foreach ($arrayName as $key => $value) {
              if($row['gender']==$value){
                echo '<option value="'.$value.'" selected>'.$value.'</option>';
              }else{
                echo '<option value="'.$value.'">'.$value.'</option>';
              }
            }
  echo   '   </select>
          </td>
	        </tr>
	        <tr>
	          <th align="right"  >生日：</p></th>
	          <td ><input type="date" id="s_birthday" value="'.$row['birthday'].'"></td>
	        </tr>
	        <tr>
	          <th align="right" ><p>校名：</p></th>
	          <td ><input type="text" id="s_school" value="'.$row['school'].'" disabled></td> 
	        </tr> 
	        <tr>
	          <th align="right" ><p>學校地區：</p></th>
	          <td >	<div class="address">
				        <select class="city" id="s_city" disabled>
							<option value="'.$row['city'].'">請選擇</option>
						</select>
				        <select class="county" id="s_county" disabled>
							<option value="'.$row['county'].'">請選擇</option>
						</select></td>
	         </tr> 
	         <tr>
	          <th align="right" ><p>學號：</p></th>
	          <td ><input type="text" id="s_stu_id" value="'.$row['stu_id'].'"></td>
	         </tr>
	         <tr>
	          <th align="right" ><p>年級：</p></th>
	          <td ><input type="number" min="1" id="s_grade" value="'.$row['grade'].'">年</td>
	         </tr>
	         <tr>
	          <th align="right" ><p>班級：</p></th>
	          <td ><input type="text" id="s_class" value="'.$row['class'].'">班</td>
	         </tr>
	        <tr>
	          <th align="right" ><p>E-mail：</p></th>
	          <td ><input type="text" id="s_email" value="'.$row['email'].'"></td>
	         </tr> 

	         <tr>
	          <th align="right" ><p>最後登入時間：</p></th>
	          <td >'.$row['recent_login_time'].' </td>
	         </tr> 
        </table><br/> 
			  </div>';?>

			
			<div id="show_t_info" title="修改個人資料">
             
	<?php echo' <table class="change_userinfo_table" >
	        <tr>
	          <th align="right" ><p>使用者名稱：</p></th>
	          <td ><input type="text" id="t_name" value="'.$row['name'].'" disabled></td>
	        </tr>
	        <tr>
	          <th align="right"  >登入身分：</p></th>';       	         
              if($row['identify']=="T"){
                echo '<td >老師</td>';
              }else if($row['identify']=="S"){
                 echo '<td >學生</td>';
              }else if($row['identify']=="A"){
                 echo '<td >管理員</td>';
              }       
		echo'</tr>
	        <tr>
	          <th align="right"  >性別：</p></th>
         <td>
            <select id="t_gender" >';
            $arrayName = array( "" ,
                                "男" ,
                                "女" ,
                               );
            foreach ($arrayName as $key => $value) {
              if($row['gender']==$value){
                echo '<option value="'.$value.'" selected>'.$value.'</option>';
              }else{
                echo '<option value="'.$value.'">'.$value.'</option>';
              }
            }
  echo   '   </select>
          </td>
	        </tr>
	        <tr>
	          <th align="right"  >生日：</p></th>
	          <td ><input type="date" id="t_birthday" value="'.$row['birthday'].'"></td>
	        </tr>
	        <tr>
	          <th align="right" ><p>校名：</p></th>
	          <td ><input type="text" id="t_school" value="'.$row['school'].'" ></td> 
	        </tr> 
	        <tr>
	          <th align="right" ><p>學校地區：</p></th>
	          <td >	<div class="address">
				        <select class="city" id="t_city" >
							<option value="'.$row['city'].'">請選擇</option>
						</select>
				        <select class="county" id="t_county" >
							<option value="'.$row['county'].'">請選擇</option>
						</select></td>
	         </tr> 
 
	        <tr>
	          <th align="right" ><p>E-mail：</p></th>
	          <td ><input type="text" id="t_email" value="'.$row['email'].'"></td>
	         </tr> 

	         <tr>
	          <th align="right" ><p>最後登入時間：</p></th>
	          <td >'.$row['recent_login_time'].' </td>
	         </tr> 
        </table><br/> 
			  </div>';

	  echo   ' <div id="showpw" title="修改個人密碼">
			    <table class="userpw_table">
			        <tr>
			          <th align="right" ><p>輸入舊密碼：</p></th>
			          <td ><input type="password" id="c_oldpw" ></td>
			          <input  type="hidden" id="checkpw" value="'.$row['user_pw'].'">
			        </tr>
					 <tr>
			          <th align="right" ><p>新密碼：</p></th>
			          <td ><input type="password" id="c_newpw" placeholder="6~10英文數字"></td>
			         </tr> 
			         <tr>
			          <th align="right" ><p>確認新密碼：</p></th>
			          <td ><input type="password" id="c_newpw2" placeholder="再次輸入新密碼"></td>
			         </tr> 
		        </table>
			   </div>';?>

	  </div>

	  <div id="mytask">
	    <h2>我的任務</h2>
	    <p>施工中!!!!!!!!</p>
	  </div>

	  <div id="systemmessage">
	    <h2>系統通知</h2>
	    <p>施工中!!!!!!!!</p>
	  </div>

	</div>


</div>


<?php
include('../footer.php');
?>



</body>
</html>