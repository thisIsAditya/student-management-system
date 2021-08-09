<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Student Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <?php 

      if(isset($_SESSION['standard']) && isset($_SESSION['rollno'])){
        //Navbar for student
        ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="studentProfile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="studentResult.php">Results</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../src/student/studentLogout.php">Logout</a>
        </li>
        <?php
      }
      elseif(isset($_SESSION['adminEmail'])){
        //Navbar for Admin
        ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="adminLogin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="adminChangePassword.php">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../src/admin/adminLogout.php">Logout</a>
        </li>
        <?php
      }
      else{
        //Navbar for visitor
        ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminReg.php">Admin Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminLogin.php">Admin Login</a>
        </li>
        <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>
