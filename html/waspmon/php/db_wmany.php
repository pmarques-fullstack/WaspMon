<?php
//include('php/login.php'); // Include Login Script
//include('php/config.php');
//session_start();
   $DB_SERVER="localhost";
   $DB_USERNAME="waspmon";
//User e Password needs to be in session sha256
   $DB_PASSWORD="waspmon";
   $DB_DATABASE="waspmon";
   $error="";

$db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
if (!$db) {
		
	}
	else {
		$sql = "SELECT MAX(row) from (SELECT (@rowno:=@rowno+1) AS row,COUNT(*),wasp_id from wasp_data, (SELECT @rowno:=0) AS t group by wasp_id) AS p;";
      		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		echo intval($row["MAX(row)"]);	   
	}
mysqli_close($db);
		
	
?>