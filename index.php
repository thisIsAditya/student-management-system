<?php
//This page does nothing but redirect to public folder. This is done for better folder management.
//Also, when deployed we want the domain to bind with public folder as active directory rather than whole project,
//This is to prevent users to acces other files in the project directly
//All the Public URL files are stored in /public folder.
//All php redirect files are stored in /src folder.
//All files related to Bootstrap, CSS, Images etc. are stored in /assests folder.
// include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/public/index.php");
header('location:public/index.php');
?>