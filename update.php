<?php session_start();
	include("session1.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>更新留言板內容</title>
</head>
<body>
<h1>更新留言</h1>
<?php
include("board.php");
if(!isset($_SESSION['id']))
	die("請由清單挑選");
if($_SESSION['id']=='')
	die("請挑選更新項目");
$username=mysqli_real_escape_string($link,$_POST['username']);
$email=mysqli_real_escape_string($link,$_POST['email']);
$title1=mysqli_real_escape_string($link,$_POST['title1']);
$content=mysqli_real_escape_string($link,$_POST['content']);
$id=mysqli_real_escape_string($link, $_SESSION['id']);
$ip=$_SERVER['REMOTE_ADDR'];
$datetime=new Datetime("now", new DateTimeZone('Asia/Taipei'));
$posttime=$datetime->format('Y-m-d H:i:s');
$a="username='$username',email='$email',title1='$title1',";
$b="content='$content',ip='$ip',posttime='$posttime'";
$c=$a.$b;
$sql="update boardd set $c where id=$id";
mysqli_query($link,$sql) or die(mysqli_error($link));

?>
<script language=JavaScript>
window.alert('資料已經更新');
location.href='adminindex.php';
</script>
</body>
</html>