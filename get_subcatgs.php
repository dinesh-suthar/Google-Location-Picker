<?php
include 'database_connection.php';

$category = $_GET ['category'];

$query = "SELECT sub_cat_id,sub_category_name FROM sub_category WHERE category_id=$category";

$result = $db->query ( $query );

if ($result == TRUE) {
	
	$count = $result->rowCount ();
	if ($count > 0) {
		$result = $result->fetchAll ( PDO::FETCH_ASSOC );
		foreach ( $result as $res ) {
			
			$id = $res ['sub_cat_id'];
			$name = $res ['sub_category_name'];
			echo "<option value='$id'>$name</option>";
		}
		echo "<option value='other'>Other</option>";
	}else{
		//echo "";
	}
}else{
		echo "error";
	}