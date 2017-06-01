<?php
    session_start();
        require_once("db_config.php");
    if (isset($_GET["id"])) {
    	$DELETE ="DELETE FROM member WHERE member_id=".$_GET["id"];
    	if(mysqli_query($link,$DELETE)){
        	mysql_close($link);
        	session_destroy();
        header("Location: login.php");
    	}
    }
    if(isset($_POST['uname'])){
		$id = $_SESSION['U_ID'];
		$name = $_POST['uname'];
		$phone = $_POST['uphone'];
		$email = $_POST['uemail'];
		$new_sql = "UPDATE member SET member_name='$name', member_phone='$phone', member_email='$email' WHERE member_id='$id'";
		if (mysqli_query($link, $new_sql)){
			$message = "更新資料成功!!<br/>";
		}else{
			$message = "更新失敗!!請稍後再試";
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FOR FUN - 會員專區</title>
</head>
<body>
<h3>會員專區</h3>
	<div>
	<?php
		session_start();
		$tra_id = $_SESSION["U_ID"];
		$tra_name = $_SESSION["U_NAME"];
		echo "歡迎回來!!"."$tra_name"."<br>";
		echo "下列是你的基本資料"."<br>";
				if (strlen($tra_id) < 15) {
					echo "<img class='responsive-img circle' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwx3XFW6qZsaqCpetRzX8KD1iEaSVQ265aQGq4foXJ2pMHOvUTZw'><br>";
				}else{
					echo "<img class='responsive-img circle' src='https://graph.facebook.com/$tra_id/picture?type=large'><br>";
				}
		require_once("db_config.php");
				$get_sql = "SELECT * FROM member WHERE member_id=$tra_id";
				$member_syn= mysqli_query($link, $get_sql);
				while ($member = mysqli_fetch_array($member_syn,MYSQLI_ASSOC)){
							echo "帳號：".$member['member_name']."<br>";
							echo "電話：".$member['member_phone']."<br>";
							echo "信箱：".$member['member_email']."<br>";

				}
	?>
<h4>更改會員資料</h4>
	<form action="member.php" method="POST">
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
				$phone = $_SESSION["U_PHONE"];
				echo "<input id='uphone' type='text' name='uphone' value='$phone'>";
			?>
			</div>
			<div>
			<label>信箱</label>
			<?php 
				$email = $_SESSION["U_EMAIL"];
				echo "<input id='uemail' type='text' name='uemail' value='$email'>";
			?>
			</div>

			<div>
				<button type="submit">送出</button>
			</div>

		<?php
			if(isset($message)){
				echo "<div>$message</div>";
				header("Refresh: 2; url=member.php");
			}
		?>
	</form>
<h4>刪除會員資料</h4>
	<div>
		<a href="member.php?id=<?php echo "$tra_id" ?>">確定刪除</a>
	</div>
	<div>
		<a href="index.php">回到首頁</a>
	</div>
</body>
</html>