<?php
	ob_start();
	session_start();
	include('../database.php');
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	$q=mysql_query("select * from user where `username`='$user' and `password`='$pass'");
	$count=mysql_num_rows($q);
	
	if($count>0)
	{
		$_SESSION['user_logged']='1';
		header("Location: home.php");
	}
	else{
		$_SESSION['login_error']="Y";
		header("Location: index.php");
	}
?>