<?php
	require_once("db_config.php");
	if (isset($_GET['id'])) {
		$sql ="SELECT travel.* FROM travel WHERE travel_id=".$_GET["id"];
		$data= mysqli_query($link, $sql);
		$travel = mysqli_fetch_array($data,MYSQLI_ASSOC);
		$a = $travel['travel_name'];
		$b = $travel['travel_date'];
		$c = $travel['trvavel_endtime'];
		$d = $travel['travel_traffic'];
		$e = $travel['travel_schedule'];
		$f = $travel['travel_price'];
		$g = $travel['travel_path'];
		$h = $travel['travel_detail'];
	}
	if(isset($_POST['uid'])){
		$id = $_POST['uid'];
		$pwd = $_POST['upwd'];
		$arrange = "SELECT * FROM member WHERE member_email= '$id' and member_pwd='$pwd' ";
		$res=mysqli_query($link, $arrange);
		if (mysqli_num_rows($res)!=0){
			$message = "登入成功!歡迎進入FOR FUN 旅遊網<br/>";
			$set = mysqli_fetch_array($res, MYSQLI_ASSOC);
			session_start();
			$_SESSION['U_ID'] = $set['member_id'];
			$_SESSION['U_NAME'] = $set['member_name'];
		}else{
			$message = "登入失敗!請確認帳號密碼是否正確";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel="stylesheet" href="css/travel_information.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>

	<script type="text/javascript">
	$(function(){
		var $block = $('#sixpic_pic');
		
		// 幫 .mask 加上透明度
		$block.find('.box .mask').css('opacity', .6);
		// 當滑鼠移到小圖片時
		$block.find('ul li img').mouseover(function(){
			var $this = $(this);
			
			// 把小圖的相關資訊顯示在 .box 中
			$('#abgne-title').html($this.attr('alt'));
			$('#abgne-link').attr('src', $this.attr('href'));
			$('#abgne-img').attr('src', $this.attr('src'));
		});
	});
	</script>
</head>
<body background="\images\bg_html.jpg">
	
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
							if (isset($_SESSION['U_ID'])) {
								echo "<li>你好!".$_SESSION['U_NAME']."<br></li>";
								echo "<li><a href='logout.php'>登出</a></li>";
							}else{
								echo "<li><a href='#' id='login'>登入</a></li>";
							}
						?>
						<div class="login-background">
 						   <div class="login-wrapper">
 						         <!-- <h2>會員登入 SIGN IN</h2>
 						         <div class="normal_login">
 						         <form action="detail.php" method="POST">
 						         	<label>帳號</label>
											<?php 
												echo "<input id='uid' type='text' name='uid'><br>";
											?>
									<label>密碼</label>
											<?php 
												echo "<input id='upwd' type='password' name='upwd'>";
											?>										
										<button type="submit"  class="normal_login_buttom">登入</button>

								</form>
										<div class="normal_login_buttom2">
										<a href="basicregistered.php">
											<p>註冊</p>
										</a></div>										
									<div class="fb_login">
										<a href="https://www.facebook.com/dialog/oauth?client_id=288870768208521&redirect_uri=http://140.127.218.156/travel/fblogin.php&scope=public_profile,user_friends">
											<p class="fb_login_word">FACEBOOK帳號登入</p>
										</a></div>									
								</div> -->
 						    </div>
						</div>
							<?php
								if(isset($message)){
									echo "<div>$message</div>";
									header("Refresh: 2; url=detail.php");
								}
							?>
						<li><a href="#" id="l">簡介</a></li>
						<div class="login1">
 						   <div class="login-wrapper1">
 						        <!-- <h2>值得你信任的旅遊網-否放旅遊網</h2>
 						        <h3>成立理念</h3>
 						        <p>現今網路資訊發展越來越蓬勃，使用網路查詢資料已成為趨勢。
有些人外出旅遊卻苦惱於沒有想法，渴望有完整且有系統性的行程安排，因此，創造一個豐富的旅遊交流平台的理念便間接產生了否放旅遊網。</p>
 						        <h3>台灣旅遊</h3>
 						        <p>否放旅遊網為提供台灣旅遊相關資訊的網頁，有分為台灣北部、中部、南部、東部以及離島的旅遊行程規畫讓顧客去做查詢、選擇，並安排好完善的交通工具以及最公道合理的價格給消費者做抉擇的參考。
除此之外，旅遊的內容豐富多元，上山下海的行程應有盡有，不管顧客想要享受山林間的芬多精抑或是渴望海風的吹拂，甚至是傾向於人文藝術的薰陶渲染，涉及多元化的行程方案讓顧客去做最多元的選擇。</p>
 						        <h3>顧客需求</h3>
 						        <p>除了本團隊所提供的旅遊行程規畫給顧客選擇以外，我們開放每個旅遊行程的留言板交流區，讓顧客可以針對每次的旅遊做評論交流，也可以讓顧客藉由此留言板去對每個方案做詢問。
藉由這個留言板，我們可以去傾聽顧客的聲音，了解顧客對每次旅遊的看法理念及意見，吸收每個意見問題，當作養分去創造更高品質的旅遊方案。</p> -->
   							</div>
 						</div>

						<li><a href="#">旅遊資訊</a>
							<ul>
								<li><a href="synopsis_n.php">北部</a></li>
								<li><a href="synopsis_w.php">西部</a></li>
								<li><a href="synopsis_e.php">東部</a></li>
								<li><a href="synopsis_s.php">南部</a></li>
							</ul>
						</li>
						<li><a href="arrange.php">行程安排</a></li>
						<!-- <li><a href="favorite.php">我的最愛</a></li>	 -->
						<?php
							session_start();
							if (isset($_SESSION['U_ID'])){	
								echo"<li><a href='member.php'>會員專區</a></li>";
								echo "<li><a href='#'>聯絡我們</a></li>";
							}
						?>
					</ul>
			<!-- <p class="header_right_bottom_content">About</p>
			<p class="header_right_bottom_content">Trainings</p>
			<p class="header_right_bottom_content">Timetable</p>
			<p class="header_right_bottom_content">Nutrition</p>
			<p class="header_right_bottom_content">Gallert</p>
			<p class="header_right_bottom_content">Contracts</p> -->
			<div class="clear"></div>	
		</div>

	</div>


	<div class="wrapper">

		<div class="travel_information">
			<div class="travel_pic">
			<img src="<?php echo $g?>" alt="">
			</div>
			<div class="travel_word">
				<h2><?php echo $a?></h2>
				<p>出發日期：<?php echo $b?></p>
				<p>結束日期：<?php echo $c?></p>
				<p>交通方式：<?php echo $d?></p>
				<p>旅遊行程：<?php echo $e?></p>
				<p class="price">團費：<span><?php echo $f?>起</span></p>
			</div>

		<div class="clear"></div>
		</div>

		<div class="travel_special">
			<div class="travel_special_pic">
				<img src="https://www.travel.com.tw/images/images2016/listBg.jpg" alt="">
			</div>
			<div class="travel_special_right">
				<div class="travel_special_word">
					<p><?php echo $h?></p>			
				</div>
				<img src="https://www.travel.com.tw/images/images2016/line.gif" alt="" class="test">
				<div class="sixpic">
					<div id="sixpic_word">
						<span>這裡</span>是全台第一座以巧克力為主題的幸福莊園，它的誕生來自一個童話般的夢想…<br>希望藉由巧克力傳遞幸福、夢想與歡樂。 將台灣風土融入產品， 創造屬於台灣的頂級巧克力。<br>不同於一般頂級巧克力的高貴路線， 以一種平易近人的風格呈現產品。
					</div>

					<div id="sixpic_pic">
						<div class="content">
							<div class="box">
								<h3 id="abgne-title">巧克力品嘗館</h3>
								<a id="abgne-link" href="#"><img id="abgne-img" src="https://pic.travel.com.tw/IMP/MULT/2016090108562223588.jpg" /></a>
								<div class="mask"></div>
							</div>
							<ul class="side">
								<li class="first"><a href="#"><img src="https://pic.travel.com.tw/IMP/MULT/2016090108562223588.jpg" alt="巧克力品嘗館" /></a></li>
								<li><a href="#"><img src="https://pic.travel.com.tw/IMP/MULT/2016083116552606490.jpg" alt="巧克力故事館" /></a></li>
							</ul>
						</div>
						<ul class="list">
							<li><a href="#"><img src="https://pic.travel.com.tw/IMP/MULT/2016083116494714277.jpg" alt="外觀" /></a></li>
							<li><a href="#"><img src="https://pic.travel.com.tw/IMP/MULT/2016083116501095529.jpg" alt="" /></a></li>
							<li class="last"><a href="#"><img src="https://pic.travel.com.tw/IMP/MULT/2016083116554273679.jpg" alt="" /></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	
	</div>


	<div class="footer">

	<div class="footer_word"><p><br>For Fun旅遊網<br>拜託PHP讓我過<br>資料、圖片皆來自鳳凰旅行社<br>期末專題用<br>若造成任何人的不便<br>會立即撤下</p></div>

	</div>
		
	<script src="js/forfun.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
</html>