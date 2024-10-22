<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "CIVE_REPOSITORY_V1";   //make sure this name apper similar to your database in a mysql

$conn = mysqli_connect($hostname, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
