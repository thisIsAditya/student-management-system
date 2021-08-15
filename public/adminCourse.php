<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Course | Student Management System</title>
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
                            Courses
                        </div>
                        <div class="card-body container-fluid">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" method="POST">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <div class="d-inline p-1">
                                            <label for="standard" class="form-label">Std</label>
                                            <select name="standard" class="ms-3">
                                                <?php
                                                $sql="SELECT * FROM `standard`";
                                                $result = $conn->query($sql);
                                                if($result->num_rows > 0){
                                                ?>
                                                    <option value="0">All</option>
                                                <?php
                                                    while($row=$result->fetch_assoc()){
                                                ?>
                                                        <option value="<?= $row['standard_id'] ?>"
                                                            <?php 
                                                            if(isset($_POST['search'])){
                                                                if($_POST['standard']==$row['standard']){
                                                                    echo "selected";
                                                                }
                                                            } 
                                                            ?>
                                                        ><?= $row['standard'] ?></option>
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
                                    </div> 
                                    <div class="col-6 d-flex justify-content-end">
                                        <div class="p-1">
                                                <input type="submit" class="btn btn-success" value="Search" name="search">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="p-1" style="overflow:auto;height:15rem;">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Course ID</th>
                                                        <th scope="col">Course Name</th>
                                                        <th scope="col">Standard</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>                                            
                                                <tbody>
                                                    <?php
                                                    if(isset($_POST['search']) && $_POST['standard'] != 0){
                                                        $sql="SELECT * FROM `courses` JOIN `standard` ON `standard`.`standard_id`=`courses`.`standard_id`  WHERE `courses`.`standard_id`={$_POST['standard']}";                                                
                                                    }
                                                    else{
                                                        $sql="SELECT * FROM `courses` JOIN `standard` ON `standard`.`standard_id`=`courses`.`standard_id`";
                                                    }
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows >0){
                                                        while($row=$result->fetch_assoc()){
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?= $row['course_id'] ?></th>
                                                                <td><?= $row['course_name'] ?></td>
                                                                <td><?= $row['standard'] ?></td>
                                                                <td><a href="adminEditCourse.php?id=<?= $row['course_id'] ?>"<i class="fa fa-pencil" aria-hidden="true"></i></td>
                                                                <td><a href="../src/admin/adminDelCourse.php?id=<?= $row['course_id'] ?>"<i class="fa fa-trash" aria-hidden="true"></i></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    else{
                                                        echo "<tr><td colspan=\"5\">No Data Found<td></tr>";
                                                    }
                                                    ?>
                                                </tbody>                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-end">
                            <a href="adminAddCourse.php" class="btn btn-primary float-end"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Course</a>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>