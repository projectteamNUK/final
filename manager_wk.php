<?php
	session_start();
	require_once("db_config.php");
	if(!(isset($_SESSION['U_ID']))&& ($_SESSION['U_ID']='manager')){
		header("Refresh: 0; url=manager_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>管理者介面</title>
	<link rel="stylesheet" href="css/manager_wk.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</head>
<body background="\images\bg.png">
	

			<div class="wrapper">
				
				<!-- 搜尋錢顯示這段 -->
				<div class="user1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding2">


						<div class="arrangecontent">
							<a href="member_info.php"><button type="submit" class="edit_remove">帳號管理</button></a>
							<a href="opinion_info.php"><button type="submit" class="edit_remove">留言管理</button></a>
							<a href="travel_info_edit.php"><button type="submit" class="add">新增旅遊資訊</button></a><br>
							<a href="travel_info_rw.php"><button type="submit" class="edit_remove">修改、刪除旅遊資訊</button></a>
							<a href="analysis.php"><button type="submit" class="edit_remove">後台分析</button></a>	
							
							

						</div>


					

				</div>

			</div>





	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
</html>