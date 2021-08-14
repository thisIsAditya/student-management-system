<?php 
session_start();
//LOGIN SESSION CHECK STARTS
if(isset($_SESSION['standard']) && isset($_SESSION['rollno'])){
    header('location:studentProfile.php');
}
elseif(!(isset($_SESSION['adminEmail']))){
header('location:adminLogin.php');
}
//LOGIN SESSION CHECK ENDS
include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
$sql ="UPDATE `student` SET `rollno`='{$_POST['rollno']}',`name`='{$_POST['name']}',`pcont`='{$_POST['pcont']}',`email`='{$_POST['email']}',`standard_id`='{$_POST['standard']}' WHERE `stdn_id`={$_POST['student_id']}";
if($conn->query($sql)){
    header('location:../../public/adminStudent.php');
}
else{
    header('location:../../public/adminStudent.php');
}
?>
