<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!isset($_SESSION['student']) || !isset($_SESSION['firstname']) || !isset($_SESSION['lastname'])) {
    header('Location: index.php'); 
    exit(); 
}

include "db.php";

if (isset($_SESSION['student']) && !empty($_SESSION['student'])) {
    $registrationNO = mysqli_real_escape_string($conn, $_SESSION['student']);
   


    if ($_SESSION['Role'] == 'admin') {
        $sql = "SELECT PersonalID FROM System_Admin WHERE   admin_username = '$registrationNO'";
    } else if ($_SESSION['Role'] == 'student') {
        $sql = "SELECT PersonalID FROM Student WHERE Registration_ID = '$registrationNO'";

   
    } 
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



if (isset($_POST["notes"])) {
    $yearlevel = $_POST["yearlevel"];
    $department = $_POST["department"];
    $programe = $_POST["programe"];
    $coursename = $_POST["coursename"];
    $notesyear = $_POST["notesyear"];
    $status = "pending";
    $description = mysqli_real_escape_string($conn,$_POST["description"]);

    $targetDir = "pastNotes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFile = $_FILES["file"]["name"];
    $basename = basename($uploadedFile);
    $targetFile = $targetDir . $basename;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO Post (file_path, PersonalID, title, file_type, YearLevel, Documentyear, Examlevel, department, Program, Course, 
        description, links, status,created_at, updated_at)
                    VALUES ('$basename','$personalID','','notes',
                    '$yearlevel','$notesyear','UE','$department','$programe',
                    '$coursename','$description', '','$status', NOW(), NOW())";

        if (mysqli_query($conn, $sql)) {
            header("Location:upload.php?update=success"); 
            exit;
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error uploading file.';
    }

    mysqli_close($conn);
}


if (isset($_POST["pastpaper"])) {
    $yearlevel = $_POST["yearlevel"];
    $department = $_POST["department"];
    $program = $_POST["Program"];
    $coursename = $_POST["coursename"];
    $examlevel = $_POST["examlevel"];
    $pastyear = $_POST["pastyear"];
    $description = mysqli_real_escape_string($conn,$_POST["description"]);
    $status = "pending";

    $targetDir = "pastNotes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFile = $_FILES["file"]["name"];
    $basename = basename($uploadedFile);
    $targetFile = $targetDir . $basename;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $sqlfile = "INSERT INTO Post (file_path, PersonalID, title, file_type, YearLevel, Documentyear, Examlevel, department, Program, Course, description, links, status, created_at, updated_at)
                    VALUES ('$basename','$personalID', '', 'pastpaper', '$yearlevel', '$pastyear', '$examlevel', '$department', '$program', '$coursename', '$description', '', '$status', NOW(), NOW())";

        if (mysqli_query($conn, $sqlfile)) {
            header("Location:upload.php?update=success"); 
            exit;
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error uploading file.';
    }

    mysqli_close($conn);
}

/********************************************/

if (isset($_POST["bookupdate"])) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $title = $_POST["title"];
    $description = $_POST["description"];
    $linkTut = $_POST["links"];
    $status = "pending";



    $targetDir = "pastNotes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFile = $_FILES["file"]["name"];
    $basename = basename($uploadedFile);
    $targetFile = $targetDir . $basename;

    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO Post(file_path,PersonalID,title,description,links,status,file_type,created_at,updated_at)
            VALUES (?,?,?,?,?,?,'book', NOW(), NOW())";

    $stmt = mysqli_prepare($conn, $sql);


    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $basename,
            $personalID,
            $title,
            $description,
            $linkTut,
            $status
        );


        if (mysqli_stmt_execute($stmt)) {
            header("Location:upload.php?update=success"); 
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}




if (isset($_POST["Installation"])) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $title = $_POST["title"];
    $description = $_POST["description"];
    $linkTut = $_POST["links"];
    $status = "pending";


    $targetDir = "pastNotes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFile = $_FILES["file"]["name"];
    $basename = basename($uploadedFile);
    $targetFile = $targetDir . $basename;

    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);


    $sql = "INSERT INTO Post(file_path,PersonalID,title,description,links,status,file_type,created_at,updated_at)
    VALUES (?,?,?,?,?,?,'installation', NOW(), NOW())";

    $stmt = mysqli_prepare($conn, $sql);


    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $basename,
            $personalID,
            $title,
            $description,
            $linkTut,
            $status
        );

        if (mysqli_stmt_execute($stmt)) {
            header("Location:upload.php?update=success"); 
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}



if (isset($_POST["submit_tutorial"])) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $title = $_POST["title"];
    $description = $_POST["description"];
    $linkTut = $_POST["links"];
    $status = "pending";


    $targetDir = "pastNotes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFile = $_FILES["file"]["name"];
    $basename = basename($uploadedFile);
    $targetFile = $targetDir . $basename;

    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);


    $sql = "INSERT INTO Post(file_path,PersonalID,title,description,links,status,file_type,created_at,updated_at)
    VALUES (?,?,?,?,?,?,'Tutorial', NOW(), NOW())";

    $stmt = mysqli_prepare($conn, $sql);


    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $basename,
            $personalID,
            $title,
            $description,
            $linkTut,
            $status
        );

        if (mysqli_stmt_execute($stmt)) {
            header("Location:upload.php?update=success"); 
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}




if (isset($_POST["upload_picture"])) {
 
    if ($_FILES["file"]["name"]) {
        $targetDir = "ProfilePicture/";

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $uploadedFile = $_FILES["file"]["name"];
        $basename = basename($uploadedFile);
        $targetFile = $targetDir . $basename;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            
            $sqlUpdatePicture = "UPDATE Personal_Details SET Profile_picture = '$basename' WHERE PersonalID = '$personalID'";

            if (mysqli_query($conn, $sqlUpdatePicture)) {
                echo '<script>alert("profile picture updated successfully.");</script>';
                echo '<script>
                        setTimeout(function(){
                            window.location.href = "settings.php";
                        }, 1000);
                      </script>';
                exit;
            } else {
                echo 'Error updating profile picture: ' . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Error uploading file.");</script>';
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "settings.php";
                    }, 1000);
                  </script>';
           
        }
    } else {
        echo '<script>alert("No file selected for upload.");</script>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "settings.php";
                }, 1000);
              </script>';
    }
}



if (isset($_POST["submit_accessory"])) {
 
    if ($_FILES["file"]["name"]) {
        $targetDir = "ProfilePicture/";

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $uploadedFile = $_FILES["file"]["name"];
        $basename = basename($uploadedFile);
        $targetFile = $targetDir . $basename;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            
            $sql = "INSERT INTO Post (file_path, PersonalID, file_type, status, created_at, updated_at)
        VALUES ('$basename', '$personalID', 'accessory', 'accepted', NOW(), NOW())";


            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("accessory updated successfully.");</script>';
                echo '<script>
                        setTimeout(function(){
                            window.location.href = "upload.php";
                        }, 1000);
                      </script>';
                exit;
            } else {
                echo 'Error updating profile picture: ' . mysqli_error($conn);
            }
        } else {
        echo '<script>alert("Error uploading file.");</script>';
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "upload.php";
                    }, 1000);
                  </script>';
       
        }
    } else {
       echo '<script>alert("No file selected for upload.");</script>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "upload.php";
                }, 1000);
              </script>';  
    }
}











if (isset($_POST["changepassword"])) {
 
    include "db.php";
    
    $newPassword = $_POST['passchange'];
    $newPasswordconf = $_POST['passchangeconf'];
    if($newPassword != $newPasswordconf){
        echo '<script>alert("Password not Match.");</script>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "settings.php";
                }, 1000);
              </script>';
              exit;
    }
   
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    

    $sqlUpdatePassword = "UPDATE Personal_Details SET Password = '$hashedPassword' WHERE PersonalID = '$personalID'";
    
    if (mysqli_query($conn,$sqlUpdatePassword)) {
        echo 'Password updated successfully.';
    } else {
        echo 'Error updating password: ' . mysqli_error($conn);
    }
    

}



mysqli_close($conn);
?>