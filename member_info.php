 <?php
 	session_start();
 	require_once("db_config.php");
    if (isset($_GET["id"])) {
    	$DELETE ="DELETE FROM member WHERE member_id=".$_GET["id"];
    	if(mysqli_query($link,$DELETE)){
        	mysql_close($link);
        header("Location: member_info.php");
    	}
    }
	if(!(isset($_SESSION['U_ID']))&& ($_SESSION['U_ID']='manager')){
		header("Refresh: 0; url=manager_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>帳號管理</title>
	<link rel="stylesheet" href="css/member_info.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
		<meta charset="UTF-8">
</head>
<body background="\images\bg.png">
										<div class="abc"><a href="opinion_info.php"><button type="submit" class="account_manage">留言管理</button></a></div><br>
									<div class="abc"><a href="travel_info_edit.php"><button type="submit" class="message_manage">新增旅遊資訊</button></a></div><br>
									<div class="abc"><a href="travel_info_rw.php"><button type="submit" class="add">修改、刪除旅遊資訊</button></a></div>
									<div class="clear"></div>
			<a href="#top" id="back_to_top">
			<img id="back_to_top_pic" src="http://4.bp.blogspot.com/-b7Ev7YbY1yw/VdmyzHNe1FI/AAAAAAAAAIE/CMcNxhnaDoc/s200/ScrollToTop-ARSDK.png" alt=""><br>
		</a>
		<?php
			require_once("db_config.php");
			$get_sql = "SELECT member. * FROM member ORDER BY member_pwd =  ''";
			$data= mysqli_query($link, $get_sql);
				for($i=1;$i<=mysqli_num_rows($data);$i++){
					$rs=mysqli_fetch_row($data);
		?>
					<ul>		
						<li>
							<div class="travel_information">
								<div class="travel_pic">
		<?php
			if (strlen($rs[0]) < 15) {
				echo "<img src='picture/head.png' width='225px' height='225px'><br>";
			}else{
				echo "<img src='https://graph.facebook.com/$rs[0]/picture?type=large'><br>";
			}
		?>
								</div>
								<div class="travel_word">
		<p>姓名：<?php echo $rs[2]?></p>
		<p>電話：<?php echo $rs[3]?></p>
		<p>信箱：<?php echo $rs[4]?></p>
<a href="member_info.php?id=<?php echo $rs[0] ?>"><button type="button" class="delete_information">確定刪除</button></a>	
							
								</div>
							<div class="clear"></div>	

							</div>
							</li>
			</ul>
	<?php }?>	
</div>

			</div>





	<div class="footer">
		<div class="footer_word"><p><br>For Fun旅遊網<br>拜託PHP讓我過<br>資料、圖片皆來自鳳凰旅行社<br>	期末專題用<br>若造成任何人的不便<br>會立即撤下</p>
		</div>
	</div>
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
</html>