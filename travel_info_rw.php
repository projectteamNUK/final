<?php
	session_start();
	require_once("db_config.php");
	if (isset($_GET["id"])) {
    	$DELETE ="DELETE FROM travel WHERE travel_id=".$_GET["id"];
    	if (mysqli_query($link,$DELETE)) {
    		mysqli_close($link);
    		$message = "刪除資料成功!!<br/>";
		}else{
			$message = "刪除失敗!!請稍後再試!!";
		}
    }
    if(isset($_POST['r1'])){
    	$r0 = $_POST['r0'];
		$r1 = $_POST['r1'];
		$r2 = $_POST['r2'];
		$r3 = $_POST['r3'];
		$r4 = $_POST['r4'];
		$r5 = $_POST['r5'];
		$r6 = $_POST['r6'];
		$r7 = $_POST['r7'];
		$r8 = $_POST['r8'];
		$r9 = $_POST['r9'];
		$new_sql = "UPDATE travel SET travel_name='$r1', travel_type='$r2', travel_date='$r3', travel_endtime='$r4', travel_traffic='$r5', travel_schedule='$r6', travel_detail='$r7', travel_price='$r8', travel_prcnum='$r9' WHERE travel_id='$r0'";
		if (mysqli_query($link, $new_sql)){
			$message2 = "更新資料成功!!<br/>";
		}else{
			$nmessage2 = "更新失敗!!請稍後再試".var_dump(mysqli_error($link));
		}
    }
	if(!(isset($_SESSION['U_ID'])) && ($_SESSION['U_ID']='manager')){
		header("Refresh: 0; url=manager_login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改、刪除(後台管理)</title>
	<link rel="stylesheet" href="css/manager_modify.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>	
</head>
<body>
									<div class="abc"><a href="member_info.php"><button type="submit" class="account_manage">帳號管理</button></a></div><br>
									<div class="abc"><a href="opinion_info.php"><button type="submit" class="message_manage">留言管理</button></a></div><br>
									<div class="abc"><a href="travel_info_edit.php"><button type="submit" class="add">新增旅遊資訊</button></a></div>
									<div class="clear"></div>
		<div class="wrapper">

				<ul>		
					<li>
						<?php
							if(isset($message)){
								// echo "$message";
								header("Refresh: 0; url=travel_info_rw.php");
							}
							$mem_id = $_SESSION['U_ID'];
							$get_sql = "SELECT travel.* from travel order by travel_id DESC";
						    $data = mysqli_query($link, $get_sql);
							for($i=1;$i<=mysqli_num_rows($data);$i++){ 
								$rs=mysqli_fetch_row($data);
						?>
							<div class="travel_information">

								<div class="travel_pic">
									<a href=""><img src="<?php echo $rs[10]?>" alt=""></a>
								</div>
								<div class="travel_word">
									<form action="travel_info_rw.php" id="usrform" method="POST">
									<input type="hidden" name="r0" value="<?php echo $rs[0]?>">
										<label>標題：</label>
										<?php 
											$a = $rs[1];
											echo "<input id='r1' type='text' name='r1' value='$a' required=''>"."<br>";
										?>
										<label>地區：</label>
								            <select name="r2" required="" id="r2">
								            <?php 
								            	echo ($rs[2]=="北部")?("<option value='北部' selected>北部</option>"):("");
								            	echo($rs[2]=="西部")?("<option value='西部' selected>西部</option>"):("");
								            	echo($rs[2]=="南部")?("<option value='南部' selected>南部</option>"):("");
								            	echo($rs[2]=="東部")?("<option value='東部' selected>東部</option>"):("");
								            ?>
								                <option value='北部'>北部</option>
								                <option value='西部'>西部</option>
								                <option value='南部'>南部</option>
								                <option value='東部'>東部</option>
								            </select>
										<br><label>出發日期：</label>
										<?php 
											$c = $rs[3];

											echo "<input id='r3' type='date' name='r3' value='$c' required=''>"."<br>";
										?>
										<label>結束日期：</label>
										<?php 
											$d = $rs[4];
											echo "<input id='r4' type='date' name='r4' value='$d' required=''>"."<br>";
										?>
										<label>交通方式：</label>
								          	<select name="r5" required="" id="r5">
								            <?php 
								            	echo ($rs[5]=="飛機")?("<option value='飛機' selected>飛機</option>"):("");
								            	echo($rs[5]=="高鐵")?("<option value='高鐵' selected>高鐵</option>"):("");
								            	echo($rs[5]=="捷運")?("<option value='捷運' selected>捷運</option>"):("");
								            	echo($rs[5]=="火車")?("<option value='火車' selected>火車</option>"):("");
								            	echo($rs[5]=="郵船")?("<option value='郵船' selected>郵船</option>"):("");
								            	echo($rs[5]=="遊覽車")?("<option value='遊覽車' selected>遊覽車</option>"):("");
								            	echo($rs[5]=="觀光巴士")?("<option value='觀光巴士' selected>觀光巴士</option>"):("");
								            ?>
								                <option value='飛機'>飛機</option>
								                <option value='高鐵'>高鐵</option>
								                <option value='捷運'>捷運</option>
								                <option value='火車'>火車</option>
								                <option value='郵船'>遊船</option>
								                <option value='遊覽車'>遊覽車</option>
								                <option value='觀光巴士'>觀光巴士</option>
								            </select><br>
										<label>旅遊行程：</label>
										<textarea rows="4" cols="50" name="r6" required=""><?php echo "$rs[6]";?></textarea>
										<label>旅遊細節：</label>
										<textarea rows="4" cols="50" name="r7" required=""><?php echo "$rs[7]";?></textarea>
										<label>團費：</label>
										<?php 
											$h = $rs[8];
											echo "<input id='r8' type='text' name='r8' value='$h' required=''>";
										?>
										<label>價格區間:</label>
										    <select name="r9" required="" id="r9"> 
										    <?php 
								            	echo ($rs[9]=="1")?("<option value='1' selected>3000以下</option>"):("");
								            	echo($rs[9]=="2")?("<option value='2' selected>3000~5000</option>"):("");
								            	echo($rs[9]=="3")?("<option value='3' selected>5000~7000</option>"):("");
								            	echo($rs[9]=="4")?("<option value='4' selected>7000以上</option>"):("");
								            ?> 
								                <option value='1'>3000以下</option>
								                <option value='2'>3000~5000</option>
								                <option value='3'>5000~7000</option>
								                 <option value='4'>7000以上</option>
								            </select><br>
								  <button type="submit" class="modify_information">確定修改</button>	
								  </form>	
								  <a href="travel_info_rw.php?id=<?php echo $rs[0] ?>"><button type="button" class="delete_information">確定刪除</button></a>							
								</div>
							<div class="clear"></div>

							</div>
						</li>
				</ul>
						<?php }?>	
		</div>		
</body>
</html>