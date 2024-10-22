<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if (isset($_SESSION['student']) || isset($_SESSION['firstname']) || isset($_SESSION['lastname'])) {
  header('Location: dashbord.php');
  exit();
}

// Include the database connection
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fname = $_POST['Fname'];
    $Mname = $_POST['Mname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $Gender = $_POST['Gender'];
    $Phone_number = $_POST['Phone_number'];
    $Password = $_POST['Password'];
    $Registration_ID = $_POST['Registration_ID'];
    $Role = "student";
    $active = '1';

    $sqlcheck = "SELECT * FROM Student WHERE registration_id = ?";
    $stmt = mysqli_prepare($conn, $sqlcheck);
    mysqli_stmt_bind_param($stmt, "s", $Registration_ID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);


    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo '<div class="success-message">The credential aleardy exist</div>';
    }
    else {
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Personal_Details (Fname, Mname, Lname, Email, Phone_number, Password, Role, Active, Gender)
            VALUES ('$Fname', '$Mname', '$Lname', '$Email', '$Phone_number', '$hashedPassword', '$Role', '$active', '$Gender')";

    $execute = mysqli_query($conn, $sql);

    if ($execute !== false) {
        $PersonalID = mysqli_insert_id($conn);
        $sql = "INSERT INTO Student (Registration_ID, PersonalID) VALUES ('$Registration_ID', '$PersonalID')";
        $execute_student = mysqli_query($conn, $sql);

        if ($execute_student !== false) {
            echo '<script>alert("Data inserted successfully into Student.");</script>';
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "index.php";
                    }, 2000);
                  </script>';
            exit;
        } else {
            echo "Sorry, data not inserted into Student: " . mysqli_error($conn);
        }
    } else {
        echo "Sorry, data not inserted into Personal_Details: " . mysqli_error($conn);
    }
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            margin: 0px;
            background-color: none;
        }

        .box {
            border: none solid;
            width: 700px;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-left: 300px;
            margin-right: 130px;
            background-color: #f3f3f3;
            padding: 20px;
            padding-top: 5px;
            padding: bottom 5px; ;
            border-radius: 10px;

        }
        button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid;
            color: #2a2185;
            transition-duration: 0.4s;
        }
        
        span { 
            margin-bottom: 30px;
            margin-left: 30%;
            margin-right: 30%;
            width: 600px; 
        }
        button:hover {
            color: white;
            background-color: #2a2185;
        }
        h1 {
            width: 150px;
            margin-left: 0px;
            color: #2a2185;
        }
    .container {
            background-image: url('civereg.JPG');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 500px;
            color: red;
            text-align: center;
            padding: 10px 0;
        }
        .container h1 {
            font-size: 2.3rem;
           
        }
       .container p {
            font-size: 1.2rem;
        }
        label {
            color: #2a2185;
        }


        .Password {
        position: relative;
        cursor: pointer;
        user-select: none;
    }
    #passwordField {
        padding-right: 30px; /* Leave space for the eye icon */
    }
    .success-message {
            display: none; 
            background-color: red;
            color: white;
            padding: 30px;
            text-align: center;
            
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <h1>Cive repository registration.</h1>
            <form action="#" method="POST" enctype="multipart/form-data" id="registrationForm">
                <span>
                    <input type="text" name="Registration_ID" placeholder="Registration Number" required><br><br>
                </span>
                <span>
                    <input type="text" name="Fname" placeholder="First Name" required pattern="[A-Za-z ]+" title="Only alphabetical characters and spaces are allowed"><br><br>
                </span>
                <span>
                    <input type="text" name="Mname" placeholder="Middle Name" pattern="[A-Za-z ]+" title="Only alphabetical characters and spaces are allowed"><br><br>
                </span>
                <span>
                    <input type="text" name="Lname" placeholder="Last Name" required pattern="[A-Za-z ]+" title="Only alphabetical characters and spaces are allowed"><br><br>
                </span>
                <span>
                    <input type="Email" name="Email" placeholder="Email" required><br><br>
                </span>
                <span>
                    <input type="tel" name="Phone_number" placeholder="Phone Number" required pattern="[0-9]+" title="Only numeric characters are allowed"><br><br>
                </span>
                <span>
                    <input type="password" id="Password" name="Password" placeholder="Password" oninput="togglePasswordVisibility()" required><br><br>
                
                    
                </span>
                <label>Gender</label><br>
                <input type="radio" name="Gender" value="Male" required>Male
                <input type="radio" name="Gender" value="Female" required>Female<br><br>
                <span>
                    <button type="submit" name="submit">Register</button>
                </span>
              <br>
              <br><br>
                
             <h3>Already have an account ? <a href="index.php">Login</a></h3>
            </form>

        </div>
        
        
    </div>

    <script>

document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.querySelector(".success-message");

        if (successMessage) {
            successMessage.style.display = "block";

            setTimeout(function() {
                successMessage.style.display = "none";
            }, 3000);
        }
    });


    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);}



/*        // Function to validate email format
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Function to validate password
        function validatePassword(Password) {
            // Password should be at least 8 characters long
            // Should contain at least one lowercase letter
            // Should contain at least one uppercase letter
            // Should contain at least one special character
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
            return passwordRegex.test(password);
        }


      // Function to toggle password visibility
    function togglePasswordVisibility() {
        const PasswordInput = document.getElementById('password');
        const toggleButton = document.querySelector('toggleButton');

        if (PasswordInput.type === 'Password') {
            PasswordInput.type = 'text';
            toggleButton.textContent = 'Hide Password';
            
        } else {
            PasswordInput.type = 'Password'; 
            toglleButton.textContent = 'Show Password';
        }
    }



        // Function to handle form submission
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
            const email = this.elements['email'].value;
            const password = this.elements['password'].value;

            if (!validateEmail(Email)) {
                alert("Please enter a valid email address.");
                event.preventDefault();
                return;
            }

        });

*/

    </script>
</body>
</html>