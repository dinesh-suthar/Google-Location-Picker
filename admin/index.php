<?php
error_reporting(0);
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ConnectU user Registration Admin Panel</title>

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
    <div class="container">
    	<div class="row">
        	<div class="col-lg-12" >
            	<div class="jumbotron" >
                	<h2>Admin Login</h2>
                    <form role="form" method="post" action="login.php" >
                    	<div class="form-group">
                        	<label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        	<label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <?php
                        	if($_SESSION['login_error']=="Y")
							{
								?>
                                <span class="label label-danger">No such username and password combination</span>
                                <?
								session_unset('login_error');
							}
						?>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="login" class="btn btn-success">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>