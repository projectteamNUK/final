<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>查看留言版內容</title>

</head>
<body>
<a href="insert.php">新增留言</a><br>
<?php
	include("board.php");
	$sql = "select comment_username,comment_email,comment_title,comment_content from comment";
	$sql2=mysqli_query($link , $sql);
	$rows=@mysqli_num_rows($sql2);
	if($rows==""){
		echo "查無資料! <br>";
	}
	else{
		echo "有 ".$rows." 筆資料喔! <br>";
		}
		while($list3=mysqli_fetch_assoc($sql2)){
			?>
		<table border="1" width="100%">
		<tr><td width="40%">
		留言者姓名:
		<?php
		if($list3['comment_email']!=""){

			?>
			<a href="mailto:<?php echo $list3['comment_email']; ?>">
			<?php echo $list3['comment_username']; ?></a>

			<?php }
			else
			{
				?>
			<?php echo $list3['comment_username']; ?>
			<?php
			} ?>
			</td><td width="60%">主題:
				<?php echo strip_tags($list3['comment_title']); ?></td>
			</tr><tr>
			<td column="2">
			<?php echo nl2br($list3['comment_content']); ?></td>
			</tr></table><br>
			<?php
			}
			
			mysqli_free_result($sql2);
			mysqli_close($link);




		




?>

</body>
</html>