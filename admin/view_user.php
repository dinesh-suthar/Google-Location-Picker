<?php

	session_start();

	error_reporting(0);

	include('../database.php');

	$id=$_GET['id'];

	$get=mysql_query("select * from user_registration where id='$id'");

	$gr=mysql_fetch_array($get);

	$latitude=$gr['latitute'];

	$longitude=$gr['longitude'];

	$name=$gr['name'];

	$mobile=$gr['mobile'];

	$photo=$gr['photo'];

	$address=$gr['address'];

	$category=$gr['category'];

	$subcategory=$gr['sub_category'];

	$new_category=$gr['new_category'];
	$new_subcategory=$gr['new_subcategory'];

	$verified=$gr['verified'];

	$remark=$gr['remark'];

	

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ConnectU: User updation Form</title>



    <!-- Bootstrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="../js/bootstrap.min.js"></script>

   

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyBwie2lb1oO6bBllf5z2BXmpMxol9ykNZw'></script>

    <script src="../js/locationpicker.jquery.min.js"></script>

    <script type="text/javascript">

		function fetch_sc(){

			$('#subcategory').empty()

				var category = $('#category').val();

				if(category==1)

				{

					$('#subcat_section').hide();

					$('#new_cat_section').removeClass('hidden');

				}

				else{

					$('#subcat_section').show();

					$('#new_cat_section').addClass('hidden');

					$.ajax({

					   type:  "GET",

					   url : "../get_subcatgs.php",

					   data : "category="+category,

					   success: function(data){

						   if(data=='')

						   {

							   $('#subcat_section').hide();

						   }

						   else{

						   		$('#subcategory').append(data);

						   }

						   }

					   });

				}	

		}

		

		 

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

		

		function editusermap(){

			

			$("#us3").hide();

			$("#us3_2").show();

			$("#editmap-btn").html("Now this map is editable");

			editmap();

			

		}

		$(document).ready(function(e) {

            $("#us3_2").hide();

			//$("#map").hide();

			//$("#us3 *").attr("disabled", "disabled").off('click');

			mapinit(false);

        });

			

	</script>

	 

     <style>

       #map {

        height: 400px;

        width: 100%;

       }
	   body{
		   padding:10px;
	   }

    </style>

  </head>

  <body>

    <div class="container">

    	<div class="row header">

        	<div class="col-md-12 col-sm-12 col-lg-12">

            	<h1>ConnectU</h1>

                <h3>User Registration Form</h3>

                <?php

                	if($_SESSION['defaultlocation']=='1')

					{

						?>

                        <h2><span class="label label-warning">Kindly Select location on the map, you can not select default location</span></h2>

                        <?php

						session_unset('defaultlocation');

					}

				?>

                

                <?php

                	if($_SESSION['success']=='1')

					{

						?>

                        <h2><span class="label label-success">Congratulations ! You have been registered successfully...</span></h2>

                        <?php

						session_unset('success');

					}

				?>

            </div>

        </div><!--row header ends-->

        

        <div class="row form-container">

        	<div class="col-md-12 col-sm-12 col-lg-12">

            	<form role="form" method="post" action="user_update.php" enctype="multipart/form-data">

                

                

                

                	<div class="form-group">

                    	<label >

                        	Map Location : (Drag and Drop the map pointer wherever your location is !)

                        </label>

                        <div class="row"><div id="us3" style="height: 400px;" class="col-lg-12 col-md-12 col-sm-12"></div><div id="us3_2" style="height: 400px;" class="col-lg-12 col-md-12 col-sm-12"></div></div><!--row map ends-->

                        <br>

                        <a href="#"  id="editmap-btn" class="btn btn-info" onClick="editusermap()">Edit this map</a>

                         

                          

                    </div>

                    

                    

                    

                    

                    

                    <div class="form-group hidden">

                    	<div class="m-t-small">

                              <label class="p-r-small col-sm-1 control-label">Lat.:</label>

                  

                              <div class="col-sm-3">

                                  <input type="text" class="form-control" style="width: 110px" id="us3-lat" name="lat" value="<?php echo $latitude; ?>" readonly/>

                              </div>

                              <label class="p-r-small col-sm-2 control-label">Long.:</label>

                  

                              <div class="col-sm-3">

                                  <input type="text" class="form-control" style="width: 110px" id="us3-lon" name="long" value="<?php echo $longitude; ?>" readonly/>

                              </div>

                          </div>

                          

                          <script>

						  function mapinit(mapTF)

						  {

						  $('#us3').locationpicker({

							  location: {

								  latitude:<?php echo json_encode($latitude); ?>,

								  longitude: <?php echo json_encode($longitude); ?>

							  },

							  radius: 0,

							  inputBinding: {

								  latitudeInput: $('#us3-lat'),

								  longitudeInput: $('#us3-lon')

								  /*radiusInput: $('#us3-radius'),

								  locationNameInput: $('#us3-address')*/

							  },

							  enableAutocomplete: false,

							   //draggable: false,

							   //markerDraggable: false

							  onchanged: function (currentLocation, radius, isMarkerDropped) {

								  // Uncomment line below to show alert on each Location Changed event

								  //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");

								  

							  },

							  oninitialized: function (component) {},

							  // must be undefined to use the default gMaps marker

							 // markerIcon: undefined,

							  markerDraggable: mapTF

							  

							  //markerVisible : true

							  

							  //$("#editmap").hide();

						  });

						  }

						  

						   function editmap()

							{

							$('#us3_2').locationpicker({

								location: {

									latitude:<?php echo json_encode($latitude); ?>,

									longitude: <?php echo json_encode($longitude); ?>

								},

								radius: 0,

								inputBinding: {

									latitudeInput: $('#us3-lat'),

									longitudeInput: $('#us3-lon')

									/*radiusInput: $('#us3-radius'),

									locationNameInput: $('#us3-address')*/

								},

								enableAutocomplete: false,

								 //draggable: false,

								 //markerDraggable: false

								onchanged: function (currentLocation, radius, isMarkerDropped) {

									// Uncomment line below to show alert on each Location Changed event

									//alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");

									

								},

								oninitialized: function (component) {},

								// must be undefined to use the default gMaps marker

							   // markerIcon: undefined,

								markerDraggable: true

								

								//markerVisible : true

								

								//$("#editmap").hide();

							});

							}

					  </script>

                      </div>

                    </div>

                    

                    <div class="form-group">

                        <img src="../photos/<?php echo $photo; ?>" width="250" height="350" >

                    </div>

                    

                    <!--<div class="form-group">

                    	<label >

                        	Update Photo:

                        </label>

                        <input type="file" class="form-control" name="photo">

                    </div>-->

                    

                	<div class="form-group">

                    	<label >

                        	Name / Business Name:

                        </label>

                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="eg: Dinesh Suthar Or Haridwar Restaurant" readonly>

                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>

                    

                    <div class="form-group">

                    	<label >

                        	Category selected: <span class="label label-success"><?php

                            	$cat2=mysql_query("select * from category where category_id='$category'");

								$ct=mysql_fetch_array($cat2);

								//echo $ct['category_name'];
								if($ct['category_name']=='Others')
								{

									echo "Other";

								}
								else{
									echo $ct['category_name'];
								}

							?></span>

                        </label>

                        <!--<select name="category" class="form-control" id="category" onChange="fetch_sc()">

                        <option>Please Select Category</option>

                        <?php

                        	$cat=mysql_query('select * from category order by category_id DESC');

							while($cr=mysql_fetch_array($cat))

							{

						?>

                        	<option value="<?php echo $cr['category_id']; ?>"><?php echo $cr['category_name']; ?></option>

                        <?php

							}

						?>

                        	

                        </select>-->

                    </div>
                    
                    <?php
                    	if($ct['category_name']=='Others')
								{
					?>
                    <div class="form-group" id="new_cat_section">

                    	<label >

                        	New Category:

                        </label>

                        <input type="text" name="newcategory" class="form-control" value="<?php echo $new_category; ?>" placeholder="No new category opted" readonly>

                    </div>
                    <?php
								}
					?>

                    

                    

                    <div class="form-group" id="subcat_section">

                    	<label >

                        	Sub-Category Selected:<span class="label label-success"><?php

                            	$cat3=mysql_query("select * from sub_category where sub_category_id='$subcategory'");

								$ct2=mysql_fetch_array($cat3);

								if($ct2['sub_category_name']=='')

								{

									echo "Other";

								}

								else{

									echo $ct2['sub_category_name'];

								}

							?></span>

                        </label>
                    </div>      
                    
                     <?php
                    	if($ct2['sub_category_name']!='' || $ct['category_name']!='Others')
								{
					?>
                    <div class="form-group" id="new_cat_section">

                    	<label >

                        	New Sub Category:

                        </label>

                        <input type="text" name="newsubcategory" class="form-control" value="<?php echo $new_subcategory; ?>" placeholder="No new sub category opted" readonly>

                    </div>
                    <?php
								}
					?>              

                    

                    

                    

                    

                    <div class="form-group">

                    	<label >

                        	Address #:

                        </label>

                        <textarea class="form-control" name="address" placeholder="Address of Business" readonly><?php echo $address; ?></textarea>

                    </div>

                    

                    <div class="form-group">

                    	<label >

                        	Mobile #:

                        </label>

                        <input type="text" class="form-control" name="mobile" value="<?php echo $mobile; ?>" readonly>

                    </div>

                    

                    <div class="form-group">

                    	<label >

                        	Remark:

                        </label>

                        <textarea class="form-control" name="remark" placeholder="Remark of after verification"><?php echo $remark; ?></textarea>

                    </div>

                    

                    <div class="form-group">

                    	<div class="row" style="text-align:center !important">

                        	<input type="submit" value="Set Remark/Update Map Location" class="btn btn-lg btn-success">

                        	<input type="reset" value="Reset" class="btn btn-lg btn-warning">

                            <?php

                                    	if($verified=='0')

										{

											?>

                                            <a href="#" onClick="check_verified(1,<?php echo $id;?>)" class="btn btn-lg btn-success">Verify It</a>

                                            <?php

										}

										else{

											?>

                                            <a href="#" onClick="check_verified(0,<?php echo $id;?>)"  class="btn btn-lg btn-danger">Unverify it</a>

                                            <?php

										}

									?>

                            <a href="<?php echo $_SESSION['last_page']; ?>"  class="btn btn-lg btn-link">Go Back <i class="glyphicon-arrow-left"></i></a>

                        </div>

                    </div>

                </form>

            </div>

        </div><!--row form-container ends-->

    </div><!--contailer ends-->



    

  </body>

</html>