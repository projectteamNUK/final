<?php
		session_start();
		require_once("db_config.php");
		$mem_id = $_SESSION['U_ID'];
		$tra_id = $_GET['fav_id'];
		$f_id = $mem_id.$tra_id;

		$get_sql = "SELECT * FROM favorite WHERE favorite_id= '$f_id' ";
		$res = mysqli_query($link, $get_sql);
		if(mysqli_num_rows($res)==0){
			$new_sql = "INSERT INTO favorite VALUES('$f_id', '$mem_id', '$tra_id')";
			if(mysqli_query($link, $new_sql)){
				echo "true";
			}
			
		}else{
			echo "false";
		}

?>