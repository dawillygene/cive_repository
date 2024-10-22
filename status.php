<?php
session_start();
if (isset($_GET['userId']) && isset($_GET['action'])) {
    $userId = $_GET['userId'];
    $action = $_GET['action'];
    include 'db.php'; 

    function user($conn, $sql)
    {
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = 'Successful update';
            header("Location: addManageUser.php?update=success");
            exit;
        } else {
            echo 'error';
        }
    }

    function post($conn, $sql)
    {
        if (mysqli_query($conn, $sql)) {
            header("Location: addManagePost.php?update=success");
            exit;
        } else {
            echo 'error';
        }
    }


    function deletepost($conn, $sql)
    {
        if (mysqli_query($conn, $sql)) {
            header("Location: view.php?update=success");
            exit;
        } else {
            echo 'error';
        }
    }


    if ($action === 'accept') {
        $sql = "UPDATE Personal_Details SET Active = '1' WHERE PersonalID = '$userId'";
        user($conn, $sql);
    } elseif ($action === 'stop') {
        $sql = "UPDATE Personal_Details SET Active = '0' WHERE PersonalID = '$userId'";
        user($conn, $sql);
    } elseif ($action === 'accept_post') {
        $sql = "UPDATE Post SET status = 'accepted' WHERE PostID = '$userId'";
        post($conn, $sql);
    } elseif ($action === 'reject_post') {
        $sql = "UPDATE Post SET status = 'rejected' WHERE PostID = '$userId'";
        post($conn, $sql);
    }  elseif ($action === 'delete_post') {
        $sql = "DELETE FROM Post WHERE PostID = '$userId'";
        deletepost($conn, $sql);
    } else {
        echo 'Invalid action';
        exit;
    }

    
} else {
    echo 'error';
}
?>
