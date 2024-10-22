<?php
session_start();
if (!isset($_SESSION['student']) || !isset($_SESSION['firstname']) || !isset($_SESSION['lastname'])) {
    header('Location: index.php'); 
    exit(); 
}


function notes_retrival()
{
    include "db.php";
    $sql = "SELECT
   pd.*,
   s.Registration_ID,
   p.*
FROM
   Personal_Details pd
LEFT JOIN
   Student s ON pd.PersonalID = s.PersonalID
LEFT JOIN
   Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted' AND p.file_type = 'notes'
ORDER BY
   p.created_at DESC;
";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            //$noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId
 
            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
              
                
             echo "<tr>";
             echo "<td style='width: 200px;'>$username</td>";
             echo "<td style='width: 150px;'>$pathname</td>";
             echo "<td style='width: 10px;'>$yearlevel</td>";
             echo "<td style='width: 100px;'>$department</td>";
             echo "<td style='width: 100px;'>$coursename</td>";
             echo "<td style='width: 100px;'>$programe</td>";
            // echo "<td style='width: 100px;'>$noteslevel</td>";
             echo "<td style='width: 100px;'>$notesyear</td>";
             echo "<td style='width: 100px;'><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered'>open</span></button></td>";
             echo "<td style='width: 120px;'><a href='pastNotes/$pathname' download>Download</a></td>";
             echo "<td style='width: 100px;'><button class='viewingtutorial' data-userid='$fileId' data-action='openfile'><span class='status delivered'>description</span></button></td>";
             echo "</tr>";
             
 
            }
         }

        }
     else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}


function pastpaper_retrival()
{
    include "db.php";
    $sql = "SELECT
    pd.*,
    s.Registration_ID,
    p.*
 FROM
    Personal_Details pd
 LEFT JOIN
    Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
    Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted' AND p.file_type = 'pastpaper'
 ORDER BY
    p.created_at DESC;
 ";
 
     
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

               $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; 
 
            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
              
                
             echo "<tr>";
             echo "<td style='width: 200px;'>$username</td>";
             echo "<td style='width: 150px;'>$pathname</td>";
             echo "<td style='width: 10px;'>$yearlevel</td>";
             echo "<td style='width: 100px;'>$department</td>";
             echo "<td style='width: 100px;'>$coursename</td>";
             echo "<td style='width: 100px;'>$programe</td>";
             echo "<td style='width: 100px;'>$noteslevel</td>";
             echo "<td style='width: 100px;'>$notesyear</td>";
             echo "<td style='width: 100px;'><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered'>open</span></button></td>";
             echo "<td style='width: 120px;'><a href='pastNotes/$pathname' download>Download</a></td>";
             echo "<td style='width: 100px;'><button class='viewingtutorial' data-userid='$fileId' data-action='openfile'><span class='status delivered'>description</span></button></td>";
             echo "</tr>";
        
    }
        }
    }
    
    else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
 
}


function retrive_book()
{

    include "db.php";

    $sql = "SELECT
    pd.*,
    s.Registration_ID,
    p.*
 FROM
    Personal_Details pd
 LEFT JOIN
    Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
    Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted' AND p.file_type = 'book'
 ORDER BY
    p.created_at DESC;
 ";
     
    $result = mysqli_query($conn,$sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId
 
            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>"; 
                echo "<td> $title</td>";
                echo "<td>$department</td>";
            //echo "<td><a href='pastNotes/' download>Download</a></td>";
            echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }

        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


function retrive_installation()
{

    include "db.php";

    $sql = "SELECT
    pd.*,
    s.Registration_ID,
    p.*
 FROM
    Personal_Details pd
 LEFT JOIN
    Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
    Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted' AND p.file_type = 'installation'
 ORDER BY
    p.created_at DESC;
 ";
     
    $result = mysqli_query($conn,$sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId
 
            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>"; 
                echo "<td> $title</td>";
                echo "<td>$department</td>";
            //echo "<td><a href='pastNotes/' download>Download</a></td>";
            echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }

        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


function retrive_tutorial()
{

    include "db.php";

    $sql = "SELECT
    pd.*,
    s.Registration_ID,
    p.*
 FROM
    Personal_Details pd
 LEFT JOIN
    Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
    Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted' AND p.file_type = 'tutorial'
 ORDER BY
    p.created_at DESC;
 ";
     
    $result = mysqli_query($conn,$sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId
 
            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>"; 
                echo "<td> $title</td>";
                echo "<td>$department</td>";
            //echo "<td><a href='pastNotes/' download>Download</a></td>";
            echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }

        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}



function notes_and_pastpaper()
{
    include "db.php";
    $sql = "SELECT
   pd.*,
   s.Registration_ID,
   p.*
FROM
   Personal_Details pd
LEFT JOIN
   Student s ON pd.PersonalID = s.PersonalID
LEFT JOIN
   Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted'
ORDER BY
   p.created_at DESC;
";
    
   $result = mysqli_query($conn, $sql);
  
   if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
           $username = $row["Fname"] ."_".$row["Lname"];
           $title = $row['title'];
           $pathname = $row["file_path"];
           $yearlevel = $row["YearLevel"];
           $department = $row["file_type"];
           $coursename = $row["Course"];
           $noteslevel = $row["Examlevel"];
           $programe = $row["Program"];
           $notesyear = $row["Documentyear"];
           $fileId = $row["PostID"]; // Added fileId

           if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
             
               
            echo "<tr>";
            echo "<td style='width: 200px;'>$username</td>";
            echo "<td style='width: 150px;'>$pathname</td>";
            echo "<td style='width: 10px;'>$yearlevel</td>";
            echo "<td style='width: 100px;'>$department</td>";
            echo "<td style='width: 100px;'>$coursename</td>";
            echo "<td style='width: 100px;'>$programe</td>";
            echo "<td style='width: 100px;'>$noteslevel</td>";
            echo "<td style='width: 100px;'>$notesyear</td>";
            echo "<td style='width: 100px;'><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered'>open</span></button></td>";
            echo "<td style='width: 120px;'><a href='pastNotes/$pathname' download>Download</a></td>";
            echo "<td style='width: 100px;'><button class='viewingtutorial' data-userid='$fileId' data-action='openfile'><span class='status delivered'>description</span></button></td>";
            echo "</tr>";
            

           }
        }
    
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}


function tutorial_book_installation()
{
    include "db.php";
    $sql = "SELECT
   pd.*,
   s.Registration_ID,
   p.*
FROM
   Personal_Details pd
LEFT JOIN
   Student s ON pd.PersonalID = s.PersonalID
LEFT JOIN
   Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted'
ORDER BY
   p.created_at DESC;
";
    
   $result = mysqli_query($conn, $sql);
  
   if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
           $username = $row["Fname"] ."_".$row["Lname"];
           $title = $row['title'];
           $pathname = $row["file_path"];
           $yearlevel = $row["YearLevel"];
           $department = $row["file_type"];
           $coursename = $row["Course"];
           $noteslevel = $row["Examlevel"];
           $programe = $row["Program"];
           $notesyear = $row["Documentyear"];
           $fileId = $row["PostID"]; // Added fileId

           if($row['title'])
           {
               echo '<tr>';
               echo "<td>$username</td>"; 
               echo "<td> $title</td>";
               echo "<td>$department</td>";
           //echo "<td><a href='pastNotes/' download>Download</a></td>";
           echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
           echo '</tr>'; 
           }

        }
    
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}



function All_posts()
{
    include "db.php";
     $sql = "SELECT
    pd.*,
    s.Registration_ID,
    p.*
FROM
    Personal_Details pd
LEFT JOIN
    Student s ON pd.PersonalID = s.PersonalID
LEFT JOIN
    Post p ON pd.PersonalID = p.PersonalID WHERE p.status = 'accepted'
ORDER BY
    p.created_at DESC;
";
     
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId

            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
              
                
                echo "<tr>";
                echo "<tr>";
                echo "<th>Username</th>";
                echo "<th>Title/Pathname</th>";
                echo "<th>Year Level</th>";
                echo "<th>Department</th>";
                echo "<th>Course</th>";
                echo "<th>Program</th>";
                echo "<th>Notes Level</th>";
                echo "<th>Notes Year</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "<td>$username</td>";
                echo "<td>$pathname</td>";
                echo "<td>$yearlevel</td>";
                echo "<td>$department</td>";
                echo "<td>$coursename</td>";
                echo "<td>$programe</td>";
                echo "<td>$noteslevel</td>";
                echo "<td>$notesyear</td>";
                echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
                echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
                echo "<td><button class='viewingtutorial' data-userid='$fileId' data-action='openfile' ><span class='status delivered'>description</span></button></td>";
                echo "</tr>";

            }

            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>"; 
                echo "<td> $title</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
            echo '<td>' . $row['title'] . '</td>';
            //echo "<td><a href='pastNotes/' download>Download</a></td>";
            echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }



           
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}
 




function Active_user()
{
    include "db.php";
     $sql = "SELECT Fname,Lname,PersonalID FROM Personal_Details P WHERE P.Active = '1'";
      
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ." ".$row["Lname"];
            $userId = $row["PersonalID"]; 
                echo "<tr>";
                echo "<td>$username</td>";
                echo '<td><button class="btn" data-userid="' . $userId . '" data-action="stop" >Stop</button></td>';
                echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}

function Inctive_user()
{
    include "db.php";
     $sql = "SELECT Fname,Lname,PersonalID FROM Personal_Details P WHERE P.Active = '0'";
      
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] . " " . $row["Lname"];
            $userId = $row["PersonalID"]; 
            echo "<tr>";
            echo "<td>$username</td>";
            echo '<td><button class="btn"  data-action="accept"  data-userid="' . $userId . '">Allow</button></td>';
            echo "</tr>";
        }        
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}
 


function pending_posts()
{
    include "db.php";
     $sql = "SELECT
     pd.*,
     s.Registration_ID,
     p.*
 FROM
     Personal_Details pd
 LEFT JOIN
     Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
     Post p ON pd.PersonalID = p.PersonalID
 WHERE
     p.status = 'pending'
 ORDER BY
     p.created_at DESC;
";
     
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId
            

            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
             

                echo "<tr>";
                echo "<td>$username</td>";
                echo "<td>$pathname</td>";
                echo "<td>$yearlevel</td>";
                echo "<td>$department</td>";
                echo "<td>$coursename</td>";
                echo "<td>$programe</td>";
                echo "<td>$noteslevel</td>";
                echo "<td>$notesyear</td>";
                echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
                echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="accept_post">Accept</button></td>';
                echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="reject_post" >Reject</button></td>';
                echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
                echo "</tr>";

            }

            if($row['title'])
            {
                echo '<tr>';
               echo "<td>$username</td>"; 
               echo "<td> $title</td>";
               echo "<td>$department</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
            echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="accept_post">Accept</button></td>';
            echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="reject_post">Reject</button></td>';
          //  echo "<td><a href='pastNotes/' download>Download</a></td>";
          echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }



           
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}


 
function Accepted_posts()
{
    include "db.php";
     $sql = "SELECT
     pd.*,
     s.Registration_ID,
     p.*
 FROM
     Personal_Details pd
 LEFT JOIN
     Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
     Post p ON pd.PersonalID = p.PersonalID
 WHERE
     p.status = 'accepted'
 ORDER BY
     p.created_at DESC;
";
     
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId


            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
             
                echo "<tr>";
                echo "<td>$username</td>";
                echo "<td>$pathname</td>";
                echo "<td>$yearlevel</td>";
                echo "<td>$department</td>";
                echo "<td>$coursename</td>";
                echo "<td>$programe</td>";
                echo "<td>$noteslevel</td>";
                echo "<td>$notesyear</td>";
                echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
                echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="reject_post">Reject</button></td>';
                echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
                echo "</tr>";

            }

            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>";
                echo "<td> $title</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
            echo '<td>' . $row['title'] . '</td>';
            echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="reject_post">Reject</button></td>';
          //  echo "<td><a href='pastNotes/' download>Download</a></td>";
          echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }



           
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}
 

 
function Rejected_posts()
{
    include "db.php";
     $sql = "SELECT
     pd.*,
     s.Registration_ID,
     p.*
 FROM
     Personal_Details pd
 LEFT JOIN
     Student s ON pd.PersonalID = s.PersonalID
 LEFT JOIN
     Post p ON pd.PersonalID = p.PersonalID
 WHERE
     p.status = 'rejected'
 ORDER BY
     p.created_at DESC;
";
     
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId


            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {
             

                echo "<tr>";
                echo "<td>$username</td>";
                echo "<td>$pathname</td>";
                echo "<td>$yearlevel</td>";
                echo "<td>$department</td>";
                echo "<td>$coursename</td>";
                echo "<td>$programe</td>";
                echo "<td>$noteslevel</td>";
                echo "<td>$notesyear</td>";
                echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
                echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="accept_post">Accept</button></td>';
                echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
                echo "</tr>";

            }

            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>";
                echo "<td> $title</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
            echo '<td>' . $row['title'] . '</td>';
            echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="accept_post">Accept</button></td>';
          //  echo "<td><a href='pastNotes/' download>Download</a></td>";
          echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '</tr>'; 
            }



           
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}




function Myposts()
{
    include "db.php";
 $registrationNO = mysqli_real_escape_string($conn, $_SESSION['student']);



 if ($_SESSION['Role'] == 'admin') {


    $sql = "SELECT pd.*, sA.System_AdminID, p.*
    FROM
        Personal_Details pd
    LEFT JOIN
    System_Admin sA ON pd.PersonalID = sA.PersonalID
    LEFT JOIN
        Post p ON sA.PersonalID = p.PersonalID WHERE sA.admin_username = '$registrationNO';
    ";
   
} else if ($_SESSION['Role'] == 'student') {


    $sql = "SELECT pd.*, s.Registration_ID, p.*
    FROM
        Personal_Details pd
    LEFT JOIN
        Student s ON pd.PersonalID = s.PersonalID
    LEFT JOIN
        Post p ON pd.PersonalID = p.PersonalID WHERE s.Registration_ID = '$registrationNO'
    ORDER BY
        p.created_at DESC;
    ";
    
}

     
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] ."_".$row["Lname"];
            $title = $row['title'];
            $pathname = $row["file_path"];
            $yearlevel = $row["YearLevel"];
            $department = $row["file_type"];
            $coursename = $row["Course"];
            $noteslevel = $row["Examlevel"];
            $programe = $row["Program"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId


            if ($pathname && ($row['file_type'] == 'pastpaper' || $row['file_type'] == 'notes' || $row['file_type'] == 'notes')) {

                echo "<tr>";
                echo "<td>$username</td>";
                echo "<td>$pathname</td>";
                echo "<td>$yearlevel</td>";
                echo "<td>$department</td>";
                echo "<td>$coursename</td>";
                echo "<td>$programe</td>";
                echo "<td>$noteslevel</td>";
                echo "<td>$notesyear</td>";
                echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
                echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
                echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="delete_post">Delete</button></td>';
                echo "</tr>";

            }

            if($row['title'])
            {
                echo '<tr>';
                echo "<td>$username</td>"; 
                echo "<td> $title</td>";
                echo "<td>$department</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
            //echo "<td><a href='pastNotes/' download>Download</a></td>";
            echo "<td><button class='viewingtutorial' data-userid='" . $row["PostID"] . "' data-action='opentext'><span class='status delivered'>view</span></button></td>";
            echo '<td><button class="btn" data-userid="' . $fileId . '" data-action="delete_post">Delete</button></td>';
           
            
            echo '</tr>'; 
            }
    
            



           
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}
 



?>
