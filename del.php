
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>刪除留言板內容</title>
</head>
<body>
<h1>刪除留言</h1>
<?php
session_start();
	$link= @mysqli_connect(
		'140.127.218.156',
		'travel',
		'tra1043342',
		'travel');
	mysqli_query($link,'SET NAMES utf8');

$id=mysqli_real_escape_string($link, $_GET['comment_id']);
$sql="delete from comment where comment_id=$id";
mysqli_query($link,$sql) or die(mysqli_error($link));
?>
<script language=JavaScript>
	window.alert('資料已刪除');
	location.href='adminindex.php';
</script>

</body>
</html>