<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Dashboard | Student Management System</title>
</head>
<body>
<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/navbar.inc.php");
    //LOGIN SESSION CHECK STARTS
    if(isset($_SESSION['standard']) && isset($_SESSION['rollno'])){
        header('location:studentProfile.php');
    }
    elseif(!(isset($_SESSION['adminEmail']))){
    header('location:adminLogin.php');
    }
    //LOGIN SESSION CHECK ENDS
    include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
?>
    <a href="../src/admin/adminLogout.php" class="btn btn-danger">Logout</a>
        
</body>
</html>