<?php include('../database.php'); session_start();?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Admin home</title>



    <!-- Bootstrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>

   <?php include('header.php'); ?>

   <!--</div>--><!--container ends-->

   		<div class="row">

        	<div class="col-lg-12">

            	<table class="table table-striped table-responsive table-hover">

                	<tr>

                    	<th>Sr.</th>

                    	<th>Date</th>

                        <th>Name</th>

                        <th>Mobile</th>

                        <th>Category</th>

                        <th>Sub Category</th>

                        <th>New Category</th>

                        <th>Latitude</th>

                        <th>Longitude</th>

                        <th>Verified</th>

                        <th>Action</th>

                    </tr>

                    

                   

                    	<?php

                        	$q=mysql_query("select * from user_registration order by verified ASC");

							$count=0;

							while($qr=mysql_fetch_array($q))

							{

								$date=date('d-m-Y', strtotime($qr['timestamp']));

								$catid=$qr['category'];

								$get_cat=mysql_query("select * from category where `category_id`='$catid'");

								$catr=mysql_fetch_array($get_cat);

								$category=$catr['category_name'];

								$subcat=$qr['subcategory'];

								$get_subcat=mysql_query("select * from sub_category where `sub_cat_id`='$subcat'");

								$subcatr=mysql_fetch_array($get_subcat);

								$subcategory=$subcatr['sub_category_name'];

								$count++;

								?>

                                 <tr>

                                 	<td><?php echo $count;?></td>

                                    <td><?php echo $date;?></td>

                                    <td><?php echo $qr['name'];?></td>

                                    <td><?php echo $qr['mobile'];?></td>

                                    <td><?php echo $category ;?></td>

                                    <td><?php echo $subcategory;?></td>

                                    <td><?php echo $qr['new_category'];?></td>

                                    <td><?php echo $qr['latitute'];?></td>

                                    <td><?php echo $qr['longitude'];?></td>

                                    <td>

									<?php

                                    	if($qr['verified']=='0')

										{

											?>

                                            <input type="checkbox" value="1" onChange="check_verified(1,<?php echo $qr['id'];?>)" class="form-control" disabled>

                                            <?php

										}

										else{

											?>

                                            <input type="checkbox" value="0" onChange="check_verified(0,<?php echo $qr['id'];?>)" checked class="form-control" disabled>

                                            <?php

										}

									?>

                                    </td>

                                    <td><a href="view_user.php?id=<?php echo $qr['id']; ?>" class="btn btn-info">View</a><a href="delete_user.php?id=<?php echo $qr['id']; ?>" class="btn btn-danger">Delete</a></td>

                                 </tr>

                                <?php

							}

							$_SESSION['last_page']='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//storing last page url in session

							//echo "<pre>";

							//print_r($_SESSION['last_page']);

						?>

                    

				</table>

            </div>

   		</div>

        <!--<div class="container">-->

   <?php include('footer.php'); ?>

   <script>

   $(document).ready(function(e) {

    	$("#all").addClass('active');

	});

   		function check_verified(status,id)

		{

			var status=status;

			var id=id;

			$.ajax({

					   type:  "GET",

					   url : "change_status.php",

					   data : "status="+status+"&id="+id,

					   success: function(data){

						   if(data=='OK')

						   {

							   window.location.reload();

						   }

						   else{

						   		window.location.reload();

						   }

						   }

					   });

		}

   </script>

  </body>

</html>