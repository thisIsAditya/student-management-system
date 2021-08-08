<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Dashboard | Student Management System</title>
    <style type="text/css">
        .adminCards a{
            text-decoration: none;
        }
    </style>
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
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-9">
                <div class="p-1">
                    <div class="card">
                        <div class="card-header  text-center">
                            Admin Panel
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Cards-->
                                    <div class="col-lg-4">
                                        <div class="p-1 adminCards">
                                        <a href="adminStudent.php">
                                            <div class="card bg-primary" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="h4 text-light text-center fw-bold">Students</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <!-- Card Ends -->

                                    <!-- Cards-->
                                    <div class="col-lg-4">
                                        <div class="p-1 adminCards">
                                        <a href="addStudent.php">
                                            <div class="card bg-primary" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="h4 text-light text-center fw-bold">Courses</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <!-- Card Ends -->

                                    <!-- Cards-->
                                    <div class="col-lg-4">
                                        <div class="p-1 adminCards">
                                        <a href="addStudent.php">
                                            <div class="card bg-primary" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="h4 text-light text-center fw-bold">Exams</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <!-- Card Ends -->

                                    <!-- Cards-->
                                    <div class="col-lg-4">
                                        <div class="p-1 adminCards">
                                        <a href="addStudent.php">
                                            <div class="card bg-primary" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="h4 text-light text-center fw-bold">Results</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <!-- Card Ends -->

                                    <!-- Cards-->
                                    <div class="col-lg-4">
                                        <div class="p-1 adminCards">
                                        <a href="addStudent.php">
                                            <div class="card bg-primary" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="h4 text-light text-center fw-bold">Change Password</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <!-- Card Ends -->

                                    <!-- Cards-->
                                    <div class="col-lg-4">
                                        <div class="p-1 adminCards">
                                        <a href="../src/admin/adminLogout.php">
                                            <div class="card bg-danger" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="h4 text-light text-center fw-bold">Logout</p>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <!-- Card Ends -->
                                </div>
                            </div>            
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>