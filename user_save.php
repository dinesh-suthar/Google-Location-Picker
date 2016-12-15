<?php
	session_start();
	include('database.php');
	$latitude=$_POST['lat'];
	$longitude=$_POST['long'];
	if($latitude=='19.39192749999999' || $longitude=='72.83973170000002')
	{
		$_SESSION['defaultlocation']='1';
		header("Location: index.php");
	}
	else{
		$_SESSION['defaultlocation']='0';
		$name=$_POST['name'];
		$name=str_replace("'","`",$name); 
		$category_id=$_POST['category'];
		if($_POST['subcategory'])//if subcategory field is posted
		{
			$sub_category_id=$_POST['subcategory'];
		}
		else{
			$sub_category_id=0;
		}
		if($_POST['newcategory'])//if newcategory field is posted
		{
			$newcategory=$_POST['newcategory'];
		}
		else{
			$newcategory="";	
		}
		
		if($_POST['newsubcategory'])//if newsubcategory field is posted
		{
			$newsubcategory=$_POST['newsubcategory'];
		}
		else{
			$newsubcategory="";	
		}
		$address=$_POST['address'];
		$address=str_replace("'","`",$address);
		$mobile=$_POST['mobile'];
		
		
		
		
		$qin=mysql_query("INSERT INTO `user_registration`(`id`, `name`, `category`, `new_category`, `subcategory`, `address`, `mobile`, `latitute`, `longitude`, `verified`,`new_subcategory`) VALUES ('','$name','$category_id','$newcategory','$sub_category_id','$address','$mobile','$latitude','$longitude','0','$newsubcategory')");
		$id=mysql_insert_id();
		
		$photo=$_FILES["photo"]["name"];
		
		if(!empty($photo))
		{
			$photo = preg_replace("/[^0-9a-zA-Z.]+/", "_", $photo);
			$photo= "User_".$id."_".$photo;
			$filename = ("photos" . "/");
			move_uploaded_file($_FILES["photo"]["tmp_name"], "$filename/".$photo);
			
			$q_up=mysql_query("UPDATE `user_registration` SET `photo`='$photo' where id='$id'");
		}
		
		$_SESSION['success']='1';
		
		//header("Location: index.php");
	}
?>