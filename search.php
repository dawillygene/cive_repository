<?php 
include "db.php";

if(isset($_POST['input']))
{
    $input = $_POST['input'];
    $input = mysqli_real_escape_string($conn, $input); // Escape input to prevent SQL injection

    $query = $query = "SELECT
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
    (
    pd.Fname LIKE '%$input%' OR
    p.title LIKE '%$input%' OR
    p.description LIKE '%$input%' OR
    p.file_type LIKE '%$input%' OR
    p.YearLevel LIKE '%$input%' OR
    p.Documentyear LIKE '%$input%' OR
    p.Examlevel LIKE '%$input%' OR
    p.department LIKE '%$input%' OR
    p.Program LIKE '%$input%' OR
    p.Course LIKE '%$input%' OR
    p.links LIKE '%$input%' OR
    p.file_path LIKE '%$input%')
    AND p.status = 'accepted'
ORDER BY
    p.created_at DESC";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<table>";
        echo "<thead>";
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
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row["Fname"] . "_" . $row["Lname"];
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
                echo "<td style='width: 100px;'><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered'>open</span></button></td>";
                echo "<td style='width: 120px;'><a href='pastNotes/$pathname' download>Download</a></td>";
                echo "<td style='width: 100px;'><button class='viewingtutorial' data-userid='$fileId' data-action='openfile'><span class='status delivered'>description</span></button></td>";
                echo "</tr>";

            }

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

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No matching records found.</p>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
</body>

<script>
    var buttons = document.querySelectorAll(".viewingtutorial");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var userId = this.getAttribute("data-userid");
                var action = this.getAttribute("data-action");
                var url = "detailedview.php?userId=" + encodeURIComponent(userId) + "&action=" + encodeURIComponent(action);
                window.location.href = url;
            });
        });

    var buttons = document.querySelectorAll(".statusdelivered");
    buttons.forEach(function(button) {
        button.addEventListener("click", function() {
            var fileId = this.getAttribute("data-file-id");
            window.location.href = "pdf.php?fileId=" + encodeURIComponent(fileId);
        });
    });
    </script>
</body>
</html>