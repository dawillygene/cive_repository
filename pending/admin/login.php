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
h1{
  color:#2a2185;
}

.login-container {
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 300px;
  margin-left:42%;
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
  color:#2a2185;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  transition-duration:0.4s;
}

button:hover{
    color:white;
    background-color: #2a2185;
}

/* ===== background pic ===== */
.container {
    background-image: url('server3.jpg');
    background-size: cover; /* Adjust as needed */
    background-repeat: no-repeat; /* Adjust as needed */
    background-position: center center; /* Adjust as needed */
    height: 653px; /* Set container height */
    color: white; /* Text color to contrast with the image */
    text-align: center;
    padding: 100px 0;
}

.container h1 {
    font-size: 2.5rem;
}

.container p {
    font-size: 1.2rem;

}

  </style>
</head>
<body>
<div class="container">

<div class="login-container">
    <h1>Login</h1>
    <form id="login-form" action="#" method="POST">
      <div class="input-container">
        <input type="text" id="username" placeholder="registrationNO" name="registrationNO" required>
      </div>
      <div class="input-container">
        <input type="password" id="password" placeholder="password" name="password" required>
        <span class="password-toggle" id="password-toggle"><i class="far fa-eye"></i></span>
      </div>
      <button type="submit">Login</button>
      <h3 style="color:#2a2185;">Don't have an account? <a href="registration.php">Sign Up.</a></h3>
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
    passwordToggle.innerHTML = '<i class="far fa-eye"></i>';d
  }
});

  </script>







<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if the admin is already logged in


require_once 'databaseconnect.php';

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registrationNO= $_POST['registrationNO'];
    $password = $_POST['password'];

    // Validate admin credentials
    $sql = "SELECT * FROM student WHERE tnumber = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $registrationNO, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin) {
        $_SESSION['student'] = $admin['registrationNO'];
        header("Location: Dashbord/dashbord.php");
        exit();
    } else {
        $login_error = "Invalid registrationNO or password.";
    }

    $stmt->close();
}
?>


</div>

</body>
</html>
