<?php
 $link = @mysqli_connect('140.127.218.156','travel','tra1043342','comment');
 if(!$link){

 	echo "連結錯誤訊息: ".mysqli_connect_error()."<br>";
 	exit();
 }
 mysqli_query($link,'set names utf8');
 

 ?>