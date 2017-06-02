<!DOCTYPE html>
<html>
<head>
<meta http-quiva="content-type" content="text/html"; charset="utf-8">
	<title>新增留言版內容</title>
</head>
<body>
			<h1>新增留言</h1>
<?php

 $link=@mysqli_connect('140.127.218.156','travel','tra1043342','travel');
 
 if(!isset($_POST['username']))
 		die("請由表單輸入");
 if($_POST['username']=='')
 		die("請輸入姓名");
 $username=@$_POST['username'];
 $email=@$_POST['email'];
 $title1=@$_POST['title1'];
 $content=@$_POST['content'];
 $ip=$_SERVER['REMOTE_ADDR'];
 $datetime=new Datetime("now", new DateTimeZone('Asia/Taipei'));
 $posttime=$datetime->format('Y-m-d H:i:s');
 
 $sql2="INSERT INTO comment(comment_username,comment_email,comment_title,comment_content,comment_ip,comment_time) VALUES ('$username','$email','$title1','$content','$ip','$posttime');";

 mysqli_query($link,'SET NAMES utf8');
 mysqli_query($link,$sql2);
 mysqli_close($link);

?>
<script language=JavaScript>
	window.alert('資料新增了啦!');
	location.href='index1.php';
</script>
</body>
</html>