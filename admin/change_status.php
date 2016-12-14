<?php
include '../database_connection.php';

$id = $_GET ['id'];
$status = $_GET ['status'];

$query = "UPDATE `user_registration` SET `verified`='$status' WHERE `id`='$id'";

$result = $db->query ( $query );

if ($result == TRUE) {
	echo "OK";
}else{
		echo "error";
	}
	
?>