<?php
    session_start();
        require_once("db_config.php");
    if(!isset($_SESSION['U_ID'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FOR FUN 旅遊網</title>
</head>
<body>
<table>
		<div>
			<tr>
				<td><a href="introduction.php">簡介</a></td>
				<td><a href="arrange.php">行程安排</a></td>
				<td><a href="synopsis.php">旅遊資訊</a></td>
				<td><a href="member.php">會員專區</a></td>
				<td>聯絡我們</td>
			</tr>
		</div>
</table>
</body>
</html>