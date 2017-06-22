<?php
	session_start();
	require_once("db_config.php");
	if(isset($_POST['uname'])){
		$id = $_POST['uphone']+1000000000;
		$name = $_POST['uname'];
		$_SESSION['U_NAME']=$name;
		$phone = $_POST['uphone'];
		$email = $_POST['uemail'];
		$pwd = $_POST['upwd'];
		$new_sql = "INSERT INTO member VALUES('$id', '$pwd', '$name', '$phone', '$email')";
		if (mysqli_query($link, $new_sql)){
			$message = "恭喜註冊成功!歡迎加入FOR FUN 旅遊網<br/>";
		$_SESSION['U_ID']=$id;
		}else{
			$message = "註冊失敗!請聯繫系統管理員或稍後再試";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>註冊</title>
	<link rel="stylesheet" href="css/registered.css">
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

					<h1 class="welcome">歡迎加入FOR FUN旅遊網</h1>
						<div class="arrangecontent">

							<div class="select">
								<p>會員資料</p>
									<form action="basicregistered.php" method="POST">
											<div>
											<label>名字</label>
											<?php 
												echo "<input id='uname' type='text' name='uname' value='$name' required>";
											?>
											</div>
											<div>
											<label>電話</label>
											<?php 
												echo "<input id='uphone' type='text' name='uphone' value='$phone' required>";
											?>
											</div>
											<div>
											<label>信箱</label>
											<?php 
												echo "<input id='uemail' type='text' name='uemail' value='$email' required>";
											?>
											</div>
											<div>
											<label>密碼</label>
											<?php 
												echo "<input id='upwd' type='password' name='upwd' required>";
											?>
											</div>
											<div>
											
								  <button type="submit" class="alter-user-information-submit">送出</button>
							</div>
									<?php
										if(isset($message)){
											echo "$message";
											header("Refresh: 0.5; url=index.php");

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