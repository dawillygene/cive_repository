<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (!isset($_SESSION['student']) || !isset($_SESSION['firstname']) || !isset($_SESSION['lastname'])) {
    header('Location: index.php'); 
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cive repository</title>
    <link rel="icon" href="./assets/logo1.jpg">
    <link rel="stylesheet" href="./assets/style.css">
    <style>
        
        .step {
            display: none;
        }

        #active {
            background-color: white;
            border-radius: 40px 0px 0px 40px;
            color: #2a2185;

        }

  
        tr {
    border: 1px solid #dddfe2;
    border-radius: 8px;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f0f2f5;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  /* Style individual sections within the row */
  tr td {
    flex: 1;
    padding: 8px;
    border-right: 1px solid #dddfe2;
  }
  
  /* Style the "Download" link section */
  tr td a {
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    display: block;
    text-align: center;
    margin-top: 5px;
  }
  
  /* Style the "Open" button section */
  tr td button.statusdelivered {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    text-align: center;
    margin-top: 5px;
  }  




.success-message {
            display: none; /* Initially hide the message */
            background-color: green;
            color: white;
            padding: 10px;
            text-align: center;
        }

.username{
    color: #2a2185;
    
}
    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashbord.php">
                        <span class="icon">
                            <ion-icon name="server"></ion-icon>
                        </span>
                        <span class="title">Cive repository</span>
                    </a>
                </li>

                <li>
                    <a href="dashbord.php">
                        <span class="icon">
                            <ion-icon name="desktop"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="upload.php">
                        <span class="icon">
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                        </span>
                        <span class="title">Upload</span>
                    </a>
                </li>

                <li>
                    <a href="view.php">
                        <span class="icon">
                            <ion-icon name="eye"></ion-icon>
                        </span>
                        <span class="title">View</span>
                    </a>
                </li>

                <li>
                    <a href="help.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="settings.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>


                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <?php
        if ($showSearchBar) {
            echo '
                <div class="search">
                    <label>
                        <input type="text" id="live_search" autocomplete="off" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            ';
        }
        ?>
        
             <label class="username"  for="">username-><?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></label>
              <a href="settings.php"><div class="user">
                    <?php 
                    include "./db.php";

                    if (isset($_SESSION['student']) && !empty($_SESSION['student'])) {
                        $registrationNO = mysqli_real_escape_string($conn, $_SESSION['student']);
                        $sql = "SELECT PersonalID FROM Student WHERE Registration_ID = '$registrationNO'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $personalID = $row['PersonalID'];
                            } else {
                                echo "No results found.";
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Session variable is not set or empty.";
                    }
$sqlGetPicture = "SELECT Profile_picture FROM Personal_Details WHERE PersonalID = '$personalID'";
$result = mysqli_query($conn, $sqlGetPicture);

if ($result) {
    while($picture = mysqli_fetch_assoc($result)){
    $profilePicture = $picture['Profile_picture'];
    if ($profilePicture) {
        $profilePicturePath = "ProfilePicture/" . $profilePicture;
        echo '<img src="' . $profilePicturePath . '" alt="Profile Picture">';
       
    } else {
        echo '<img src="default_profile_picture.jpg" alt="Default Profile Picture">';
    } }
} else {
    echo 'Error retrieving profile picture: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
                   
                   </a> 
                </div>
            </div>