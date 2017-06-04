<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>修改留言板內容</title>
</head>
<body>
	<h1>修改留言</h1>
<?php
session_start();
	$link= @mysqli_connect(
		'140.127.218.156',
		'travel',
		'tra1043342',
		'travel');
	mysqli_query($link,'SET NAMES utf8');
if(!isset($_GET['comment_id']))
	die("請由清單挑選");
if($_GET['comment_id']=='')
	die("請挑選更新項目");
	$id=strip_tags($_GET['comment_id']);
	$sql="select comment_username,comment_email,comment_title,comment_content from comment where comment_id=$id";
	$sql2=mysqli_query($link,$sql);
$_SESSION['comment_id']=$id;
$rows = mysqli_num_rows($sql2);
if($rows==""){
	die("查無資料!");
}
$list3=mysqli_fetch_array($sql2);
?>
<form method="post" action="update.php">姓名:
<input type="text" name="name"
	value="<?php echo $list3['comment_username']; ?>"><br>電子郵件:
<input type="text" name="email"
	value="<?php echo $list3['comment_email']; ?>"><br>留言主旨:
<input type="text" name="title"
	value="<?php echo $list3['comment_title']; ?>"><br><p>留言內容:
<textarea name="content" rows="5" cols="50">
<?php echo $list3['content']; ?> </textarea><br>
<input type="submit" name="submit" value="填完送出!">

</form>
</body>
</html>