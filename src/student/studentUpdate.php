<?php
session_start();
if(!(isset($_SESSION['standard']) && isset($_SESSION['rollno']))){
    header('location:/student-management-system/public/studentProfile.php');
 }
 else{
     $email=$_POST['email'];
     include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
     $sql = "UPDATE `student` JOIN `standard` ON `student`.`standard_id` = `standard`.`standard_id` SET `email`='$email' WHERE `standard`.`standard`={$_SESSION['standard']} AND `student`.`rollno`={$_SESSION['rollno']}";
     echo $sql;
     if($conn->query($sql)){
        header('location:/student-management-system/public/studentProfile.php?response=\'supdt\'');
     }
     else{
        header('location:/student-management-system/public/studentProfile.php?response=\'fupdt\'');
     }
 }
?>