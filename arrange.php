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
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FOR FUN - 行程安排</title>
</head>
<body>
<div>
<h4>行程安排</h4>
</div>
	<?php
		session_start();
		$tra_id = $_SESSION["U_ID"];
		$tra_name = $_SESSION["U_NAME"];
		if (strlen($tra_id) < 15) {
					echo "<img class='responsive-img circle' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwx3XFW6qZsaqCpetRzX8KD1iEaSVQ265aQGq4foXJ2pMHOvUTZw'><br>";
				}else{
					echo "<img class='responsive-img circle' src='https://graph.facebook.com/$tra_id/picture?type=large'><br>";
		}
		echo "$tra_name";
	?>
	<div>
		<h3>旅遊篩選</h3>
	</div>
			<div>
	<form action="arrange.php" method="POST">
				<label>地區</label>
		   		<select name="place" required="" id="place">
					<option value="" disabled selected>地區</option>
					<option value="東部">東部</option>
					<option value="西部">西部</option>
					<option value="南部">南部</option>
					<option value="北部">北部</option>
				 </select>
			</div>
			<div>
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
				 </select>
			</div>
			<div>
			<label>預算範圍</label>
		   		<select name="price" required="" id="price">
					<option value="" disabled selected>預算範圍</option>
					<option value="1">3,000以下</option>
					<option value="2">3,000~5,000</option>
					<option value="3">5,000~7,000</option>
					<option value="4">7,000以上</option>
				 </select>
			</div>
			<div>
				<button type="submit" id="submit" name="submit">送出</button>
			</div>
	</form>
			<div>
			<table>
				<?php
					if(isset($message)){
						echo "<div>$message</div>";
						echo "共搜尋到 ".$arrnum." 筆";

						echo "<tr>";
						echo "<td>旅遊名稱</td>";
						echo"<td>旅遊地區</td>";
						echo "<td>出發日</td>";
						echo "<td>結束日期</td>";
						echo "<td>交通方式</td>";
						echo "<td>旅遊行程</td>";
						echo "<td>價格</td>";

							while ($ar = mysqli_fetch_array($arr,MYSQLI_ASSOC)){
								echo "<tr>";
								echo "<td>".$ar['travel_name']."</td>";
								echo "<td>".$ar['travel_type']."</td>";
								echo "<td>".$ar['travel_date']."</td>";
								echo "<td>".$ar['trvavel_endtime']."</td>";
								echo "<td>".$ar['travel_traffic']."</td>";
								echo "<td>".$ar['travel_schedule']."</td>";
								echo "<td>".$ar['travel_price']."</td>";
								echo "</tr>";

							}
					}else{
						echo "<div>$nmessage</div>";
					}
				?>
			</table>
			</div>

			<div>
				<a href="index.php">回到首頁</a>
			</div>
</body>
</html>