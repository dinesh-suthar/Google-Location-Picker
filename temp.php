<?php
	include('database.php');
	mysql_query("ALTER TABLE `user_registration` ADD `new_subcategory` VARCHAR(255) NOT NULL AFTER `subcategory`;");
?>