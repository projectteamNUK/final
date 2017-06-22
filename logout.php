<?php
	require_once("db_config.php");
	session_start();
	 session_unset('U_ID');
	 header("Refresh: 0; url=index.php");
?>