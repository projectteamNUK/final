

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>更新留言板內容</title>
</head>
<body>
<h1>更新留言</h1>
<?php
session_start();
	$link= @mysqli_connect(
		'140.127.218.156',
		'travel',
		'tra1043342',
		'travel');
	mysqli_query($link,'SET NAMES utf8');
if(!isset($_SESSION['comment_id']))
	die("請由清單挑選");
if($_SESSION['comment_id']=='')
	die("請挑選更新項目");
$username=mysqli_real_escape_string($link,$_POST['name']);
$email=mysqli_real_escape_string($link,$_POST['email']);
$title1=mysqli_real_escape_string($link,$_POST['title']);
$content=mysqli_real_escape_string($link,$_POST['content']);
$id=mysqli_real_escape_string($link, $_SESSION['comment_id']);
$datetime=new Datetime("now", new DateTimeZone('Asia/Taipei'));
$posttime=$datetime->format('Y-m-d H:i:s');
$a="comment_username='$username',comment_email='$email',comment_title='$title',";
$b="comment_content='$content',comment_time='$posttime'";
$c=$a.$b;
$sql="update comment set $c where comment_id=$id";
mysqli_query($link,$sql) or die(mysqli_error($link));

?>
<script language=JavaScript>
window.alert('資料已經更新');
location.href='adminindex.php';
</script>
</body>
</html>