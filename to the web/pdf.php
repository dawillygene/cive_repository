<?php
    if (isset($_GET['fileId'])) {
        $fileId = $_GET['fileId'];

    include "db.php";

    $sql = "SELECT *
    FROM Post P
    WHERE P.PostID ='$fileId'";

        
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

  
            $pathname = $row["file_path"];
            $yearlevel = $row["yearlevel"];
            $department = $row["department"];
            $coursename = $row["coursename"];
            $programe = $row["programe"];
            //$noteslevel = $row["noteslevel"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; 

    
    
    
  

 $file = 'pastNotes/'.$pathname;

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    
    readfile($file);

}

    }

    ?>

