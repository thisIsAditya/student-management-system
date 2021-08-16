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
                        <form action="../src/admin/adminAddExam.php" method="POST">
                        <!-- To-do : Add form validation for 'rollno', name and email -->
                            <div class="card-body container-fluid">
                                <div class="row justify-content-center" style="height:20rem; overflow:auto;">                                    
                                    <div class="col-12">
                                        <div class="m-md-2 p-md-2">
                                            <div class="form-group mb-3">
                                                <label for="exam_name">Exam Name</label>
                                                <input type="text" class="form-control" name="exam_name">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Applicable to Std(s) 
                                                </label><br>
                                                <div class="d-flex justify-content-start flex-wrap">
                                                    <?php
                                                    $sql="SELECT * FROM `standard`";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0){
                                                        while($row=$result->fetch_assoc()){
                                                    ?>
                                                            <span class="border bg-primary text-light p-2 rounded mx-1 fw-bold">
                                                                <input type="checkbox" class="form-check-input" name="standard_id_arr[]" value="<?= $row['standard_id'] ?>">
                                                                <label><?= $row['standard'] ?></label>
                                                            </span>
                                                    <?php
                                                        }
                                                    }
                                                    else{
                                                    ?>
                                                        <input type="checkbox" value="-1">No data available
                                                    <?php
                                                    }
                                                    ?>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 ">
                                            <div class="p-1">
                                                <button type="submit" class="btn btn-success" name="addExmSubmitBtn">Submit</button>
                                                <a href="adminExam.php" class="btn btn-secondary">Close</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-md-0 mt-3 text-md-end">
                                            <div class="p-1">
                                                <?php
                                                    if($_GET['return'] == '\'fail\''){
                                                ?>
                                                        <span class="text-light bg-danger p-md-3 p-2 rounded-pill ">Cannot Add Exam</span>
                                                <?php
                                                    }
                                                    elseif($_GET['return'] == '\'success\''){
                                                ?>
                                                        <span class="text-light bg-success p-md-3 p-2 rounded-pill">Exam Added</span>
                                                <?php
                                                    }
                                                ?>
                                            </div>
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
</body>
</html>