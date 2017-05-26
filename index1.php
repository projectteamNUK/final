<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<title>查看留言版內容</title>

</head>
<body>
<a href="insert.php">新增留言</a><br>
<?php
	include("board.php");
	$sql = "select username,email,title1,content from boardd";
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
		if($list3['email']!=""){

			?>
			<a href="mailto:<?php echo $list3['email']; ?>">
			<?php echo $list3['username']; ?></a>

			<?php }
			else
			{
				?>
			<?php echo $list3['username']; ?>
			<?php
			} ?>
			</td><td width="60%">主題:
				<?php echo strip_tags($list3['title1']); ?></td>
			</tr><tr>
			<td column="2">
			<?php echo nl2br($list3['content']); ?></td>
			</tr></table><br>
			<?php
			}
			
			mysqli_free_result($sql2);
			mysqli_close($link);




		




?>

</body>
</html>