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
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$new_sql = "INSERT INTO member VALUES('$id', '$name', '$phone', '$email')";
		if (mysqli_query($link, $new_sql)){
			$final_msg = "設定成功!系統將自動回到首頁<br/>";
			$_SESSION['USER'] = $id;
			$_SESSION["U_NAME"] = $name;
			$_SESSION["U_PHONE"] = $phone;
			$_SESSION["U_EMAIL"] = $email;
			$res = mysqli_query($link, $sql);
		}else{
			$final_msg = "設定失敗!請聯繫系統管理員或稍後再試";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>幹你娘旅遊網</title>

</head>
<body>
	<h4>歡迎使用Facebook登入</h4>
	<?php
		$tra_id = $_SESSION["U_ID"];
		$tra_name = $_SESSION["U_NAME"];
		echo "<img class='responsive-img circle' src='https://graph.facebook.com/$tra_id/picture?type=large'>";
		echo "<p id='shname'>$tra_name</p>";
	?>
	<div>
		<h5>設定基本資料</h5>
	</div>
	<form action="fbreg.php" method="POST" name="f" onsubmit="return check();">
			<div>
			<label for="uname">名字</label>
			<?php 
				$name = $_SESSION["U_NAME"];
				echo "<input id='uname' type='text' class='validate' name='uname' value='$name' required='' onkeyup='setn()'>";
			?>
			</div>

			<div>
				<button class="btn waves-light" type="submit">送出</button>
			</div><br/>
	</form>
</body>
</html>