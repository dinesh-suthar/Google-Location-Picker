<?php

	session_start();

	error_reporting(0);

	include('database.php');

	

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="http://spregistration.connectuapp.com" />
    <meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="ConnectU Business Registration Form" />
<meta property="og:description" content="Fill this Business Registration Form to get started." />
<meta property="og:url" content="http://spregistration.connectuapp.com" />
<meta property="og:site_name" content="ConnectUApp" />
<meta property="og:image" itemprop="image" content="http://spregistration.connectuapp.com/ConnectU_logo.jpg" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="200" />

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ConnectU: Business Registration Form</title>



    <!-- Bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>
    <!--dropdown jquery-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!--dropdown jquery ends-->

   

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyA9_UmKVpXoqRx_6dFzMAp4YkLqcoVBNuw'></script>

    <script src="js/locationpicker.jquery.min.js"></script>

    <script type="text/javascript">

		function fetch_sc(){

			$('#subcategory').empty()

				var category = $('#category').val();

				if(category==1)

				{

					$('#subcat_section').hide();

					$('#new_cat_section').removeClass('hidden');
					$('#newcategory').attr('required','true');

				}

				else{
					//alert('not other category');
					$('#subcat_section').show();

					$('#new_cat_section').addClass('hidden');
					$('#newcategory').removeAttr('required');

					$.ajax({

					   type:  "GET",

					   url : "get_subcatgs.php",

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
		
		function check_other()
		{
			var subcat=$('#subcategory').val();
			if(subcat=="other")
			{
				$('#new_subcat_section').removeClass('hidden');
				$('#newsubcategory').attr('required','true');
			}
			else{
				$('#new_subcat_section').addClass('hidden');
				$('#newsubcategory').removeAttr('required');
			}
		}

			$(document).ready(function(e) {

                $("#mobile").on("keypress keyup",function(){

							  if($(this).val() == '0'){

								$(this).val('');  

							  }

						  });
						  
						  <!--dropdown jquery init-->
						  $('select').select2();
						  $('#subcat_section').hide();
						  $('#defaultmap').addClass('hidden');
						  //$('#blanket').removeClass('hidden');

            });
			
			function post()
			{
				var lat=$('#us3-lat').val();
				var long=$('#us3-lon').val();
				if(lat=='19.39192749999999' || long=='72.83973170000002')
				{
					$("html, body").animate({ scrollTop: 0 }, "slow");
					 $('#defaultmap').removeClass('hidden');
				}
				else
				{
					$('#blanket').removeClass('hidden');
					var name=$('#name').val();
					var category=$('#category').val();
					var subcategory=$('#subcategory').val();
					var newcategory=$('#newcategory').val();
					var newsubcategory=$('#newsubcategory').val();
					var address=$('#address').val();
					var mobile=$('#mobile').val();
					//var photo = new FormData($("#photo")[0]);
					var formData = new FormData();

					formData.append('lat', lat);
					formData.append('long', long);
					formData.append('category', category);
					formData.append('subcategory', subcategory);
					formData.append('newcategory', newcategory);
					formData.append('newsubcategory', newsubcategory);
					formData.append('address', address);
					formData.append('mobile', mobile);
					formData.append('name', name);
					 
					formData.append('photo', document.getElementById("photo").files[0]);
					$.ajax({
						type: 'POST',
						url: 'user_save.php',
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							//alert("user registered");
							location.reload(); 
							$('#blanket').addClass('hidden');
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					});
				}
			}
			
			 
			

	</script>

    <style>

    	.required{

			color:#F00;

			font-size:18px;

		}

    </style>

	 <!--Google analytics code-->

     <script>

	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	

	  ga('create', 'UA-68128643-5', 'auto');

	  ga('send', 'pageview');

	

	</script>

     <!--Google analytics code ends-->
     <style>
     	body{
			padding:10px !important;
		}
		
		#blanket {
		   background-color:#111;
		   opacity: 0.65;
		   *background:none;
		   position:fixed;
		   z-index: 9001;
		   top:0px;
		   left:0px;
		   width:100%;
		   height:100%;
		   background:url(gps.gif) no-repeat;
		   background-position:50% 50%;
		}
		
		
     </style>

  </head>

  <body>
<div id="blanket" class="hidden"></div>

    
    <div class="container">

    	<div class="row header">

        	<div class="col-md-12 col-sm-12 col-lg-12">

            	<h1>ConnectU</h1>

                <h3>Business Registration Form</h3>

                <?php

                	/*if($_SESSION['defaultlocation']=='1')

					{*/

						?>

                         <div class="form-group" id="defaultmap">

                    	<label ><span class="label label-warning">Kindly Select location on the map, you can not select default location</span></label>

                        </div>

                        <?php

						/*session_unset('defaultlocation');

					}*/

				?>

                

                <?php

                	if($_SESSION['success']=='1')

					{

						?>

                        <div class="form-group">

                    	<label ><span class="label label-success">Congratulations ! You have been registered successfully...</span></label>

                        </div>

                        <?php

						session_unset('success');

					}

				?>

            </div>

        </div><!--row header ends-->

        

        <div class="row form-container">

        	<div class="col-md-12 col-sm-12 col-lg-12">

            	<form role="form" method="post" action="user_save.php" enctype="multipart/form-data">

                

                	<div class="form-group">

                    	<label >

                        	Map Location : (Drag and Drop the map pointer wherever your location is !)<br>

                            All fields marked with <span class="required">*</span> are required

                        </label>

                        <div class="row"><div id="us3" style="height: 400px;" class="col-lg-12 col-md-12 col-sm-12"></div></div><!--row map ends-->

                         

                          

                    </div>

                    

                    <div class="form-group hidden">

                    	<div class="m-t-small">

                              <label class="p-r-small col-sm-1 control-label">Lat.:</label>

                  

                              <div class="col-sm-3">

                                  <input type="text" class="form-control" style="width: 110px" id="us3-lat" name="lat" readonly/>

                              </div>

                              <label class="p-r-small col-sm-2 control-label">Long.:</label>

                  

                              <div class="col-sm-3">

                                  <input type="text" class="form-control" style="width: 110px" id="us3-lon" name="long" readonly/>

                              </div>

                          </div>

                          

                          <script>

						  $('#us3').locationpicker({

							  location: {

								  latitude: 19.39192749999999,

								  longitude: 72.83973170000002

							  },

							  radius: 0,

							  inputBinding: {

								  latitudeInput: $('#us3-lat'),

								  longitudeInput: $('#us3-lon')

								  /*radiusInput: $('#us3-radius'),

								  locationNameInput: $('#us3-address')*/

							  },

							  enableAutocomplete: true,

							  onchanged: function (currentLocation, radius, isMarkerDropped) {

								  // Uncomment line below to show alert on each Location Changed event

								  //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");

							  }

						  });

						  function isNumberKey(evt){

							  var charCode = (evt.which) ? evt.which : event.keyCode

							  if (charCode > 31 && (charCode < 48 || charCode > 57))

								  return false;

							  return true;

						  }

						  

					  </script>

                      </div>

                    </div>

                    

                    <div class="form-group">

                    	<label >

                        	Photo:

                        </label>

                        <input type="file" class="form-control" name="photo" id="photo">

                    </div>

                    

                	<div class="form-group">

                    	<label >

                        	Name / Business Name:<span class="required">*</span>

                        </label>

                        <input type="text" class="form-control" name="name" id="name" placeholder="eg: Dinesh Suthar Or Haridwar Restaurant" required>

                    </div>

                    

                    <div class="form-group">

                    	<label >

                        	Category:<span class="required">*</span>

                        </label>

                        <select name="category" class="form-control" id="category" onChange="fetch_sc()" required>

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

                        	

                        </select>

                    </div>

                    

                    

                    <div class="form-group" id="subcat_section">

                    	<label >

                        	Sub-Category:<span class="required">*</span>

                        </label>

                        <select name="subcategory" id="subcategory" onChange="check_other()" class="form-control">

                        	<option>Please Select Sub-Category</option>

                        </select>

                    </div>
                    
                    <div class="form-group hidden" id="new_subcat_section">

                    	<label >

                        	New Sub Category:

                        </label>

                        <input type="text" name="newsubcategory" id="newsubcategory" class="form-control" placeholder="Please enter your subcategory" >

                    </div>

                    

                    <div class="form-group hidden" id="new_cat_section">

                    	<label >

                        	New Category:

                        </label>

                        <input type="text" name="newcategory" id="newcategory" class="form-control" placeholder="Please enter your category" >

                    </div>

                    

                    

                    

                    <div class="form-group">

                    	<label >

                        	Address:<span class="required">*</span>

                        </label>

                        <textarea class="form-control" name="address" id="address" placeholder="Address of Business" required></textarea>

                    </div>

                    

                    <div class="form-group">

                    	<label >

                        	Mobile #:<span class="required">*</span>

                        </label>

                        <input type="number" class="form-control" name="mobile" id="mobile" required onkeypress="return isNumberKey(event)" maxlength="10" min="10" pattern="\d*>

                    </div>

                    <div class="form-group">

                    	<div class="row" style="text-align:center !important">

                        	<input type="button" value="Register" class="btn btn-lg btn-success" onClick="post()">
                            <!--<button class="btn btn-lg btn-success" onClick="post()">Register</button>-->

                        	<input type="reset" value="Reset" class="btn btn-lg btn-warning">

                        </div>

                    </div>

                </form>

            </div>

        </div><!--row form-container ends-->

    </div><!--contailer ends-->



    

  </body>

</html>