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
$sql ="DELETE FROM `student` WHERE `stdn_id`={$_GET['id']}";
if($conn->query($sql)){
    header('location:../../public/adminStudent.php?return=\'dsuccess\'');
}
else{
    header('location:../../public/adminStudent.php?return=\'dfail\'');
}
?>