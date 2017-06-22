<?php
	session_start();
	require_once("db_config.php");
	if(isset($_POST['uid'])){
		$id = $_POST['uid'];
		$_SESSION['U_ID']= $id;
		$pwd = $_POST['upwd'];
		$arrange = "SELECT * FROM member WHERE member_id= '$id' and member_pwd='$pwd' ";
		$res=mysqli_query($link, $arrange);
		if (mysqli_num_rows($res)!=0 && $id == 'manager'){
			$message = "登入成功!歡迎進入FOR FUN 旅遊網";
		}else{
			$nmessage = "登入失敗!請確認帳號密碼是否正確";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理者登入</title>
<link rel="stylesheet" href="css/registered.css">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/forfun.js"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</head>
<body>
<body background="\images\bg.png">
	

<div class="wrapper">
	
	<!-- 搜尋錢顯示這段 -->
	<div class="user1">
	<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding1">
	<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding2">

		<h1 class="welcome">FOR FUN旅遊網</h1>
			<div class="arrangecontent">

				<div class="select">
					<p>管理者登入</p>
						<form action="manager_login.php" method="POST">
							<div>
							<label>帳號</label>
								<?php 
									echo "<input id='uid' type='text' name='uid'>";
								?>
							</div>
							<div>
							<label>密碼</label>
								<?php 
									echo "<input id='upwd' type='password' name='upwd'>";
								?>
							</div>
							<div>
					 			<button type="submit" class="alter-user-information-submit">送出</button>
							</div>
						<?php
							if(isset($message)){
								header("Refresh: 0.1; url=manager_wk.php");

							}elseif (isset($nmessage)) {
								echo "$nmessage";
								header("Refresh: 2; url=manager_login.php");

							}
						?>
								</div><br/>
						</form>
				</div>
										<div class="clear"></div>	
			</div>


					

</div>

			</div>

	<div class="footer">
		<div class="footer_word"><p><br>For Fun旅遊網<br>拜託PHP讓我過<br>資料、圖片皆來自鳳凰旅行社<br>	期末專題用<br>若造成任何人的不便<br>會立即撤下</p>
		</div>
	</div>
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
</html>