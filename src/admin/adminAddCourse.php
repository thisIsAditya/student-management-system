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
$sql ="INSERT INTO `courses` (`course_name`, `standard_id`) VALUES ('{$_POST['courseName']}','{$_POST['standard']}')";
if($conn->query($sql)){
    header('location:../../public/adminAddCourse.php?return=\'success\'');
}
else{
    header('location:../../public/adminAddCourse.php?return=\'fail\'');
}
?>
