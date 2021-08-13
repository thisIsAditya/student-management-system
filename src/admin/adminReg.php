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
$email = $_POST['email'];
$key=$_POST['key'];
$pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
$sql = "SELECT `secret_key` FROM `admin` WHERE `admin_email`='admin@admin.com'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$key_hash = $row['secret_key'];
if(password_verify($key,$key_hash)){
    $sql="INSERT INTO `admin`(`admin_email`,`admin_password`) VALUES ('$email','$pass')";
    echo $sql;
    if($conn->query($sql)){
        header('location:../../public/adminLogin.php');
    }
    else{
        header('location:../../public/adminReg.php?return=\'freg\'');
    }
}
else{
    header('location:../../public/adminReg.php?return=\'fkey\'');
}