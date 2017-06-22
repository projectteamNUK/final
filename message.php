<?php
	session_start();
	$tra_id = $_SESSION["U_ID"];
		$tra_name = $_SESSION["U_NAME"];
	require_once("db_config.php");
	if(isset($_POST['uname'])){
		$name = $_POST['uname'];
		$email = $_POST['uemail'];
		$umessage = $_POST['umessage'];
		$new_sql = "INSERT INTO message VALUES('1','$name', '$email', '$umessage')";
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
	<title></title>
</head>
<body>
<h4>留言板</h4>
<form action="message.php" method="POST">
			<div>
			<label for="uname">名字</label>
			<?php 
				$name = $_SESSION["U_NAME"];
				echo "<input id='uname' type='text' name='uname' value='$name'>";
			?>
			</div>
			<div>
			<label for="uname">信箱</label>
			<?php 
				$email = $_SESSION["U_EMAIL"]
				echo "<input id='uemail' type='text' name='uemail' value='$email' >";
			?>
			</div>
			<div>
			<label for="umessage">我有話要說</label>
			<?php
				echo "<input id='umessage' type='text' name='umessage' value='$umessage' >";
			?>
			</div>

			<div>
				<button type="submit">送出</button>
				<?php
				if(isset($message)){
					echo "<div>$message</div>";
				}
				?>
			</div>
</body>
</html>