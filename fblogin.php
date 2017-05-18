<?php
	session_start();
	if(isset($_SESSION['USER'])){
        header("Location: index.php");
    }
	$code = $_GET['code'];
	$c_id = "288870768208521";
	$red_uri = "http://140.127.218.216:81/imfinal/fblogin.php";
	$c_sec = "61265d55198222e34d10c34346d6d4e6";
	$uri = "https://graph.facebook.com/oauth/access_token?client_id=".$c_id."&redirect_uri=".$red_uri."&client_secret=".$c_sec."&code=".$code;
	$cont = file_get_contents($uri);
	$acc_end = strpos($cont, "&");
	$acc = substr($cont, 13, $acc_end-13);
	$_SESSION["fb_acc"] = $acc;
	$exp = substr($cont, $acc_end+9);
	$uri = "https://graph.facebook.com/v2.6/me/?fields=name,email&access_token=".$acc;
	$user_info = file_get_contents($uri);
	$info = json_decode($user_info);
	$fb_id = $info->id;
	$fb_name = $info->name;
	if(!is_null($fb_id)){
		require_once("assect/db_config.php");
		session_start();
		$_SESSION["USER"] = $fb_id;
		$_SESSION["fb_name"] = $fb_name;
		$get_sql = "SELECT * FROM USER WHERE U_ID= '".$fb_id."'";
		$res = mysqli_query($link, $get_sql);
		if(mysqli_num_rows($res)==0){
			mysqli_close($link);
			header("Location: fbreg.php");
		}else{
			$set = mysqli_fetch_array($res, MYSQLI_ASSOC);
			$_SESSION["USER"] = $set['U_ID'];
			$_SESSION["U_NAME"] = $set['U_NAME'];
			$_SESSION["U_DEP"] = $set['D_CODE'];
			$_SESSION["E_YEAR"] = $set['U_ENROLL'];
			$sql = "SELECT * FROM CONFIG";
			$res = mysqli_query($link, $sql);
			while($info = mysqli_fetch_array($res, MYSQLI_ASSOC)){
				if($info['CON_TYPE']=='YEAR'){
					$_SESSION['C_YEAR'] = $info['CON_VALUE'];
				}elseif($info['CON_TYPE']=='HALF'){
					$_SESSION['C_HALF'] = $info['CON_VALUE'];
				}
			}
			mysqli_close($link);
			header("Location: index.php");
		}

	}
?>
