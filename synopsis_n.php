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
<h4>旅遊資訊 - 北部</h4>
<a href="index.php">回到首頁</a>
</div>
	<table>
			<tr>
				<td>圖片</td>
				<td>旅遊名稱</td>
				<td>旅遊地區</td>
				<td>出發日</td>
				<td>結束日期</td>
				<td>交通方式</td>
				<td>旅遊行程</td>
				<td>價格</td>
				<?php
					session_start();
					if (isset($_SESSION['U_ID'])){	
						echo"<td>我的最愛</td>";
					}
				?>
			</tr>
		<?php
			session_start();
			require_once("db_config.php");
			if (!isset($_SESSION['U_ID'])) {
				$get_sql = "SELECT travel.* from travel where travel.travel_type ='北部' order by travel_id";
				$tra_syn= mysqli_query($link, $get_sql);
				while ($travel = mysqli_fetch_array($tra_syn,MYSQLI_ASSOC)){
						echo "<tr>";
							echo "<td>"."<img src='".$travel['travel_path']."'>"."</td>";
							echo "<td>".$travel['travel_name']."</td>";
							echo "<td>".$travel['travel_type']."</td>";
							echo "<td>".$travel['travel_date']."</td>";
							echo "<td>".$travel['trvavel_endtime']."</td>";
							echo "<td>".$travel['travel_traffic']."</td>";
							echo "<td>".$travel['travel_schedule']."</td>";
							echo "<td>".$travel['travel_price']."</td>";
							echo "</tr>";						
				}
			}else{
				$get_sql = "SELECT travel.*, favorite.favarite_id, favorite.member_id from travel left join favorite on travel.travel_id = favorite.travel_id and favorite.member_id = $mem_id where travel.travel_type ='北部' order by travel_id";
				$tra_syn= mysqli_query($link, $get_sql);
				while ($travel = mysqli_fetch_array($tra_syn,MYSQLI_ASSOC)){
						echo "<tr>";
							echo "<td>"."<img src='".$travel['travel_path']."'>"."</td>";
							echo "<td>".$travel['travel_name']."</td>";
							echo "<td>".$travel['travel_type']."</td>";
							echo "<td>".$travel['travel_date']."</td>";
							echo "<td>".$travel['trvavel_endtime']."</td>";
							echo "<td>".$travel['travel_traffic']."</td>";
							echo "<td>".$travel['travel_schedule']."</td>";
							echo "<td>".$travel['travel_price']."</td>";

							//echo "<td><input id=\"favorite\" type=\"button\" name=\"".$travel['travel_id']."\" value=\"★\" onclick=\"add_fav('".$travel['travel_id']."')\"></td>";
							if($travel['favarite_id']!=null){
								echo "<td><img src='http://simg314.magcasa.com/content_images/2015/11/24/185087/1448346622_7462.jpg' width='70' height='70' onclick=\"add_fav('".$travel['travel_id']."')\"/></td>";
							}else{
								echo "<td><img src='http://abgne.tw/wp-content/uploads/2014/01/css3-draw-heart-icon-2.png' width='70' height='70' onclick=\"add_fav('".$travel['travel_id']."')\"/></td>";
							}
							
							echo "</tr>";						
				}
			}
		?>
	</table>

	<?php
			if(isset($message)){
				echo "<div>$message</div>";
			}
		?>
<script type="text/javascript">
	function add_fav(id){
		if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
	           	if(xmlhttp.responseText=="true"){
                    alert("成功加入最愛!!");
                }else{
                    alert("已存在於你的最愛!!");
	            }
            }
        };
        xmlhttp.open("GET","add_fav.php?fav_id="+id,true);
        xmlhttp.send();
	}
</script>
</body>
</html>