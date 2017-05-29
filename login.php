<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登入留言板管理介面</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<style>
 *{
  padding:0;
  margin:0;
 }
 .container{
  padding:20px 0;
        background-color:#f5f5f5;
        width:800px;
 }
 h2{
  font-family:微軟正黑體;
  padding:0 0 20px 0;
 }
 .btn{
  font-size:20px;
  font-family:微軟正黑體;
 }
 .respond{
  text-align:center;
  padding:20px 0;
  font-family:微軟正黑體;
  font-size:20px;
 }
</style>
</head>
<body>
<div class="container">
		<h2 align="center">否放管理員登入專區</h2>
<form class="form-horizontal" role="form" id="form1" name="form1" action="pass.php" method="post">
	<div class="form-group">
		<label class="control-label col-sm-4" for="loginname">
		登入帳號:</label>
		<div class="col-sm-4">
		<input type="text" class="form-control" id="loginname" placeholder="Enter loginname" name="loginname"></div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-4" for="password1">
		登入密碼:</label>
		<div class="col-sm-4">
		<input type="password" class="form-control" id="password1" placeholder="Enter password" name="password1"></div>
	</div>
	
	<div>
		<div align="center" style="padding-top:30px">
	<input type="submit" name="submit" class="btn" id="submit" value="送出">
	<input type="reset" name="clear" class="btn" id="clear" value="清除">

</form>


</body>
</html>