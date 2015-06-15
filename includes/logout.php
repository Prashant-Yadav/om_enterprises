<?php
	require 'login/core.inc.php';
	session_destroy();
	//echo $httpReferer;
	header('Location:'.$httpReferer);   //this will redirect to page from which user logout
?>