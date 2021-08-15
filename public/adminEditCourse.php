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
    $course_id = $_GET['id'];
    $sql = "SELECT * FROM `courses` WHERE `course_id`=$course_id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $r=$result->fetch_assoc();
?>
     <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-9 col-md-11">
                <div class="p-1">
                    <div class="card">
                        <div class="card-header text-center">
                            Edit Course
                        </div>
                        <form action="../src/admin/adminEditCourse.php" method="POST">
                        <!-- To-do : Add form validation for 'rollno', name and email -->
                            <div class="card-body container-fluid">
                                <div class="row justify-content-center" style="height:20rem; overflow:auto;">                                    
                                    <div class="col-12">
                                        <div class="m-md-2 p-md-2">                                        
                                            <div class="form-group mb-3">
                                                <label for="standard" class="form-label">Std</label>
                                                <select name="standard" class=" form-control">
                                                    <?php
                                                    $sql="SELECT * FROM `standard`";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0){
                                                        while($row=$result->fetch_assoc()){
                                                    ?>
                                                            <option value="<?= $row['standard_id'] ?>" <?php if($r['standard_id']==$row['standard_id']) { echo "selected"; } ?> ><?= $row['standard'] ?></option>
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
                                                <label for="course_name">Course Name</label>
                                                <input type="text" class="form-control" name="course_name" value="<?php if(isset($r['course_name'])){echo $r['course_name'];} ?>">
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
                                                <input type="hidden" name="course_id" value="<?= $course_id ?>">
                                                <button type="submit" class="btn btn-danger" name="editCourseSubmitBtn">Save</button>
                                                <a href="adminCourse.php" class="btn btn-secondary">Close</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-md-0 mt-3 text-md-end">
                                            <div class="p-1">
                                                <?php
                                                    if($_GET['return'] == '\'fail\''){
                                                ?>
                                                        <span class="text-light bg-danger p-md-3 p-2 rounded-pill ">Cannot Edit Course</span>
                                                <?php
                                                    }
                                                    elseif($_GET['return'] == '\'success\''){
                                                ?>
                                                        <span class="text-light bg-success p-md-3 p-2 rounded-pill">Edit Succesfull</span>
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
<?php
    }
    else{
        // header('location:adminStudent.php?return=\'festud\'');
        echo "Student No found";
    }
?>
</body>
</html>