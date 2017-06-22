<?php
    session_start();
	require_once("db_config.php");
	if(isset($_POST['title'])){
		
		$id = $_POST['id'];
		$title = $_POST['title'];
		$type = $_POST['type'];
		$strt = $_POST['strt'];
		$end = $_POST['end'];
		$traf = $_POST['traf'];
		$schedule = $_POST['schedule'];
		$detail = $_POST['detail'];
		$price = $_POST['price'];
		$prc = $_POST['prc'];
		if($_FILES['pic']['error']==UPLOAD_ERR_OK){
		  	$fname='picture/tra_'.$id.'.jpg';
		  	move_uploaded_file($_FILES['pic']['tmp_name'],$fname);
		}
		$pic = $fname;
		$new_sql = "INSERT INTO travel VALUES('$id', '$title', '$type', '$strt', '$end', '$traf', '$schedule', '$detail', '$price', '$prc', '$pic')";
		if (mysqli_query($link, $new_sql)){
			$message = "輸入成功!!<br/>";
		}else{
			$message = "輸入失敗!!<br>".var_dump(mysqli_error($link));
		}
	}
    if(!(isset($_SESSION['U_ID']))&& ($_SESSION['U_ID']='manager')){
        header("Refresh: 0; url=manager_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>新增(後台管理)</title>
    <link rel="stylesheet" href="css/manager.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js/forfun.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>    
</head>

<body>

    <?php
		$sql = "select travel_id from travel order by travel_id DESC LIMIT 1";
		//抓最後一個ID
		$get = mysqli_query($link, $sql);
		$set = mysqli_fetch_array($get, MYSQLI_ASSOC);
		$lastID = $set['travel_id'];//sql result
		$newID = (int)$lastID + 1;
		$newID = sprintf('%03d', $newID);
	?>
<div class="message">   
	<?php
		if(isset($message)){
			echo "$message";
			header("Refresh: 2; url=travel_info_edit.php");
		}
	?>
</div>
<div class="abc"><a href="member_info.php"><button type="submit" class="account_manage">帳號管理</button></a></div><br>
                                    <div class="abc"><a href="opinion_info.php"><button type="submit" class="message_manage">留言管理</button></a></div><br>
                                    <div class="abc"><a href="travel_info_rw.php"><button type="submit" class="add">修改、刪除旅遊資訊</button></a></div>
                                    <div class="clear"></div>

<div class="wrapper">
    <div class="upload">    

        <form action="travel_info_edit.php" method="POST" ENCTYPE="multipart/form-data">
            
            <table>
            	<input type="hidden" name="id" value="<?php echo $newID?>">
                <tr>
                    <td>標題</td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>區域</td>
                    <td>
                        <select name="type" required="" id="type">
                            <option value='北部'>北部</option>
                            <option value='西部'>西部</option>
                            <option value='南部'>南部</option>
                            <option value='東部'>東部</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>出發日期</td>
                    <td>
                        <input type="date" required="" name="strt">
                    </td>
                </tr>
                <tr>
                    <td>結束日期</td>
                    <td>
                        <input type="date" required="" name="end">
                    </td>
                </tr>
                <tr>
                    <td>交通工具</td>
                    <td>
                       <select name="traf" required="" id="traf">
                            <option value='飛機'>飛機</option>
                            <option value='高鐵'>高鐵</option>
                            <option value='捷運'>捷運</option>
                            <option value='火車'>火車</option>
                            <option value='郵船'>遊船</option>
                            <option value='遊覽車'>遊覽車</option>
                            <option value='觀光巴士'>觀光巴士</option>
                        </select>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>行程簡述</td>
                    <td>
                        <textarea cols="30" rows="10" name="schedule" required=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td>詳細介紹</td>
                    <td>
                        <textarea cols="30" rows="10" name="detail" required=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td>價格</td>
                    <td>
                        <input type="text" name="price" required="">
                    </td>
                </tr>
                <tr>
                    <td>價格區間</td>
                    <td>
                       <select name="prc" required="" id="prc">                    
                            <option value='1'>3000以下</option>
                            <option value='2'>3000~5000</option>
                            <option value='3'>5000~7000</option>
                            <option value='4'>7000以上</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>上傳圖片</td>
                    <td>
                        <input type="file" name="pic" id="pic" required="" accept="image/*" class="choose_pic">
                    </td>
                </tr>
            </table>
            		<button type="submit" class="submit">送出</button>
        </form>
    </div>
    
</div>

</body>
</html>
