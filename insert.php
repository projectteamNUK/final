<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-quiva="content-type" content="text/html"; charset="utf-8">
	<title>新增留言版內容</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<style>
 .container{
  margin:auto;
  background-color:#f5f5f5;
  width:800px;
  padding-bottom: 20px;
 }
 .button{
  text-align:center;
  padding:20px 0;
 }
 .top h3{
  font-family:微軟正黑體;
  text-align:center;
  padding:10px 0;
 }
 .form-group{
  font-family:微軟正黑體;
  font-size:16px;
 }
</style>
<body>
<div class="container">
	<div class="top">
		<h3>新增留言</h3>
		</div>
	<form id="form1" name="form1" method="post" action="add1.php" class="form-horizontal">
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label">姓名: </label>
			<div class="col-sm-6">
			<input type="text" class="form-control" placeholder="您的姓名" name="username" id="username" />
			</div>
		</div>
		<div class="form-group">
				<label for="email" class="col-sm-4 control-label">信箱 : </label>
				<div class="col-sm-6">
                <input type="text" class="form-control" placeholder="您的信箱" name="email" id="email" />
            </div>
        </div>
		<div class="form-group">
            <label for="title1" class="col-sm-4 control-label">留言主旨：</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="title1" id="title1" />
            </div>
        </div>
		<div class="form-group">
          <label for="content" class="col-sm-4 control-label">留言內容：</label>
          <div class="col-sm-6">
              <textarea name="content" class="form-control" id="content" rows="5"></textarea>
          </div>
        </div>

<div class="button">
<input type="submit" name="submit" id="button" value="填完送出!" class="btn"/>
</div>
</form>

</div>
</body>
</html>