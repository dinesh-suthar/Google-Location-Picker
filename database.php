<?php
    // Connecting to the database server
   $servername="localhost";
	$username="root";
	$password="";
	$connect = mysql_connect($servername,$username,$password) or die("<br/>Check your server connection...");
	$dbname = "connectu_user_map";
	$selectedDB = mysql_select_db($dbname) or die(mysql_error());
	//include('date.php');

	function tep_redirect($url, $enanle_SSL=false) {
    if ( ($enanle_SSL== true) && (getenv('HTTPS') == 'on') ) 
	{ 
      if (substr($url, 0, strlen(HTTP_SERVER)) == HTTP_SERVER) 
	  {
        $url = HTTPS_SERVER . substr($url, strlen(HTTP_SERVER)); 
      }
    }
    header("Location: " . $url);
  }   

    /*  Function to create table    */
    function createTable($createTableQuery)
    {
        $createdTable = mysql_query($createTableQuery) or die(mysql_error());
    }

    /*  Function to insert record into the table    */
    function insertRecord($insertRecord)
    {
        $recordInserted = mysql_query($insertRecord) or die(mysql_error());
        return $recordInserted;
    }

    /*  Function to delete the record into the record   */
    function deleteRecord($deleteRecord)
    {
        $recordDeleted = mysql_query($deleteRecord) or die(mysql_error());
        return $recordDeleted;
    }
	 function updateRecord($updateRecord)
    {
        $recordUpdated = mysql_query($updateRecord) or die(mysql_error());
        return $recordUpdated;
    }

    /*  Function to select records from the table    */
    function selectRecord($selectRecord)
    {
        $resultset = mysql_query($selectRecord) or die(mysql_error());
        return $resultset;
    }
	
	?>