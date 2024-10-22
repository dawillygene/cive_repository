<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stle.css">    
    <title>description view</title>
    <style>

/* Your CSS styles here */
body {
    padding: 20px;
    background-color:#011f1c;
}


.floatcomment{
    display: flex;
    margin-bottom: 1%;
   
}
.delete-comment{

align-items: flex-end;
color: brown;
}

.user-comment {
    display: block;
    align-items: center; /* Vertical alignment */
    background-color: #c1c4c7;
    border-radius: 12px;
    margin: auto ;
    padding: 10px; /* Adjust as needed */
    margin-bottom: 10px; /* Adds spacing between comments */
}

#preview-image {
    max-width: 2%;
    height: auto;
    border-radius: 50%; /* Makes the image circular */
    margin-right: 10px; /* Adds spacing between image and text */
}

.user-comment p {
    font-size: large;
    margin: 0; /* Remove default margin for the <p> element */
}
/* 
        thead {
            font-size: larger;
            font-weight: bold;
            color: rgb(255, 255, 255);
            background-color: #112a30;
        }
        th,
        td {
            padding: 2%;
            border-radius: 12px 12px 12px 12px;
        }
        td {
            font-size: large;
        }
        table {
            background-color: rgb(241, 241, 243);
            border-radius: 12px;

        } */


        .buttons:focus {
    outline-color: transparent;
    outline-style:solid;
    box-shadow: 0 0 0 4px #5a01a7;
    transition: 0.7s;

        }

        tr , .user-comment{
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
  tr td ,.user-comment{
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



    </style>
</head>
<body>

<?php

include "db.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);



$registration = mysqli_real_escape_string($conn,$_SESSION['student']);

if($_SESSION['Role']=='admin'){
    $checkSql = "SELECT PersonalID 
    FROM System_Admin s where s.admin_username = '$registration'";
}
if($_SESSION['Role']=='student'){
    $checkSql = "SELECT PersonalID 
    FROM Student s where s.Registration_ID = '$registration'";
}




$result = mysqli_query($conn,$checkSql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $loggedInUserID  = $row['PersonalID'];
}


if (isset($_GET['userId']) && isset($_GET['action'])) {
    $userId = $_GET['userId'];
    $action = $_GET['action'];

    if ($action ==='opentext'){
      
   
    // Retrieve the tutorial post
    $sql = "SELECT * FROM Post WHERE PostID = '$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $postID = $row['PostID'];
            echo '<table>';
            echo '<thead><th>' . $row["title"] . '</th>
            
                 </thead>';
            echo '<tbody>';
            echo "<tr width=100>";
            echo '<td>' . $row['description'] . '</td>';
            echo "</tr>";
            if( $row['links']){
            echo "<tr width=100>";
            echo "<td><a href='" . $row['links'] . "'>" . $row['links'] . "</a></td>";
          
            echo "</tr>";
        }

            echo "<tr>";
         
            if ($row['file_path'] && ($row['file_type']=='Tutorial' || $row['file_type']=='installation')) {
                echo '<td>
                <video width="640" height="360" controls>
                <source src="pastNotes/' . $row['file_path'] . '" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                </td>';
            }
            if ($row['file_path'] && $row['file_type'] == 'book') {
                echo '<td><a href="pastNotes/' . $row['file_path'] . '">Download</a></td>';
            }
            
            echo "</tr>";
            echo '</tbody>';
            echo '</table>';

            // Display the comment button
            echo '<table>';
            echo '<tr><td><button class="buttons" onclick="showCommentForm()">Add Comment</button></td></tr>';
            echo '</table>';
        }
    }

    ?>
<!-- Comment Form -->
<div id="commentForm" style="display: none;">
    <form action="process_comment.php" method="POST">
        <label for="comment">Your Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="UserId"   value="<?php  echo $userId; ?>">
        <input type ="hidden" name="action"  value ="<?php echo $action; ?>">
        <input type="hidden" name="PostId"   value="<?php  echo $postID; ?>">
        <input  class="buttons" type="submit" value="Submit Comment">
    </form>
</div>
    <?php
   $commentsSql = "SELECT pd.Fname, pd.Lname, c.*, pd.Profile_picture
   FROM Personal_Details pd
   JOIN Comment c ON pd.PersonalID = c.PersonalID
   WHERE c.PostID IN (
       SELECT PostID
       FROM Post
       WHERE PostID  = '$userId'
   )
   ORDER BY c.created_at DESC;
   ";
$commentsResult = mysqli_query($conn,$commentsSql);
    if (mysqli_num_rows($commentsResult) > 0) {
        while ($Row = mysqli_fetch_assoc($commentsResult)) {
?>
        
        <div class="user-comment">
                <div class='floatcomment'>
            <img id="preview-image" src="ProfilePicture/<?php echo $Row['Profile_picture']; ?>" alt="Profile Picture">
            <p><?php echo $Row['Fname']." ".$Row['Lname']; ?> : </p> 
       
                 </div>



<?php
        
            echo '<p>' . $Row['content'] . '</p>';
           

       
            if ($Row['PersonalID'] == $loggedInUserID) {
                echo '<button class="delete-comment" data-comment-id="' . $Row['CommentID'] . '">Delete</button>';
            }
            echo '<p>Created on : '.$Row["created_at"] .'</p>';

            echo '</div>';
        }
    }
}

else if ($action ==='openfile'){
    $sql = "SELECT * FROM Post WHERE PostID = '$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $postID = $row['PostID'];
            echo '<table>';
            echo '<thead><th>' . $row["file_path"] . '</th></thead>';
            echo "<tr width=100>";
            echo '<td>' . $row['description'] . '</td>';
            echo "</tr>";
            echo '</table>';

            
            echo '<table>';
            echo '<tr><td><button class="buttons" onclick="showCommentForm()">Add Comment</button></td></tr>';
            echo '</table>';
        }
    }

    ?>

<div id="commentForm" style="display: none;">
    <form action="process_comment.php" method="POST">
        <label for="comment">Your Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="UserId"   value="<?php  echo $userId; ?>">
        <input type ="hidden" name="action"  value ="<?php echo $action; ?>">
        <input type="hidden" name="PostId"   value="<?php  echo $postID; ?>">
        <input  style="width: 10px;" class="button" type="submit" value="Submit Comment">
    </form>
</div>
    <?php
   $commentsSql = "SELECT pd.Fname, pd.Lname, c.*, pd.Profile_picture
   FROM Personal_Details pd
   JOIN Comment c ON pd.PersonalID = c.PersonalID
   WHERE c.PostID IN (
       SELECT PostID
       FROM Post
       WHERE PostID  = '$userId'
   )
   ORDER BY c.created_at DESC;
   ";
$commentsResult = mysqli_query($conn,$commentsSql);
    if (mysqli_num_rows($commentsResult) > 0) {
        while ($Row = mysqli_fetch_assoc($commentsResult)) {
?>
            <div class="user-comment">
                <div class='floatcomment'>
            <img id="preview-image" src="ProfilePicture/<?php echo $Row['Profile_picture']; ?>" alt="Profile Picture">
            <p><?php echo $Row['Fname']." ".$Row['Lname']; ?> : </p> 
       
                 </div>



<?php
        
            echo '<p>' . $Row['content'] . '</p>';
           

            // Check if the comment belongs to the logged-in user
            if ($Row['PersonalID'] == $loggedInUserID) {
                echo '<button class="delete-comment" data-comment-id="' . $Row['CommentID'] . '">Delete</button>';
                echo '<p>Created on : '.$Row["created_at"] .'</p>';
            }

            echo '</div>';
        }
    }




}

else{ echo 'no action';}
}
?>




<script>
    // Function to handle comment deletion
    function deleteComment(commentID) {
        if (confirm("Are you sure you want to delete this comment?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_comment.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var commentElement = document.querySelector('.user-comment');
                    if (commentElement) {
                        commentElement.remove();
                    }
                }
            };
            xhr.send("comment_id=" + commentID);
        }
    }


    var deleteButtons = document.querySelectorAll('.delete-comment');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var commentID = button.getAttribute('data-comment-id');
            deleteComment(commentID);
        });
    });

    function showCommentForm() {
        var commentForm = document.getElementById("commentForm");
        commentForm.style.display = "block";
    }
</script>

</body>
</html>
