<?php ob_start();
	session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>登入資料檢查</title>
</head>
<body>
<?php
	if(!isset($_POST['loginname'])){
		?>
	<script>
		window.alert('搞毛啊，請至表單網頁輸入帳號');
		location.href='./login.php';
	</script><?php
	}
	if(!isset($_POST['password1']))
	{	?>
	<script>
		window.alert('搞毛啊，請至表單網頁輸入密碼');
		location.href='./login.php';
	</script>
	<?php
	}
	if($_POST['loginname']=="")
	{	?>
	<script>
		window.alert('請輸入帳號');
		history.back();
	</script>
	<?php
	}
	if($_POST['password1']=="")
	{	?>
	<script>
		window.alert('請輸入密碼');
		history.back();
	</script>
	<?php
	}
	include("board.php");
	$loginname=mysqli_real_escape_string($link,$_POST['loginname']);
	$userpassword=mysqli_real_escape_string($link,$_POST['password1']);
	$login0="SELECT * FROM login WHERE username='$loginname'";
	$login1=" and password='$userpassword'";
	$logincheck=$login0.$login1;
	$sql=mysqli_query($link,$logincheck);
	$rows = @mysqli_num_rows($sql);
	if($rows==""){

	?>
	<script language="JavaScript">
	alert("沒有這個帳號，請重新輸入");
	history.back();
	</script>
	<?php
	}
	else
	{
		$list=mysqli_fetch_assoc($sql);
		$_SESSION["username"]=$list['username'];
		header("Location:./adminindex.php");
	}
	?>







</body>
</html>