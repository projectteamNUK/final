<?php
	require_once("db_config.php");
	if(isset($_POST['uid'])){
		$id = $_POST['uid'];
		$pwd = $_POST['upwd'];
		$arrange = "SELECT * FROM member WHERE member_email= '$id' and member_pwd='$pwd' ";
		$res=mysqli_query($link, $arrange);
		if (mysqli_num_rows($res)!=0){
			$message = "登入成功!歡迎進入FOR FUN 旅遊網<br/>";
			$set = mysqli_fetch_array($res, MYSQLI_ASSOC);
			session_start();
			$_SESSION['U_ID'] = $set['member_id'];
			$_SESSION['U_ID'] = $set['member_name'];
		}else{
			$message = "登入失敗!請確認帳號密碼是否正確";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FOR FUN 旅遊網</title>
</head>
<body>
		<h1>FOR FUN 旅行社</h1>
		<div>
		<h2>會員登入 SIGN IN</h2>
	</div>
	<form action="basiclogin.php" method="POST">
		<div>
		<label>帳號(內建為註冊信箱)</label>
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
			<button type="submit">登入</button>
		</div>
	</form>
			<?php
				if(isset($message)){
					echo "<div>$message</div>";
					header("Refresh: 2; url=index.php");
				}
			?>
		<div>
		<a href="https://www.facebook.com/dialog/oauth?client_id=288870768208521&redirect_uri=http://140.127.218.156/travel/fblogin.php&scope=public_profile,user_friends">
		<img src="https://img.funtop.tw/2016/05/160514-fb-live-map/fb-live-map_2.png" width="200" height="200">
		</a>
		</div>

		<div>
		<a href="basicregistered.php">
		<img src="https://img.shoplineapp.com/media/image_clips/5711083c6170693ff6305300/source.jpg?1460734011" width="200" height="200">
		</a>
		</div>
</body>
</html>