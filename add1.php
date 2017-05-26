<!DOCTYPE html>
<html>
<head>
<meta http-quiva="content-type" content="text/html"; charset="utf-8">
	<title>新增留言版內容</title>
</head>
<body>
			<h1>新增留言</h1>
<?php

 $link=@mysqli_connect('localhost','root','a1043323','test1');
 
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
 
 $sql2="INSERT INTO boardd(username,email,title1,content,ip,posttime) VALUES ('$username','$email','$title1','$content','$ip','$posttime');";

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