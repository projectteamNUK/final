<?php session_start();
	include("session1.php");
?><!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>修改留言板內容</title>
</head>
<body>
	<h1>修改留言</h1>
<?php
include("board.php");
if(!isset($_GET['id']))
	die("請由清單挑選");
if($_GET['id']=='')
	die("請挑選更新項目");
	$id=strip_tags($_GET['id']);
	$sql="select comment_username,comment_email,comment_title,comment_content from comment where comment_id=$id";
	$sql2=mysqli_query($link,$sql);
$_SESSION['id']=$id;
$rows = mysqli_num_rows($sql2);
if($rows==""){
	die("查無資料!");
}
$list3=mysqli_fetch_array($sql2);
?>
<form method="post" action="update.php">姓名:
<input type="text" name="username"
	value="<?php echo $list3['comment_username']; ?>"><br>電子郵件:
<input type="text" name="email"
	value="<?php echo $list3['comment_email']; ?>"><br>留言主旨:
<input type="text" name="title1"
	value="<?php echo $list3['comment_title']; ?>"><br><p>留言內容:
<textarea name="content" rows="5" cols="50">
<?php echo $list3['content']; ?> </textarea><br>
<input type="submit" name="submit" value="填完送出!">

</form>
</body>
</html>