<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FOR FUN - 旅遊資訊</title>
</head>
<body>
<h4>旅遊資訊</h4>
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
		?>
	</table>
</body>
</html>