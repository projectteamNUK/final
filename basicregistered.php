<?php
	session_start();
	require_once("db_config.php");
	if(isset($_POST['uname'])){
		$id = $_POST['uphone']+1000000000;
		$_SESSION['U_ID']=$id;
		$name = $_POST['uname'];
		$_SESSION['U_NAME']=$name;
		$phone = $_POST['uphone'];
		$email = $_POST['uemail'];
		$pwd = $_POST['upwd'];
		$new_sql = "INSERT INTO member VALUES('$id', '$pwd', '$name', '$phone', '$email')";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>FOR FUN旅遊網</title>

</head>
<body>
	<h4>歡迎使用一般登入</h4>
	<div>
		<h5>加入會員</h5>
	</div>
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
				<button type="submit">送出</button>
	<?php
		if(isset($message)){
			echo "<div>$message</div>";
			header("Refresh: 2; url=index.php");
		}
	?>
			</div><br/>
	</form>
</body>
</html>