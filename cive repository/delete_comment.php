<?php
session_start();
include "db.php";
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

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
    $loggedInUserID  = $row['PersonalID'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['comment_id'])) {
        $commentID = $_POST['comment_id'];
        $checkSql = "SELECT PersonalID FROM Comment WHERE CommentID = '$commentID' AND PersonalID = '$loggedInUserID'";
        $checkResult = mysqli_query($conn, $checkSql);
        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            $deleteSql = "DELETE FROM Comment WHERE CommentID = '$commentID'";
            if (mysqli_query($conn, $deleteSql)) {
                header("Location: detailedview.php?fileId=$fileId");
                exit();
            } else {
                echo "Error deleting comment: " . mysqli_error($conn);
            }
        } else {
            echo "Comment not found or you don't have permission to delete it.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}
?>
