<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/header.inc.php");
?>
    <title>Admin Registration | Student Management System</title>
</head>
<body>
<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/assets/components/navbar.inc.php");
    //LOGIN SESSION CHECK STARTS
    if(isset($_SESSION['adminEmail'])){
    header('location:public/adminIndex.php');
    }
    //LOGIN SESSION CHECK ENDS
    include_once($_SERVER['DOCUMENT_ROOT'] . "/student-management-system/src/dbconn.php");
    ?>
    <div class="container">
        <div class="row my-4 justify-content-center">
            <div class="col-lg-6 col-md-9">
                <div class="p-1">
                    <div class="card">
                        <div class="card-header text-center">
                            Admin Registration
                        </div>
                        <div class="card-body">
                            <form action="../src/admin/adminReg.php" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Enter your registered Admin Email</div>
                                </div>
                                <div class="mb-3">
                                    <label for="=pass" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" aria-describedby="passHelp">
                                    <div id="passHelp" class="form-text">Your password is secure with us</div>
                                </div>
                                <div class="mb-3">
                                    <label for="key" class="form-label">Secret Key</label>
                                    <input type="password" class="form-control" name="key" aria-describedby="keyHelp">
                                    <div id="keyHelp" class="form-text">You need a secret Key to register as Admin</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                                <?php
                                    // echo $_GET['return'];
                                    if($_GET['return']=='\'freg\''){
                                ?>
                                    <span class="text-light bg-danger p-2 rounded-pill float-end">Registration Failed</span>
                                <?php
                                    }
                                    elseif($_GET['return']=='\'fkey\''){
                                ?>
                                    <span class="text-light bg-danger p-2 rounded-pill float-end">Wrong Secret Key</span>
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