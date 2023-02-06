<?php
session_start();

	if($_SESSION['email']){
		session_destroy();
		unset($_SESSION['email']);
		// unset($_SESSION['SESS_MEMBER_REG_NO']);
		header("location: ./../admin/login");
	}
?>