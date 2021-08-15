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
$sql ="UPDATE `courses` SET `course_name`='{$_POST['course_name']}',`standard_id`='{$_POST['standard']}' WHERE `course_id`={$_POST['course_id']}";
if($conn->query($sql)){
    header('location:../../public/adminCourse.php');
}
else{
    header('location:../../public/adminCourse.php');
}
?>
