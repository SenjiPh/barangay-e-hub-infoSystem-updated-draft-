<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "signupforms";
$con = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$con) {
  // Connection failed, display error
  die("Connection failed: " . mysqli_connect_error());
} 

?>