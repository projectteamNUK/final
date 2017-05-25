<html>
<head>
<title>討論區</title>
</head>
<body>
<?php
/* 連接資料庫 */
$link=@mysqli_connect("localhost","root","a1043323");
mysqli_select_db("board");
if(!$link){
	echo "連接錯誤訊息 ".mysqli_connect_error()."<br>";
	exit();
}
mysqli_query($link,'SET NAMES utf8');
?>
</body>
</html>