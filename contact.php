<?php
	session_start();
    $mem_id = $_SESSION['U_ID'];
    require_once("db_config.php");
    if (isset($_POST['content'])) {
        $type = $_POST["type"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $contact = $mem_id.time();

        $sql ="INSERT INTO contact VALUES ('$contact','$mem_id','$type','$title','$content')";
		if (mysqli_query($link, $sql)){
			$message2 = "成功提交意見!!<br/>";
		}else{
			$message2 = "提交意見失敗!!請稍後再試".var_dump(mysqli_error($link));
		}
		$redir = $_POST['page'];
		if($redir == 0){
			header("Refresh: 1; url=index.php");
		}else if($redir == 1){
			header("Refresh: 1; url=synopsis_n.php");
		}else if($redir == 2){
			header("Refresh: 1; url=synopsis_w.php");
		}else if($redir == 3){
			header("Refresh: 1; url=synopsis_e.php");
		}else if($redir == 4){
			header("Refresh: 1; url=synopsis_s.php");
		}else if($redir == 5){
			header("Refresh: 1; url=member.php");
		}else if($redir == 6){
			header("Refresh: 1; url=arrange.php");
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>收到囉</title>
		 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 		<script src="js/forfun.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	<link rel="stylesheet" href="css/contact.css">


</head>
<body>
	<div class="msg">
		<p><?php echo $message2;?></p>
	</div>
</body>
</html>