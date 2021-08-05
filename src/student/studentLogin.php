<?php
    session_start();
    $rollno = $_POST['rollno'];
    $pcont = $_POST['password'];
    $standard = $_POST['standard'];
    include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
    $sql = "SELECT * from `student` JOIN `standard` ON `student`.standard_id = `standard`.standard_id WHERE `standard`.`standard` = $standard AND `student`.rollno = $rollno";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        // echo "Student Found, Validating Login";
        $row = $result->fetch_assoc();
        if($pcont == $row['pcont']){
            // echo "Login Successfull, Setting Session";
            $_SESSION['rollno'] = $rollno;
            $_SESSION['standard'] = $standard;
            //Session Set, Redirecting to Index Page
            header('location:../../public/index.php');
        }
        else{
            // echo "Password did Not match";
            header('location:../../public/index.php?return=\'fpass\' ');
        }
    }
    else{
        // echo "No student Found";
        header('location:../../public/index.php?return=\'fstud\'');
    }
?>