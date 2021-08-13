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
$sql ="INSERT INTO `student` (`rollno`, `name`, `pcont`, `email`, `standard_id`) VALUES ('{$_POST['rollno']}','{$_POST['name']}','{$_POST['pcont']}','{$_POST['email']}','{$_POST['standard']}')";
if($conn->query($sql)){
    header('location:../../public/adminAddStudent.php?return=\'success\'');
}
else{
    header('location:../../public/adminAddStudent.php?return=\'fail\'');
}
?>
