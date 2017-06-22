<?php
	session_start();
	$tra_id = $_SESSION['U_ID'];
    $acc = $_SESSION['fb_acc'];
	require_once("db_config.php");
	$uri = "https://graph.facebook.com/v2.6/$tra_id/friends?limit=100&access_token=".$acc;
    $user_info = file_get_contents($uri);
    $fri = json_decode($user_info);
    $fri = ($fri->data);
	if(isset($_POST['uname'])){
		$id = $_SESSION['U_ID'];
		$name = $_POST['uname'];
		$phone = $_POST['uphone'];
		$email = $_POST['uemail'];
		$new_sql = "INSERT INTO member VALUES('$id', NULL, '$name', '$phone', '$email')";
		if (mysqli_query($link, $new_sql)){
			$message = "恭喜註冊成功!歡迎加入FOR FUN 旅遊網<br/>";
		}else{
			$message = "註冊失敗!請聯繫系統管理員或稍後再試";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>歡迎使用臉書登入</title>
	<link rel="stylesheet" href="css/fb_registered.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/forfun.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</head>
<body background="\images\bg.png">
	


			<div class="wrapper">
				
				<!-- 搜尋錢顯示這段 -->
				<div class="user1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding2">

					<h1 class="welcome">歡迎使用FACEBOOK登入</h1>
						<div class="arrangecontent">

	<?php
		$tra_id = $_SESSION["U_ID"];
		$tra_name = $_SESSION["U_NAME"];
		echo "<img class='responsive-img circle' src='https://graph.facebook.com/$tra_id/picture?type=large'><br>";
		echo "<p class='username'>$tra_name</p>";
	?>
	<div>
		<h5 class="join_member">會員資料</h5>
	</div>
	<form action="fbreg.php" method="POST">
		<div class="middle">	

			<div class="member-information">
			<label>名字</label>
			<?php 
				$name = $_SESSION["U_NAME"];
				echo "<input id='uname' type='text' name='uname' value='$name' required>";
			?><br>
			</div>
			<div class="member-information">
			<label>電話</label>
			<?php 
				echo "<input id='uphone' type='text' name='uphone' value='$phone' required>";
			?><br>
			</div>
			<div class="member-information">
			<label>信箱</label>
			<?php 
				$email = $_SESSION["U_EMAIL"];
				echo "<input id='uemail' type='text' name='uemail' value='$email' required>";
			?><br>
			</div>

			<div>
								  <button type="submit" class="alter-user-information-submit">送出</button>
	<?php
		if(isset($message)){
			echo "<div>$message</div>";
			header("Refresh: 2; url=index.php");
		}
	?>
		</div>

			</div><br/>
	</form>
													<div class="clear"></div>	
						</div>

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