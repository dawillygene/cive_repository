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
  Role ENUM('student', 'admin') NOT NULL,
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
  status VARCHAR(255) NOT NULL,
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

function notes_retrival()
{
    include "db.php";
    $sql = "SELECT * FROM Post P WHERE P. file_type = 'notes'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pathname = $row["file_path"];
            $yearlevel = $row["yearlevel"];
            $department = $row["department"];
            $coursename = $row["coursename"];
            $programe = $row["programe"];
            //$noteslevel = $row["noteslevel"];
            $notesyear = $row["Documentyear"];
            $fileId = $row["PostID"]; // Added fileId

            echo "<tr>";
            echo "<td>$pathname</td>";
            echo "<td>$yearlevel</td>";
            echo "<td>$department</td>";
            echo "<td>$coursename</td>";
            echo "<td>$programe</td>";
            ECHO "<td>$fileId </td>";
            echo "<td>$notesyear</td>";
            echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
            echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}


function pastpaper_retrival()
{
    include "db.php";
    $sql = "SELECT *
                            FROM files
                            INNER JOIN pastpaper ON files.id = pastpaper.id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pathname = $row["pathname"];
            $yearlevel = $row["yearlevel"];
            $department = $row["department"];
            $coursename = $row["coursename"];
            $programe = $row["programe"];
            $noteslevel = $row["examlevel"];
            $notesyear = $row["pastyear"];
            $fileId = $row["id"]; 

            echo "<tr>";
            echo "<td>$pathname</td>";
            echo "<td>$yearlevel</td>";
            echo "<td>$department</td>";
            echo "<td>$coursename</td>";
            echo "<td>$programe</td>";
            echo "<td>$noteslevel</td>";
            echo "<td>$notesyear</td>";
            echo "<td><a href='pastNotes/$pathname' download>Download</a></td>";
            echo "<td><button class='statusdelivered' data-file-id='$fileId'><span class='status delivered' >open</span></button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No matching records found.</td></tr>";
    }

    mysqli_close($conn);
}


function retrive_tutorial()
{

    include "db.php";

    $query = "SELECT *
              FROM Tutorial ";


    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['title'] . '</td>';
          //  echo "<td><a href='pastNotes/' download>Download</a></td>";
            echo "<td><button class='viewingtutorial' data-file-id='" . $row["title"] . "'><span class='status delivered'>view</span></button></td>";
            echo '</tr>';


        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

