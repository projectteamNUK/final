<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>管理端查看留言板內容</title>
</head>
<body>
<a href="insert.php">新增留言唷</a><br>
<?php
	
	session_start();
	$link= @mysqli_connect(
		'140.127.218.156',
		'travel',
		'tra1043342',
		'travel');
	mysqli_query($link,'SET NAMES utf8');
	if(isset($_SESSION['login_username'])){
	$sql="select comment_id,member_id,comment_username,comment_email,comment_title,comment_content from comment";
	$sql2=mysqli_query($link,$sql);
	$rows=mysqli_num_rows($sql2);
if($rows==""){
	echo "查無資料!";
}
else{ echo "有".$rows."筆資料喔! <br>";}
while($list3=mysqli_fetch_array($sql2)){
?>
<table border="1" width="100%">
<tr><td width="40%">
留言者姓名:
<?php
if ($list3['comment_email']!="")
{ ?>
<a href="mailto:<?php echo $list3['comment_email']; ?>">
<?php echo $list3['comment_username']; ?></a><?php  }
else
{ ?>
<?php echo $list3['comment_username']; ?>

<?php
} ?>
</td><td width="60%">主題: <?php echo strip_tags($list3['comment_title']);?></td>
	</tr><tr>
<td colspan="2"><?php echo nl2br($list3['comment_content']); ?></td>
</tr><tr>
<td><a href="edit.php?id=<?php echo $list3['comment_id'];  ?>">編輯</a>
</td><td>
<a href="del.php?id=<?php echo $list3['comment_id'];  ?>"
onclick="if(!confirm('注意:刪除後，無法救回喔!請再次確認是否刪除?')){return false;}">刪除</a>
</td></tr></table><br>
<?php
}

mysqli_free_result($sql2);
mysqli_close($link);
}
?>

</body>
</html>