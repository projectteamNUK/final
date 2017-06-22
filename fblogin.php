<?php
    session_start();
    if(isset($_SESSION['USER'])){
        header("Location: index.php");
    }
    $code = $_GET['code'];
    $c_id = "288870768208521";
    $red_uri = "http://140.127.218.156/travel/fblogin.php";
    $c_sec = "61265d55198222e34d10c34346d6d4e6";
    $uri = "https://graph.facebook.com/oauth/access_token?client_id=".$c_id."&redirect_uri=".$red_uri."&client_secret=".$c_sec."&code=".$code;
    $cont = file_get_contents($uri);
    $acc = json_decode($cont);
    $acc_token = $acc->access_token;
    $_SESSION["fb_acc"] = $acc_token;
    $exp = $acc->expires_in;
    $uri = "https://graph.facebook.com/v2.6/me/?fields=name,email&access_token=".$acc_token;
    $user_info = file_get_contents($uri);
    $info = json_decode($user_info);
    $tra_id = $info->id;
    $tra_name = $info->name;
    $tra_email = $info->email;

	if(!is_null($tra_id)){
		require_once("db_config.php");
		session_start();
		$_SESSION["U_ID"] = $tra_id;
		$_SESSION["U_PWD"] = $tra_pwd;
		$_SESSION["U_NAME"] = $tra_name;
		$_SESSION["U_PHONE"] = $tra_phone;
		$_SESSION["U_EMAIL"] = $tra_email;
		$get_sql = "SELECT * FROM member WHERE member_id= '".$tra_id."'";
		$res = mysqli_query($link, $get_sql);
		if(mysqli_num_rows($res)==0){
			mysqli_close($link);
			header("Location: fbreg.php");
		}else{
			$set = mysqli_fetch_array($res, MYSQLI_ASSOC);
			$_SESSION["U_ID"] = $set['member_id'];
			$_SESSION["U_PWD"] = $set['member_pwd'];
			$_SESSION["U_NAME"] = $set['member_name'];
			$_SESSION["U_PHONE"] = $set['member_phone'];
			$_SESSION["U_EMAIL"] = $set['member_email'];
			mysqli_close($link);
			header("Location: index.php");
		}

	}
?>
