<?php
    session_start();
    $mem_id = $_SESSION['U_ID'];
    require_once("db_config.php");
    // if (isset($_GET["id"])) {
    // 	$DELETE ="DELETE FROM member WHERE member_id=".$_GET["id"];
    // 	if(mysqli_query($link,$DELETE)){
    //     	mysql_close($link);
    //     	session_destroy();
    //     header("Location: login.php");
    // 	}
    // }
    if(isset($_POST['uname'])){
		$id = $_SESSION['U_ID'];
		$name = $_POST['uname'];
		$phone = $_POST['uphone'];
		$email = $_POST['uemail'];
		$new_sql = "UPDATE member SET member_name='$name', member_phone='$phone', member_email='$email' WHERE member_id='$id'";
		if (mysqli_query($link, $new_sql)){
			$message2 = "更新資料成功!!<br/>";
		}else{
			$message2 = "更新失敗!!請稍後再試";
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel="stylesheet" href="css/user.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</head>
<body background="\images\bg.png">
	
			<a href="#top" id="back_to_top">
			<img id="back_to_top_pic" src="http://4.bp.blogspot.com/-b7Ev7YbY1yw/VdmyzHNe1FI/AAAAAAAAAIE/CMcNxhnaDoc/s200/ScrollToTop-ARSDK.png" alt=""><br>
		</a>
			<div class="top">
			<img src="http://blog.asiayo.com/wp-content/uploads/2016/10/%E5%8D%97%E6%8A%95-1920x768.jpg" class="top_pic">
				<div class="logo"><a href="index.php"><h1 class="title_word"><span class="title_word_forfun">否放</span>旅遊網<br>We Travel , Just <span class="title_word_forfun">For Fun.</span></h1></a></div>
				<div class="title_li">
					<ul id="menu">
						<?php
							session_start();
								echo "<li>你好!".$_SESSION['U_NAME']."<br></li>";
								echo "<li><a href='logout.php'>登出</a></li>";
						?>
						<li><a href="#" id="l">簡介</a></li>
						<div class="login1">
 						   <div class="login-wrapper1">
 						        <h2>值得你信任的旅遊網-否放旅遊網</h2>
 						        <h3>成立理念</h3>
 						        <p>現今網路資訊發展越來越蓬勃，使用網路查詢資料已成為趨勢。
有些人外出旅遊卻苦惱於沒有想法，渴望有完整且有系統性的行程安排，因此，創造一個豐富的旅遊交流平台的理念便間接產生了否放旅遊網。</p>
 						        <h3>台灣旅遊</h3>
 						        <p>否放旅遊網為提供台灣旅遊相關資訊的網頁，有分為台灣北部、中部、南部、東部以及離島的旅遊行程規畫讓顧客去做查詢、選擇，並安排好完善的交通工具以及最公道合理的價格給消費者做抉擇的參考。
除此之外，旅遊的內容豐富多元，上山下海的行程應有盡有，不管顧客想要享受山林間的芬多精抑或是渴望海風的吹拂，甚至是傾向於人文藝術的薰陶渲染，涉及多元化的行程方案讓顧客去做最多元的選擇。</p>
 						        <h3>顧客需求</h3>
 						        <p>除了本團隊所提供的旅遊行程規畫給顧客選擇以外，我們開放每個旅遊行程的留言板交流區，讓顧客可以針對每次的旅遊做評論交流，也可以讓顧客藉由此留言板去對每個方案做詢問。
藉由這個留言板，我們可以去傾聽顧客的聲音，了解顧客對每次旅遊的看法理念及意見，吸收每個意見問題，當作養分去創造更高品質的旅遊方案。</p>
   							</div>
 						</div>
						<li><a href="arrange.php">行程安排</a></li>
						<li><a href="#">旅遊資訊</a>
							<ul>
								<li><a href="synopsis_n.php">北部</a></li>
								<li><a href="synopsis_w.php">西部</a></li>
								<li><a href="synopsis_e.php">東部</a></li>
								<li><a href="synopsis_s.php">南部</a></li>
							</ul>
						</li>
								<li><a href='member.php'>會員專區</a></li>;
								<li><a href='#'>聯絡我們</a></li>;
						<div class="login2">
 						   <div class="login-wrapper2">
								<div class="click"><p>　發表意見　</p></div>
								<div class="wrap">
									<div class=happy>主旨：<input type="text" name="" ><br></div>
									<div class=happy>意見內容：<textarea rows="15" cols="50" name="con1"></textarea></div><br>
									<button type="submit" class="submit">提交</button>
   								</div>
 							</div>
					</ul>
						<div class="clear"></div>	
					</div>
 					</div>
			</div>

			<div class="wrapper">
				<div class="user1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding2">
					<h1>會員資料</h1>
						<div class="user1content">
							<div class="user-photo">
								<?php
									session_start();
									require_once("db_config.php");
									$tra_id = $_SESSION["U_ID"];
									$tra_name = $_SESSION["U_NAME"];
									if (strlen($tra_id) < 15) {
										echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwx3XFW6qZsaqCpetRzX8KD1iEaSVQ265aQGq4foXJ2pMHOvUTZw'><br>";
									}else{
										echo "<img src='https://graph.facebook.com/$tra_id/picture?type=large'><br>";
									}
									$get_sql = "SELECT * FROM member WHERE member_id=$tra_id";
									$member_syn= mysqli_query($link, $get_sql);
									$set = mysqli_fetch_array($member_syn, MYSQLI_ASSOC);
									$_SESSION["U_PHONE"] = $set['member_phone'];
									$_SESSION["U_EMAIL"] = $set['member_email'];
									// while ($member = mysqli_fetch_array($member_syn,MYSQLI_ASSOC)){
									// 			echo "帳號：".$member['member_name']."<br>";
									// 			echo "電話：".$member['member_phone']."<br>";
									// 			echo "信箱：".$member['member_email']."<br>";

									// }
								?>
							</div>
							<div class="user-information">
							<form action="member.php" method="POST">
							<label>名字</label>
								<?php 
									$name = $_SESSION["U_NAME"];
									echo "<input id='uname' type='text' name='uname' value='$name'>"."<br>";
								?>
							<label>電話</label>
								<?php 
									$phone = $_SESSION["U_PHONE"];
									echo "<input id='uphone' type='text' name='uphone' value='$phone'>"."<br>";
								?>
							<label>信箱</label>
								<?php 
									$email = $_SESSION["U_EMAIL"];
									echo "<input id='uemail' type='text' name='uemail' value='$email'>";
								?>
							<button type="submit" class="alter-user-information-submit">修改</button>
							</form>
								<?php
									if(isset($message2)){
									echo "<div>$message2</div>";
									header("Refresh: 2; url=member.php");
									}
								?>
								<!-- <h4>刪除會員資料</h4>
							<div>
								<a href="member.php?id=<?php echo "$tra_id" ?>">確定刪除</a>
							</div> -->
							</div>
													<div class="clear"></div>	
						</div>
						<!-- <div class="clear"></div>		 -->
				</div>	

		<div class="fff">	
							<h1>我的最愛</h1>
							<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding1">
				<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding2">
			<ul>
				<li>
				<div class="travel_information">
					<?php
						session_start();
    					$mem_id = $_SESSION['U_ID'];
    				    require_once("db_config.php");
						$get_sql = "SELECT travel.*, favorite.favarite_id, favorite.member_id from travel left join favorite on travel.travel_id = favorite.travel_id where favorite.member_id = $mem_id  order by travel_type";
    				    $data = mysqli_query($link, $get_sql);
						for($i=1;$i<=mysqli_num_rows($data);$i++){ 
							$rs=mysqli_fetch_row($data);
					?>
					<div class="travel_pic">
					<img src='<?php echo $rs[10]?>' alt=''>
					</div>
					<div class="travel_word">

						<h2><?php echo $rs[1]?></h2>

						<p>出發日期：<?php echo $rs[3]?></p>
						<p>結束日期：<?php echo $rs[4]?></p>
						<p>交通方式：<?php echo $rs[5]?></p>
						<p>旅遊行程：<?php echo $rs[6]?></p>
						<p class="price">團費：<span>NT$<?php echo $rs[8]?>起</span></p>
					</div>
					<div class="clear"></div>
					<?php }?>
				</div>	
				</li>
			</ul>
</div>
				<div class="clear"></div>

			</div>





	<div class="footer">
		<div class="footer_word"><p><br>For Fun旅遊網<br>拜託PHP讓我過<br>資料、圖片皆來自鳳凰旅行社<br>	期末專題用<br>若造成任何人的不便<br>會立即撤下</p>
		</div>
	</div>
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
</html>