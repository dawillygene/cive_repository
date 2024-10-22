<?php 
$hostname = "localhost";
$username = "root";
//$username="dawillyg_dawillygene";
//$password = "civerepository";
$password = "";
//$dbname = "dawillyg_Cive_repository";  
$dbname = "CIVE_REPOSITORY_V1";

$conn = mysqli_connect($hostname, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
