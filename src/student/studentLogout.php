<?php 
session_start();
if(isset($_SESSION['standard']) && isset($_SESSION['rollno'])){
    session_destroy();
    header('location:/student-management-system/index.php');
}
else{
    header('location:/student-management-system/index.php');
}
?>
