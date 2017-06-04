<?php
	require_once("db_config.php"); 
	if (isset($_POST['place'])) {
		$place=$_POST['place'];
		$traffic=$_POST['traffic'];
		$price=$_POST['price'];
		$arrange = "SELECT * FROM travel WHERE travel_type= '$place' and travel_traffic='$traffic' and travel_prcnum='$price'";
		$arr= mysqli_query($link, $arrange);
		$arrnum= mysqli_num_rows($arr);
		if ($arrnum > 0) {
			$message = "搜尋成功!!<br/>";
		}else{
			$nmessage = "查無資料!!請更換搜尋條件";
		}
	}
	if(isset($_POST['uid'])){
		$id = $_POST['uid'];
		$pwd = $_POST['upwd'];
		$arrange = "SELECT * FROM member WHERE member_email= '$id' and member_pwd='$pwd' ";
		$res=mysqli_query($link, $arrange);
		if (mysqli_num_rows($res)!=0){
			$message2 = "登入成功!歡迎進入FOR FUN 旅遊網<br/>";
			$set = mysqli_fetch_array($res, MYSQLI_ASSOC);
			session_start();
			$_SESSION['U_ID'] = $set['member_id'];
			$_SESSION['U_NAME'] = $set['member_name'];
		}else{
			$message2 = "登入失敗!請確認帳號密碼是否正確";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel="stylesheet" href="css/arrange.css">
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
							if (isset($_SESSION['U_ID'])) {
								echo "<li>你好!".$_SESSION['U_NAME']."<br></li>";
								echo "<li><a href='logout.php'>登出</a></li>";
							}else{
								echo "<li><a href='#' id='login'>登入</a></li>";
							}
						?>
						<div class="login-background">
 						   <div class="login-wrapper">
 						         <h2>會員登入 SIGN IN</h2>
 						         <div class="normal_login">
 						         <form action="arrange.php" method="POST">
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
								</div>
 						    </div>
						</div>
							<?php
								if(isset($message2)){
									echo "<div>$message2</div>";
									header("Refresh: 2; url=arrange.php");
								}
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
								echo "<li><a href='form.php'>聯絡我們</a></li>";
							}
						?>
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

					<h1>旅遊篩選</h1>
						<div class="arrangecontent">
							<div class="arrange-user-photo">
								<?php
									session_start();
									$tra_id = $_SESSION["U_ID"];
									$tra_name = $_SESSION["U_NAME"];
									if (isset($_SESSION['U_ID'])) {
										if (strlen($tra_id) < 15) {
											echo "<img class='responsive-img circle' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwx3XFW6qZsaqCpetRzX8KD1iEaSVQ265aQGq4foXJ2pMHOvUTZw'><br>";
										}else{
											echo "<img class='responsive-img circle' src='https://graph.facebook.com/$tra_id/picture?type=large'><br>";
										}
										// echo "$tra_name";
									}

								?>
							</div>
							<div class="select">
						<form action="arrange.php" method="POST">
							<label>地區</label>
							   	<select name="place" required="" id="place">
									<option value="" disabled selected>地區</option>
									<option value="東部">東部</option>
									<option value="西部">西部</option>
									<option value="南部">南部</option>
									<option value="北部">北部</option>
								</select><br>
							<label>交通方式</label>
							   	<select name="traffic" required="" id="traffic">
									<option value="" disabled selected>交通方式</option>
									<option value="飛機">飛機</option>
									<option value="高鐵">高鐵</option>
									<option value="捷運">捷運</option>
									<option value="火車">火車</option>
									<option value="輪船">輪船</option>
									<option value="遊覽車">遊覽車</option>
									<option value="觀光巴士">觀光巴士</option>
								</select><br>
							<label>預算範圍</label>
							   	<select name="price" required="" id="price">
									<option value="" disabled selected>預算範圍</option>
									<option value="1">3,000以下</option>
									<option value="2">3,000~5,000</option>
									<option value="3">5,000~7,000</option>
									<option value="4">7,000以上</option>
								</select>
									<button type="submit" class="alter-user-information-submit" id="submit" name="submit">送出</button>
						</form>
							</div>
													<div class="clear"></div>	
						</div>		
				</div>		
					
					<div class="fff">	
							<h1>搜尋結果</h1>
							<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding1">
							<img src="http://pic.pimg.tw/stephytruth/1309079219-c7c102fc171192181df4f58b06e14deb.png" alt="" class="tuding2">
					<ul>		
						<li>
							<div class="travel_information">
								<?php
									if(isset($message)){
		 							$get_sql = "SELECT * FROM travel WHERE travel_type= '$place' and travel_traffic='$traffic' and travel_prcnum='$price'";
            						$data = mysqli_query($link, $get_sql);
									for($i=1;$i<=mysqli_num_rows($data);$i++){ 
										$rs=mysqli_fetch_row($data);
								?>		
								<div class="travel_pic">
									<a href=""><img src="<?php echo $rs[10]?>" alt=""></a>
								</div>
								<div class="travel_word">
									<a href=""><h2><?php echo $rs[1]?></h2></a>
									<p>出發日期：<?php echo $rs[3]?></p>
									<p>結束日期：<?php echo $rs[4]?></p>
									<p>交通方式：<?php echo $rs[5]?></p>
									<p>旅遊行程：<?php echo $rs[6]?></p>
									<p class="price">團費：<span><?php echo $rs[8]?>起</span></p>
								</div>
							<div class="clear"></div>
								<?php 
									}
									}else{
										echo "$nmessage";
									}
								?>		
							</div>
			</ul>
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