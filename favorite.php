<?php
    session_start();
    $mem_id = $_SESSION['U_ID'];
        require_once("db_config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FOR FUN - 旅遊資訊</title>
</head>
<body>
<div>
<h4>我的最愛</h4>
<a href="index.php">回到首頁</a>
</div>
	<table>
			<tr>
				<td>旅遊名稱</td>
				<td>旅遊地區</td>
				<td>出發日</td>
				<td>結束日期</td>
				<td>交通方式</td>
				<td>旅遊行程</td>
				<td>價格</td>
			</tr>
		<?php
			require_once("db_config.php");
				$get_sql = "SELECT travel.*, favorite.favarite_id, favorite.member_id from travel left join favorite on travel.travel_id = favorite.travel_id where favorite.member_id = $mem_id  order by travel_type";
				$tra_syn= mysqli_query($link, $get_sql);
				while ($travel = mysqli_fetch_array($tra_syn,MYSQLI_ASSOC)){
						echo "<tr>";
							echo "<td>".$travel['travel_name']."</td>";
							echo "<td>".$travel['travel_type']."</td>";
							echo "<td>".$travel['travel_date']."</td>";
							echo "<td>".$travel['trvavel_endtime']."</td>";
							echo "<td>".$travel['travel_traffic']."</td>";
							echo "<td>".$travel['travel_schedule']."</td>";
							echo "<td>".$travel['travel_price']."</td>";

							//echo "<td><input id=\"favorite\" type=\"button\" name=\"".$travel['travel_id']."\" value=\"★\" onclick=\"add_fav('".$travel['travel_id']."')\"></td>";
							echo "</tr>";						
				}
		?>
	</table>
</script>
</body>
</html>