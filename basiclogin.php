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

<title>FOR FUN旅遊網</title>

</head>
<body>
	<h4>歡迎使用一般登入</h4>
	<div>
		<h5>會員登入</h5>
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
			<button type="submit">送出</button>
			<button type="text"><a href="basicregistered.php">註冊</a></button>
		</div>
	</form>
	<?php
		if(isset($message)){
			echo "<div>$message</div>";
			header("Refresh: 2; url=index.php");
		}
	?>
</body>
</html>