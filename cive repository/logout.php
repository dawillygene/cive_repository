<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
    session_unset();
    session_destroy();
    header('Location: index.php'); 
    exit();
?>