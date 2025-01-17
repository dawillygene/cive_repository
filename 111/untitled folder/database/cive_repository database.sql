--Corrected version of the database

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  fname VARCHAR(255) NOT NULL,
  mname VARCHAR(255) NOT NULL,
  lname VARCHAR(255) NOT NULL,
  phone_number VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  profile_picture varchar(255), --Storing the pathname of the profile picture
  role VARCHAR(15) CHECK(role IN ('student', 'admin')),
  active BIT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE students (
  user_id INT NOT NULL,
  registration_id VARCHAR(255) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE admins (
  user_id INT NOT NULL,
  admin_username VARCHAR(255) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE posts (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  file_type VARCHAR(255) NOT NULL,   --((for pastpaper, notes, or program)
  YearLevel int CHECK (YearLevel BETWEEN 1 AND 4), 
  Documentyear varchar(4) NOT NULL,
  Examlevel varchar(20) CHECK (Examlevel IN ('Test 01', 'Test 02', 'UE')),  --(for pastpaper only)
  department  VARCHAR(255),
  Program varchar(100),
  Course varchar(100),
  description text, --(used for accessories,tutorials,installation,books)
  links  VARCHAR(255), --(used for books,tutorial,accessories,setup)
  file_path varchar(255),
  status VARCHAR(255) NOT NULL,      --(pending, approved, rejected)
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
  
);

CREATE TABLE comments (
  id INT NOT NULL AUTO_INCREMENT,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (post_id) REFERENCES posts (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
);









corrected v1:

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  fname VARCHAR(255) NOT NULL,
  mname VARCHAR(255) NOT NULL,
  lname VARCHAR(255) NOT NULL,
  phone_number VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  profile_picture VARCHAR(255), -- Storing the pathname of the profile picture
  role VARCHAR(15) CHECK (role IN ('student', 'admin')),
  active BIT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE students (
  user_id INT NOT NULL,
  registration_id VARCHAR(255) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE admins (
  user_id INT NOT NULL,
  admin_username VARCHAR(255) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE posts (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  file_type VARCHAR(255) NOT NULL,  
  YearLevel INT CHECK (YearLevel BETWEEN 1 AND 4), 
  Documentyear VARCHAR(4) NOT NULL,
  Examlevel VARCHAR(20) CHECK (Examlevel IN ('Test 01', 'Test 02', 'UE')),
  department VARCHAR(255),
  Program VARCHAR(100),
  Course VARCHAR(100),
  description TEXT,
  links VARCHAR(255),
  file_path VARCHAR(255),
  status VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE comments (
  id INT NOT NULL AUTO_INCREMENT,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (post_id) REFERENCES posts (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
);





corrected v1.1


CREATE DATABASE CIVE_REPOSITORY;
USE CIVE_REPOSITORY;

CREATE TABLE Personal_Details(
  PersonalID INT IDENTITY (1,1)NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Fname VARCHAR(25) NOT NULL,
  Mname VARCHAR(25) NOT NULL,
  Lname VARCHAR(25) NOT NULL,
  Phone_number INT NOT NULL,
  Password VARCHAR(20) NOT NULL,
  Profile_picture varchar(255),
  Role VARCHAR(10) CHECK(role IN ('student', 'admin')),
  Active BIT,
  PRIMARY KEY (PersonalID)
);

CREATE TABLE Student(
  Registration_ID VARCHAR (10) NOT NULL,
  PersonalID INT NOT NULL,
  PRIMARY KEY (Registration_ID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details(PersonalID)
);

CREATE TABLE Sytem_Admin(
  System_AdminID INT NOT NULL,
  PersonalID INT NOT NULL,
  admin_username VARCHAR(255) NOT NULL,
  PRIMARY KEY (System_AdminID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details(PersonalID)
);

CREATE TABLE Post(
  PostID INT IDENTITY (1,1) NOT NULL,
  PersonalID INT NOT NULL,
  title VARCHAR(255),
  file_type VARCHAR(255) NOT NULL,   --((for pastpaper, notes, or program)
  YearLevel int CHECK (YearLevel BETWEEN 1 AND 4), 
  Documentyear varchar(4),
  Examlevel varchar(20) CHECK (Examlevel IN ('Test 01', 'Test 02', 'UE')),  --(for pastpaper only)
  department  VARCHAR(255),
  Program varchar(100),
  Course varchar(100),
  description text, --(used for accessories,tutorials,installation,books)
  links  VARCHAR(255), --(used for books,tutorial,accessories,setup)
  file_path varchar(255),
  status VARCHAR(255) NOT NULL,      --(pending, approved, rejected)
  created_at DATETIME NOT NULL,
  updated_at DATETIME,
  PRIMARY KEY (PostID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details (PersonalID) 
);

CREATE TABLE Comment(
  CommentID INT IDENTITY (1,1)NOT NULL,
  PostID INT NOT NULL,
  PersonalID INT NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (CommentID),
  FOREIGN KEY (PostID) REFERENCES Post (PostID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details (PersonalID)
);




v1.1  corrected :

-- Create the CIVE_REPOSITORY database
CREATE DATABASE CIVE_REPOSITORY;
USE CIVE_REPOSITORY;

-- Create the Personal_Details table
CREATE TABLE Personal_Details (
  PersonalID INT AUTO_INCREMENT PRIMARY KEY,
  Email VARCHAR(50) NOT NULL,
  Fname VARCHAR(25) NOT NULL,
  Mname VARCHAR(25) NOT NULL,
  Lname VARCHAR(25) NOT NULL,
  Phone_number INT NOT NULL,
  Password VARCHAR(20) NOT NULL,
  Profile_picture VARCHAR(255),
  Role ENUM('student','admin') NOT NULL,
  Active BIT
);

-- Create the Student table
CREATE TABLE Student (
  Registration_ID VARCHAR(30) NOT NULL,
  PersonalID INT NOT NULL,
  PRIMARY KEY (Registration_ID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details(PersonalID)
);

-- Create the System_Admin table
CREATE TABLE System_Admin (
  System_AdminID INT NOT NULL,
  PersonalID INT NOT NULL,
  admin_username VARCHAR(255) NOT NULL,
  PRIMARY KEY (System_AdminID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details(PersonalID)
);

-- Create the Post table
CREATE TABLE Post (
  PostID INT AUTO_INCREMENT PRIMARY KEY,
  PersonalID INT NOT NULL,
  title VARCHAR(255),
  file_type ENUM('pastpaper', 'notes', 'program') NOT NULL,
  YearLevel INT CHECK (YearLevel BETWEEN 1 AND 4),
  Documentyear VARCHAR(4),
  Examlevel ENUM('Test 01', 'Test 02', 'UE'),
  department VARCHAR(255),
  Program VARCHAR(100),
  Course VARCHAR(100),
  description TEXT,
  links VARCHAR(255),
  file_path VARCHAR(255),
  status VARCHAR(255) NOT NULL, pending , accepted , rejected
  created_at DATETIME NOT NULL,
  updated_at DATETIME,
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details(PersonalID)
);

-- Create the Comment table
CREATE TABLE Comment (
  CommentID INT AUTO_INCREMENT PRIMARY KEY,
  PostID INT NOT NULL,
  PersonalID INT NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  FOREIGN KEY (PostID) REFERENCES Post(PostID),
  FOREIGN KEY (PersonalID) REFERENCES Personal_Details(PersonalID)
);





<?php
session_start();

if (isset($_POST["pastpaper"])) {
    $yearlevel = $_POST["yearlevel"];
    $department = $_POST["department"];
    $program = $_POST["Program"];
    $coursename = $_POST["coursename"];
    $examlevel = $_POST["examlevel"];
    $pastyear = $_POST["pastyear"];
    $status = "pending";

    include "db.php";

    $targetDir = "pastNotes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $uploadedFile = $_FILES["file"]["name"];
    $basename = basename($uploadedFile);
    $targetFile = $targetDir . $basename;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $sqlfile = "INSERT INTO Post (file_path, PersonalID, title, file_type, YearLevel, Documentyear, Examlevel, department, Program, Course, description, links, status, created_at, updated_at)
                    VALUES ('$basename', $_SESSION[PersonalID], '', 'pastpaper', $yearlevel, '$pastyear', '$examlevel', '$department', '$program', '$coursename', '', '', '$status', NOW(), NOW())";
        
        if (mysqli_query($conn, $sqlfile)) {
            $fileId = mysqli_insert_id($conn);
            $sqlpastpaper = "INSERT INTO notes (id, noteslevel, notesyear)
                             VALUES ($fileId, '$examlevel', '$pastyear')";
            mysqli_query($conn, $sqlpastpaper);
            echo 'Data inserted successfully';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Error uploading file.';
    }
}
?>






/* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --blue: #2a2185;
  --white: #fff;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 100vh;
  overflow-x: hidden;
}

.container {
  position: relative;
  width: 100%;
}

/* =============== Navigation ================ */
.navigation {
  position: fixed;
  width: 80px;
  height: 100%;
  background: var(--blue);
  border-left: 10px solid var(--blue);
  transition: 0.5s;
  overflow: hidden;
}
.navigation.active {
  width: 300px;
}

.navigation ul {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.navigation ul li {
  position: relative;
  width: 100%;
  list-style: none;
  border-top-left-radius: 30px;
  border-bottom-left-radius: 30px;
}

.navigation ul li:hover,
.navigation ul li.hovered {
  background-color: var(--white);
}

.navigation ul li:nth-child(1) {
  margin-bottom: 40px;
  pointer-events: none;
}

.navigation ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a {
  color: var(--blue);
}

.navigation ul li a .icon {
  position: relative;
  display: block;
  min-width: 60px;
  height: 60px;
  line-height: 75px;
  text-align: center;
}
.navigation ul li a .icon ion-icon {
  font-size: 1.75rem;
}

.navigation ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
}

/* --------- curve outside ---------- */
.navigation ul li:hover a::before,
.navigation ul li.hovered a::before {
  content: "";
  position: absolute;
  right: 0;
  top: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px 35px 0 10px var(--white);
  pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li.hovered a::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px -35px 0 10px var(--white);
  pointer-events: none;
}

/* ===================== Main ===================== */
.main {
  position: absolute;
  width: calc(100% - 80px);
  left: 80px;
  min-height: 100vh;
  background: var(--white);
  transition: 0.5s;
}
.main.active {
  width: calc(100% - 300px);
  left: 300px;
}

.topbar {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 10px;
}

.toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2.5rem;
  cursor: pointer;
}

.search {
  position: relative;
  width: 400px;
  margin: 0 10px;
}

.search label {
  position: relative;
  width: 100%;
}

.search label input {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  padding: 5px 20px;
  padding-left: 35px;
  font-size: 18px;
  outline: none;
  border: 1px solid var(--black2);
}

.search label ion-icon {
  position: absolute;
  top: 0;
  left: 10px;
  font-size: 1.2rem;
}

.user {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.user img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ======================= Cards ====================== */
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color: var(--blue);
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: var(--blue);
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}

/* ================== Order Details List ============== */
.details {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-gap: 30px;
  /* margin-top: 10px; */
}

.details .recentOrders {
  position: relative;
  display: grid;
  min-height: 500px;
  background: var(--white);
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}

.details .cardHeader {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}
.cardHeader h2 {
  font-weight: 600;
  color: var(--blue);
}
.cardHeader .btn {
  position: relative;
  padding: 5px 10px;
  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
}

.details table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}
.details table thead td {
  font-weight: 600;
}
.details .recentOrders table tr {
  color: var(--black1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.details .recentOrders table tr:last-child {
  border-bottom: none;
}
.details .recentOrders table tbody tr:hover {
  background: var(--blue);
  color: var(--white);
}
.details .recentOrders table tr td {
  padding: 10px;
}
.details .recentOrders table tr td:last-child {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(2) {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(3) {
  text-align: center;
}
.status.delivered {
  padding: 4px 8px;
  background: #8de02c;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.pending {
  padding: 2px 4px;
  background: #e9b10a;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.return {
  padding: 2px 4px;
  background: #f00;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.inProgress {
  padding: 2px 4px;
  background: #1795ce;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}

.recentCustomers {
  position: relative;
  display: grid;
  min-height: 500px;
  padding: 20px;
  background: var(--white);
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
.recentCustomers .imgBx {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  overflow: hidden;
}
.recentCustomers .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.recentCustomers table tr td {
  padding: 12px 10px;
}
.recentCustomers table tr td h4 {
  font-size: 16px;
  font-weight: 500;
  line-height: 1.2rem;
}
.recentCustomers table tr td h4 span {
  font-size: 14px;
  color: var(--black2);
}
.recentCustomers table tr:hover {
  background: var(--blue);
  color: var(--white);
}
.recentCustomers table tr:hover td h4 span {
  color: var(--white);
}

/* ====================== Responsive Design ========================== */
@media (max-width: 991px) {
  .navigation {
    left: -300px;
  }
  .navigation.active {
    width: 300px;
    left: 0;
  }
  .main {
    width: 100%;
    left: 0;
  }
  .main.active {
    left: 300px;
  }
  .cardBox {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .details {
    grid-template-columns: 1fr;
  }
  .recentOrders {
    overflow-x: auto;
  }
  .status.inProgress {
    white-space: nowrap;
  }
}

@media (max-width: 480px) {
  .cardBox {
    grid-template-columns: repeat(1, 1fr);
  }
  .cardHeader h2 {
    font-size: 20px;
  }
  .user {
    min-width: 40px;
  }
  .navigation {
    width: 100%;
    left: -100%;
    z-index: 1000;
  }
  .navigation.active {
    width: 100%;
    left: 0;
  }
  .toggle {
    z-index: 10001;
  }
  .main.active .toggle {
    color: #fff;
    position: fixed;
    right: 0;
    left: initial;
  }
}

/* =========================== past paper desing and the NOtes dedigning ========================== */
.boody {
  font-family: Arial, sans-serif;
  background-color:white;
  /* display: flex;
  justify-content: center;
  align-items: center; */
  height: 100vh;
  margin: 0;
}

.maneno{
  color: #2a2185;
}

.uploadPpaper-box {
  border: none solid;
  background-color:white;
  width: 700px;
  height: 700px;
  padding: 3%;
  border-radius: 10px;
  /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); */
}

.pastPaper-head {
  color: rgb(9, 9, 118);
  font-size: 24px;
  /* text-align: center; */
  margin-bottom: 20px;
}

.uploadPpaper-box form {
  display: grid;
  gap: 10px;
}

label {
  font-weight: bold;
}

select, input[type="file"],
 input[type="submit"]
  {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;

}

input[type="file"] {
  border: none;
  padding: 0;
}

input[type="submit"] {
  background-color:#2a2185;
  color: #fff;
  cursor: pointer;
}

/* === the tutarioal,installation  and books design === */

.custom-form {
  border: none solid;
  background-color:white;
  width: 400px;
  padding: 3%;
  border-radius: 10px;
  /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); */
  margin: 20px auto;
}

.custom-form label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.custom-form input[type="text"],
.custom-form textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-bottom: 10px;
}

.custom-form input[type="submit"] {
  background-color:#2a2185;
  color: #fff;
  border: none;
  padding: 10px;
  border-radius: 4px;
  cursor: pointer;
}

.custom-form input[type="submit"]:hover {
  background-color: #2980b9;
}


/* === the  accessory  design === */

/* Style for the file input container */
.file-input-container {
  position: relative;
  overflow: hidden;
  display: block;
}

/* Style for the custom label */
.custom-label {
  display: inline-block;
  padding: 12px 24px;
  background-color:#ecebeb;
  color: #2a2185;
  border: 1px solid #ccc;
  cursor: pointer;
  text-align: center;
  
}

/* Style for the actual file input (opacity 0 and positioned over the label) */
.custom-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}


/* buttons for manage post and manage user */
.btn{
  padding: 5px;
  border-radius: 4px;
  font-weight: 500;
  border: 1px #999 solid;
  color: #2a2185;
}


/*  the style for the help page */


    /* Reset some default styles */
    body, h1, h2, h3, p {
      margin: 0;
      padding: 0;
  }
  
  /* Basic styling for header and navigation */
  header {
      background-color: #2a2185;
      color: white;
      text-align: center;
      padding: 20px;
  }
  
  nav {
      background-color: #f0f0f0;
      padding: 10px;
  }
  
  
  nav ul {
      list-style-type: none;
  }
  
  nav ul li {
      margin-bottom: 15px;
  }
  
  nav ul li a {
      text-decoration: none;
      color: #2a2185;
      font-family: Roman;
  }
  
  nav ul li a:hover {
      color: #007bff;
  }
  
  /* Style main content sections */
  main {
      padding: 20px;
  }
  
  section {
      margin-bottom: 30px;
  }
  
  h2 {
      font-size: 24px;
      margin-bottom: 10px;
      font-family: Roman;
      color: #2a2185;
  }
  h5{
      color: #007bff;
      font-family: Roman;
      margin-bottom: 5px;
      margin-top: 5px;
  }
  h4{
      font-family: Roman;
      margin-bottom: 5px;
      margin-top: 5px;
  }
  
  /* Style footer */
  footer {
      /* background-color: #2a2185; */
      padding: 10px;
      text-align: center;
      color: #2a2185;
  }
  
