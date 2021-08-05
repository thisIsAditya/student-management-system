<?php
session_start();
$email = $_POST['email'];
include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
$sql = "SELECT `admin_password` from `admin` WHERE `admin_email`= '$email'";
$result=$conn->query($sql);
if($result->num_rows > 0){
    $row=$result->fetch_assoc();
    if(password_verify($_POST['pass'],$row['admin_password'])){
        // echo "Login Successfull, Setting Session";
        $_SESSION['adminEmail']=$email;
        header('location:../../public/adminIndex.php');
    }
    else{
        header('location:../../public/adminLogin.php?return=\'fpass\'');
    }
}
else{
    header('location:../../public/adminLogin.php?return=\'fadm\'');
}
?>