<?php

if(!($_SESSION['comment_username'])){
	?>
	<script language=JavaScript>
	window.alert('請輸入帳號');
	location.href='login.php';
	</script><?php

}

?>