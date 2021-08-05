<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Profile | Student Management System</title>
</head>
<body>
    <?php
     include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/navbar.inc.php");
     if(!(isset($_SESSION['standard']) && isset($_SESSION['rollno']))){
        header('location:index.php');
     }
     include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
     $sql = "SELECT * FROM `student` JOIN `standard` ON `student`.`standard_id` = `standard`.`standard_id` WHERE `standard`.`standard`='{$_SESSION['standard']}' AND `student`.`rollno`='{$_SESSION['rollno']}' ";
    ?>

    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-3">
                <div class="p-2">
                    <div class="card" style="width: 100%;">
                        <img src="../assets/img/profile.jpg" class="card-img-top ratio ratio-1x1" alt="Profile Image">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-2">
                    <div class="card">
                        <div class="card-header">
                            Profile
                        </div>
                        <div class="card-body">
                            <form action="../src/student/studentUpdate.php" method="POST">
                            <?php
                                $result = $conn->query($sql);
                                if($result->num_rows > 0){
                                $row=$result->fetch_assoc()                                        
                            ?>
                                <div class="row g-1 align-items-center mb-3">
                                    <div class="col-sm-4">
                                        <label for="rollno" class="col-form-label">Roll number</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="number" name="rollno" class="form-control" value="<?php echo $row['rollno'];?>" readonly>
                                    </div>
                                </div>
                                <div class="row g-1 align-items-center mb-3">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-form-label">Name</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" readonly>
                                    </div>
                                    
                                </div>
                                <div class="row g-1 align-items-center mb-3">
                                    <div class="col-sm-4">
                                        <label for="email" class="col-form-label">E-mail</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>">
                                    </div>
                                    
                                </div>

                                <div class="row g-1 align-items-center mb-3">
                                    <div class="col-sm-4">
                                        <label for="pcont" class="col-form-label">Parent's Contact Number</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" name="pcont" class="form-control" value="<?php echo $row['pcont'];?>" readonly>
                                    </div>
                                    
                                </div>

                                <div class="row g-1 align-items-center mb-3">
                                    <div class="col-sm-4">
                                    <?php
                                        // echo $_GET['return'];
                                        if($_GET['response']=='\'fupdt\''){
                                    ?>
                                        <span class="text-light bg-danger p-2 rounded-pill float-start">Update Failed</span>
                                    <?php
                                         }
                                         elseif($_GET['response']=='\'supdt\''){
                                    ?>
                                        <span class="text-light bg-success p-2 rounded-pill float-start">Updated</span>
                                    <?php

                                         }
                                    ?>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="updateStudent" class="btn btn-success text-light">Update</button>
                                        <a href="/student-management-system/src/student/studentLogout.php" class="btn btn-danger text-light">Logout</a>
                                    </div>
                                    
                                </div>
                            <?php
                                }
                            ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>