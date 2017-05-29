<?php session_start();
	include("session1.php");
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>管理端查看留言板內容</title>
</head>
<body>
<a href="insert.php">新增留言唷</a><br>
<?php
	include("board.php");
	$sql="select id,username,email,title1,content from boardd";
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
if ($list3['email']!="")
{ ?>
<a href="mailto:<?php echo $list3['email']; ?>">
<?php echo $list3['username']; ?></a><?php  }
else
{ ?>
<?php echo $list3['username']; ?>

<?php
} ?>
</td><td width="60%">主題: <?php echo strip_tags($list3['title1']);?></td>
	</tr><tr>
<td colspan="2"><?php echo nl2br($list3['content']); ?></td>
</tr><tr>
<td><a href="edit.php?id=<?php echo $list3['id'];  ?>">編輯</a>
</td><td>
<a href="del.php?id=<?php echo $list3['id'];  ?>"
onclick="if(!confirm('注意:刪除後，無法救回喔!請再次確認是否刪除?')){return false;}">刪除</a>
</td></tr></table><br>
<?php
}

mysqli_free_result($sql2);
mysqli_close($link);

?>

</body>
</html>