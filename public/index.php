<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Student Login | Student Management System</title>
</head>
<body>
    <?php
     include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/navbar.inc.php");
     //LOGIN SESSION CHECK STARTS
     if(isset($_SESSION['standard']) && isset($_SESSION['rollno'])){
        header('location:studentProfile.php');
     }elseif(isset($_SESSION['adminEmail'])){
        header('location:adminIndex.php');
    }
     //LOGIN SESSION CHECK ENDS
     include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
     $sql = "SELECT `standard_id`,`standard` FROM `standard`";
     $result = $conn->query($sql);
    ?>
    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-6 col-md-9">
                <div class="p-1">
                    <div class="card">
                        <div class="card-header text-center">
                            Student Login
                        </div>
                        <div class="card-body">
                            <form action="../src/student/studentLogin.php" method="POST">
                                <div class="mb-3">
                                    <label for="standard" class="form-label">Standard</label>
                                    <select name="standard" class="form-control" aria-describedby="stdHelp">
                                    <?php
                                    if($result->num_rows > 0){
                                        while($row=$result->fetch_assoc()){

                                    ?>
                                        <option value="<?php echo $row['standard_id']; ?>"><?php echo $row['standard']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                    <div id="stdHelp" class="form-text">Select your Standard</div>
                                </div>
                                <div class="mb-3">
                                    <label for="rollno" class="form-label">Roll number</label>
                                    <input type="number" class="form-control" name="rollno" aria-describedby="rollHelp">
                                    <div id="rollHelp" class="form-text">Enter your Class Roll Number</div>
                                </div>
                                <div class="mb-3">
                                    <label for="=password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" aria-describedby="passHelp">
                                    <div id="passHelp" class="form-text">Your password is you submitted Parent's Contact number</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php
                                    // echo $_GET['return'];
                                    if($_GET['return']=='\'fstud\''){
                                ?>
                                    <span class="text-light bg-danger p-2 rounded-pill float-end">No Student Found</span>
                                <?php
                                    }
                                    elseif($_GET['return']=='\'fpass\''){
                                ?>
                                    <span class="text-light bg-danger p-2 rounded-pill float-end">Wrong Password</span>
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