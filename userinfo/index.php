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
?>


<div class="contact">

 
	<div id="tabs">
	  
	  <ul>
	    <li><a href="#userinformation">個人資料</a></li>
	    <li><a href="#learning">學習進度</a></li>
	    <li><a href="#systemmessage">系統通知</a></li>
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
       
        if ($d_identify=="T") {
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
        </table><br/>
           <button  id="change_t_info">修改資料</button>
           <button  id="changepw"  >變更密碼</button>
        ';
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
        </table><br/>
           <button  id="change_s_info">修改資料</button>
           <button  id="changepw"  >變更密碼</button>
         ';


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

	  <div id="learning">
	    <h2>學習進度</h2>
	    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
	  </div>

	  <div id="systemmessage">
	    <h2>系統通知</h2>
	    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
	    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	  </div>

	</div>


</div>


<?php
include('../footer.php');
?>



</body>
</html>