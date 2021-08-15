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
$sql ="DELETE FROM `courses` WHERE `course_id`={$_GET['id']}";
echo $sql;
if($conn->query($sql)){
    header('location:../../public/adminCourse.php?return=\'dsuccess\'');    
}
else{
    header('location:../../public/adminCourse.php?return=\'dfail\'');
}
?>