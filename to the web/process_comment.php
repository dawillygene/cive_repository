<?php
session_start();
include "db.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  


   // print_r($_POST);
  
    $comment = $_POST["comment"];
    //$userId = $_POST['userId'];
    $action = $_POST['action'];
    $postID = $_POST['PostId'];


$registration = mysqli_real_escape_string($conn,$_SESSION['student']);

if($_SESSION['Role']=='admin'){
    $checkSql = "SELECT PersonalID 
    FROM System_Admin s where s.admin_username = '$registration'";
}
if($_SESSION['Role']=='student'){
    $checkSql = "SELECT PersonalID 
    FROM Student s where s.Registration_ID = '$registration'";
}

$result = mysqli_query($conn, $checkSql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  $PersonalID = $row['PersonalID'];
  $insertSql ="INSERT INTO Comment(PersonalID,PostID,content,created_at,updated_at) VALUES ('$PersonalID','$postID', '$comment',NOW(),NOW())";

        if (mysqli_query($conn, $insertSql)) {
            header("Location: detailedview.php?userId=$postID&action=$action");
            exit();            
        } else {

            echo "Error: " . mysqli_error($conn);
        }
    } else {
 
        echo "Error: Tutorial not found.";
    }


} else {
 
    echo "Invalid request method.";
}

?>