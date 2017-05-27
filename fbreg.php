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
		$new_sql = "INSERT INTO member VALUES('$id', '$name', '$phone', '$email')";
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
	<h4>歡迎使用Facebook登入</h4>
	<?php
		$tra_id = $_SESSION["U_ID"];
		$tra_name = $_SESSION["U_NAME"];
		echo "<img class='responsive-img circle' src='https://graph.facebook.com/$tra_id/picture?type=large'>.<br>";
		echo "$tra_name";
	?>
	<div>
		<h5>加入會員</h5>
	</div>
	<form action="fbreg.php" method="POST">
			<div>
			<label>名字</label>
			<?php 
				$name = $_SESSION["U_NAME"];
				echo "<input id='uname' type='text' name='uname' value='$name'>";
			?>
			</div>
			<div>
			<label>電話</label>
			<?php 
				echo "<input id='uphone' type='text' name='uphone' value='$phone'>";
			?>
			</div>
			<div>
			<label>信箱</label>
			<?php 
				echo "<input id='uemail' type='text' name='uemail' value='$email'>";
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