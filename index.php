<?php
//This page does nothing but recieve data from public folder. This is done for better folder management
//All the Public URL files are stored in /public folder.
//All php redirect files are stored in /src folder.
//All files related to Bootstrap, CSS, Images etc. are stored in /assests folder.
// include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/public/index.php");
header('location:public/index.php');
?>