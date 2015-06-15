<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/ico" href="/first/V/img/logo.png">
<link rel="stylesheet" href="../../../V/css/style.css"/>
<link rel="stylesheet" href="../../../V/css/newtask.css"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/cupertino/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="../../api/teacher.js"></script>
<script src="../../../V/js/jquery.stepify.js"></script>
<script src="../../../V/js/html5uploader.js"></script>

 
<title>科展初探系統</title>

</head>

<body onload="new uploader('drop', 'status', '../../../C/uploader.php', 'list');">


<?php
include('../../../top.php');
if(!isset($_SESSION['user_id'])||$_SESSION['identify']!="A"&&$_SESSION['identify']!="T") { 
		   //因為需要用到JS所以不能放在head之前
			echo "<script>$('body').html('');alert('請先登入系統，確認權限！');window.location.href='/first/register/'</script>";

		} ?>

<div class="topword">編輯新任務</div>



<div class="contact">

<button id="newtask1" class="BT2">新增任務導引</button>
<button id="newtask2" class="BT2">新增任務學習單</button>
	
	<div id="taskguide">
			<div class="step"></br>
			 <h2 class="writemode">題目資訊</h2>
				<table>
		          <tr>
		    		<th>題目名稱:</th>
		   				 <td><input type="text"  id="tasktitle" size:7></td>
		   			</tr>
		            <tr>
		    			<th>科目:</th>
		   				 <td ><select id="subject">
		   				 						 <option value="Physical">物理</option>
								   				 <option value="Chemistry">化學</option>
								   				 <option value="Biology">生物</option>
								   				 <option value="Earthscience">地球科學</option>
								   				 <option value="Appliedscience">應用科學</option>
		                                         <option value="Math">數學</option></select>
		                 </td>
		   			</tr>
		   			<tr>
		    			 <th>題目來源:</th>
		   				 <td >
		   				 <input type="checkbox"  name="tfrom[]" value="教科書">教科書<br>
				   	     <input type="checkbox" name="tfrom[]" value="校內科展">校內科展<br>
				   		<input type="checkbox" name="tfrom[]" value="校外科展">校外科展<br></td>
		   			</tr>
		   			<tr>
		    			<th>相關單元:</th>
		   				 <td><input type="text"  id="relate"  ></td>
		   			</tr>
					<tr>
		    			<th>選擇探究等級:</th>
		   				 <td ><input type="checkbox" name="degree[]" value="給予實驗問題" checked >給予實驗問題<br>
				   			 <input type="checkbox" name="degree[]" value="給予全部實驗器材">給予全部實驗器材<br>
				   			 <input type="checkbox" name="degree[]" value="給予全部實驗步驟">給予全部實驗步驟<br>
				   			 <input type="checkbox" name="degree[]" value="給予部分實驗器材">給予部分實驗器材<br>
		                     <input type="checkbox" name="degree[]" value="給予部分實驗步驟" >給予部分實驗步驟<br> </td>
		   			</tr>
				</table>
			</div>

			<div class="step"></br>
			<h2 class="writemode">器材提示</h2>
				<table>
		            <tr>
		    			<th>器材:</th>
		   				 <td><input type="text"  id="tools" ></td>
		   			</tr>
		   			<tr>
		    			 <th>器材組合圖:</th>
		   				 <td> 
		   				     <div id="box">
      					 		 <div id="drop"></div>
   							 </div>
   						 	<div id="status">此瀏覽器不支援拖拉上傳</div>
  						 	<div id="list"></div>
  						 	<div id="flist" style="visibility:hidden;"></div> 
  						 	
		   				 </td>
		   				 <th></th>
		   				 <td>  

						</td>
		   			</tr>
				</table>
			</div>

			<div class="step"></br>
			<h2 class="writemode">研究問題一</h2>
				<table>
		            <tr>
		    			<th>研究目的一:</th>
		   				 <td><input type="text"  id="research_purposes_1" size="30" ></td>
		   			</tr>
		   			<tr>
		    			 <th>實驗步驟一:</th>
		   				 <td><textarea type="text"  id="research_step_1"  ></textarea></td>
		   			</tr>
		   			<tr>
		    			 <th>討論一:</th>
		   				 <td><textarea type="text"  id="discuss_1"  ></textarea></td>
		   			</tr>
		   			<tr>
		    			 <th>結論一:</th>
		   				 <td><textarea type="text"  id="conclusion_1"  ></textarea></td>
		   			</tr>
				</table>
			</div>

			<div class="step"></br>
			<h2 class="writemode">研究問題二</h2>
				<table>
		            <tr>
		    			<th>研究目的二:</th>
		   				 <td><input type="text"  id="research_purposes_2" size="30" ></td>
		   			</tr>
		   			<tr>
		    			 <th>實驗步驟二:</th>
		   				 <td><textarea type="text"  id="research_step_2"  ></textarea></td>
		   			</tr>
		   			<tr>
		    			 <th>討論二:</th>
		   				 <td><textarea type="text"  id="discuss_2"  ></textarea></td>
		   			</tr>
		   			<tr>
		    			 <th>結論二:</th>
		   				 <td><textarea type="text"  id="conclusion_2"  ></textarea></td>
		   			</tr>
				</table>
			</div>

			<div class="step"></br>
			<h2 class="writemode">研究問題三</h2>
				<table>
		            <tr>
		    			<th>研究目的三:</th>
		   				 <td><input type="text"  id="research_purposes_3" size="30" ></td>
		   			</tr>
		   			<tr>
		    			 <th>實驗步驟三:</th>
		   				 <td><textarea type="text"  id="research_step_3"  ></textarea></td>
		   			</tr>
		   			<tr>
		    			 <th>討論三:</th>
		   				 <td><textarea type="text"  id="discuss_3"  ></textarea></td>
		   			</tr>
		   			<tr>
		    			 <th>結論三:</th>
		   				 <td><textarea type="text"  id="conclusion_3"  ></textarea></td>
		   			</tr>
				</table>
				 <!-- 隱藏更新上傳者 -->
			</div>

	</div> <!-- end新增任務導引 -->

    <div id="tasklearn">
     任務學習單
    </div> <!-- end新增任務學習單 -->






















</div>



<?php
include('../../../footer.php');
?>




</body>

	<script type="text/javascript">
		$('.step').stepify({
			distribution:[1,1,1,1,1],
			nextHooks : {
				0 : [
						function ($stepContainer){ console.log('validation hook 0 for step 0'); return true; },
						function ($stepContainer){ console.log('next hook 1 for step 0'); return true; },
						function ($stepContainer){ console.log('next hook 2 for step 0'); return true; }
					]
			},
			prevHooks : {
				1 : [
						function ($stepContainer){ console.log('prev hook 1 for step 1'); return true; },
						function ($stepContainer){ console.log('prev hook 2 for step 1'); return true; }
					]
			}
		});
	</script>
	    <!-- 偵測瀏覽是否支援拖拉上傳以及拖拉變框變色 -->
    <script language="javascript">
    var drop = document.getElementById('drop'),
        state = document.getElementById('status');

    if (typeof window.FileReader === 'undefined') {
        state.className = 'fail';
    } else {
        state.className = 'success';
        state.innerHTML = '請將要上傳的圖片  逐步拖拉至框中';
    }

    drop.ondragover = function() {
        this.className = 'hover';
        return false;
    };
    drop.ondragend = function() {
        this.className = '';
        return false;
    };
    </script>

</html>