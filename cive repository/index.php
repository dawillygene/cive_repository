<?php session_start(); 
if (isset($_SESSION['student']) || isset($_SESSION['firstname']) || isset($_SESSION['lastname'])) {


  if($_SESSION['Role'] == 'admin'){
    header('Location: addDash.php'); 
    exit(); 
} 
else if($_SESSION['Role'] == 'student')
{
  header('Location: dashbord.php'); 
  exit(); 
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <title>Login Page</title>
  <style>
    body {
      margin: 0;
      /* display: flex; */
      /* justify-content: center;
  align-items: center; */
      font-family: Arial, sans-serif;
    }

    h1 {
      color: #2a2185;
    }

    .login-container {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      margin-left: 42%;
    }

    .input-container {
      position: relative;
      margin-bottom: 15px;
    }

    input {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .password-toggle {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 14px;
      color: #007bff;
    }

    button {
      background-color: #f5f5f5;
      color: #2a2185;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      transition-duration: 0.4s;
    }

    button:hover {
      color: white;
      background-color: #2a2185;
    }


    .container {
      background-image: url('server3.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      height: 500px;
      color: white;
      text-align: center;
      padding: 100px 0;
    }

    .container h1 {
      font-size: 2.5rem;
    }

    .container p {
      font-size: 1.2rem;

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
    <div class="login-container">
      <h1>Login</h1>
      <form id="login-form" action="" method="POST">
        <div class="input-container">
          <input type="text" id="username" placeholder="registrationNO" name="registrationNO" required>
        </div>
        <div class="input-container">
          <input type="password" id="password" placeholder="password" name="password" required>
          <span class="password-toggle" id="password-toggle"><i class="far fa-eye"></i></span>
        </div>
        <button type="submit">Login</button>
<br><br><br>
<h3 style="color:#2a2185";>Don't have an account? <a href="regisrer.php">Register </a><h3>


<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $registrationNO = $_POST['registrationNO'];
  $enteredPassword = $_POST['password'];


  $sql = "SELECT S.Registration_ID, P.Password, P.Fname ,P.Lname,P.Role
  FROM Student S
  JOIN Personal_Details P ON S.PersonalID = P.PersonalID 
  WHERE P.Active = '1' AND  S.Registration_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $registrationNO);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

$sqlm = "SELECT sy.admin_username, pd.Password ,pd.Fname ,pd.Lname ,pd.Role
FROM System_Admin sy JOIN Personal_Details pd ON sy.PersonalID = pd.PersonalID
WHERE admin_username = ?";

  $stmty = $conn->prepare($sqlm);
  $stmty->bind_param("s", $registrationNO);
  $stmty->execute();
  $result_admin = $stmty->get_result();
  $admin = $result_admin->fetch_assoc();

  if ($admin) {

    if (password_verify($enteredPassword, $admin['Password'])) {
      $_SESSION['student'] = $admin['admin_username'];
      $_SESSION['firstname'] = $admin['Fname'];
      $_SESSION['lastname'] = $admin['Lname'];
      $_SESSION['Role'] = $admin['Role'];
      header("Location: addDash.php");
      exit();
    } else {
      echo '<div class="success-message">Incorrect password or Username</div>';
    }
  } 

 


if ($student) {
  if (password_verify($enteredPassword, $student['Password'])) {
    $_SESSION['student'] = $student['Registration_ID'];
    $_SESSION['firstname'] = $student['Fname'];
    $_SESSION['lastname'] = $student['Lname'];
    $_SESSION['Role'] = $student['Role'];
    header("Location: dashbord.php");
    exit();
  } else {
    echo '<div class="success-message">Incorrect password or Username</div>';
  }
} 

else{
  echo '<div class="success-message">Incorrect password or Username</div>';
}

$stmt->close();
}

?>
      </form>
    </div>
    <script>
      const passwordToggle = document.getElementById('password-toggle');
      const passwordInput = document.getElementById('password');

      passwordToggle.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>';
        } else {
          passwordInput.type = 'password';
          passwordToggle.innerHTML = '<i class="far fa-eye"></i>';
         
        }
      });

      document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.querySelector(".success-message");

        if (successMessage) {
            successMessage.style.display = "block";

            setTimeout(function() {
                successMessage.style.display = "none";
            }, 2000);
        }
    });

    </script>

</body>
</html>