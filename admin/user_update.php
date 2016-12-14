<?php
	session_start();
	include('../database.php');
	$remark=$_POST['remark'];
	$id=$_POST['id'];
	$latitude=$_POST['lat'];
	$longitude=$_POST['long'];
	$q=mysql_query("update user_registration set `remark`='$remark',`latitute`='$latitude',`longitude`='$longitude' where `id`='$id'");
	header('Location: '.$_SESSION['last_page']);
?>