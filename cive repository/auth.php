

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
  WHERE S.Registration_ID = ?";

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