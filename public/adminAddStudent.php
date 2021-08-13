<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Add Student | Student Management System</title>
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
        <div class="row my-4 justify-content-center">
            <div class="col-lg-9 col-md-11">
                <div class="p-1">
                    <div class="card">
                        <div class="card-header text-center">
                            Add Student
                        </div>
                        <div class="card-body container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <div class="m-md-3 p-2">
                                        <img src="<?php if(isset($row['admin_img'])){echo $row['admin_img'];} ?>" class="img-thumbnail rounded-circle" alt="Profile Picture">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="m-2 p-2">
                                    <form action="../src/admin/adminAddStudent.php" method="POST" enctype="multipart/form-data">
                                    <!-- To-do : Add form validation for 'rollno', name and email -->
                                        <div class="form-group mb-3">
                                            <label for="standard" class="form-label">Std</label>
                                            <select name="standard" class=" form-control">
                                                <?php
                                                $sql="SELECT * FROM `standard`";
                                                $result = $conn->query($sql);
                                                if($result->num_rows > 0){
                                                    while($row=$result->fetch_assoc()){
                                                ?>
                                                        <option value="<?= $row['standard_id'] ?>"><?= $row['standard'] ?></option>
                                                <?php
                                                    }
                                                }
                                                else{
                                                ?>
                                                    <option value="-1">No data available</option>
                                                <?php
                                                }
                                                ?>
                                            </select>                                    
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="rollno">Roll No.</label>
                                            <input type="number" class="form-control" name="rollno">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">E-mail</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="pcont">Parent's Contact Number</label>
                                            <input type="text" class="form-control" name="pcont">
                                        </div>
                                        <div class="form-group my-5">
                                            <label for="img">Profile Image</label>
                                            <input type="file" class="form-control-file" name="img">
                                        </div>

                                        <div class="container-fluid my-3">
                                                <div class="row align-items-center">
                                                    <div class="col-9">
                                                        <div class="p-1">
                                                            <button type="submit" class="btn btn-danger" name="addStdSubmitBtn">Submit</button>
                                                            <a href="adminStudent.php" class="btn btn-secondary">Close</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="p-1">
                                                            <?php
                                                                if($_GET['return'] == '\'fail\''){
                                                            ?>
                                                                    <span class="text-light bg-danger p-2 rounded-pill ">Cannot Add Student</span>
                                                            <?php
                                                                }
                                                                elseif($_GET['return'] == '\'success\''){
                                                            ?>
                                                                    <span class="text-light bg-success p-2 rounded-pill">Student Added</span>
                                                            <?php
                                                                    // header('location:adminStudent.php');
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </form>
                                    </div>
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