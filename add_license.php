<?php

session_start();
if(!isset($_SESSION['name'])){
   header('location:add_license.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.7.0.min.js"integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Add License</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  
  <nav>
    <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
    </div>

    <div class="sidebar-links">
      <ul>
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="dashboard.php" class="active" data-active="0">
            <div class="icon">
              <i class='bx bx-tachometer'></i>
              <i class='bx bxs-tachometer'></i>
            </div>
            <span class="link hide">Dashboard</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="expired_license.php" data-active="1">
            <div class="icon">
                <i class='bx bx-x-circle'></i>
                <i class='bx bx-x-circle'></i>
            </div>
            <span class="link hide">Expired Licenses</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="2">
            <div class="icon">
                <i class='bx bx-plus-circle'></i>
                <i class='bx bx-plus-circle'></i>
            </div>
            <span class="link hide">Add License</span>
          </a>
        </li>
    
      </ul>

      <ul>
        <li class="tooltip-element" data-tooltip="1">
          <a href="#" data-active="5">
            <div class="icon">
              <i class='bx bx-help-circle'></i>
              <i class='bx bxs-help-circle'></i>
            </div>
            <span class="link hide">Help</span>
          </a>
        </li>
        
      </ul>
    </div>

    <div class="sidebar-footer">
      <a href="#" class="account tooltip-element" data-tooltip="0">
        <i class='bx bx-user'></i>
      </a>
      <div class="admin-user tooltip-element" data-tooltip="1">
        <div class="admin-profile hide">
          <div class="admin-info">
          
            <h3><?php echo $_SESSION['name']; ?></h3>
          </div>
        </div>
        <a href="Index.php" class="log-out">
          <i class='bx bx-log-out'></i>
        </a>
      </div>
    </div>
  </nav>


  
  <main>
    <h1>Add New License</h1>
    
    <div class="table-container bordered">
      <form class ="add-form"  id="add-form"  method="post">
        <label for="type">Type:</label>
        <input type="text" id="type" name="license_type" required>
      
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="activation date">Date of Activation:</label>
        <input type="date" id="activation" name="date_activation" required>
      
        <label for="expiry date">Date of Expiry:</label>
        <input type="date" id="expiry" name="date_expiry" required>
        
        <button  type="submit" class="btn" name="send">Add</button>

      </form>

      <!-- Php for form submission to database -->
 <?php
include 'db.php';

if (!isset($_SESSION['name'])) {
   header('location:add_license.php');
   exit;
}

$errors = array();

if (isset($_POST['send'])) {
  $license_type = mysqli_real_escape_string($conn, $_POST['license_type']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $activation_date = mysqli_real_escape_string($conn, $_POST['date_activation']);
  $expiry_date = mysqli_real_escape_string($conn, $_POST['date_expiry']);

  if ($expiry_date <= $activation_date) {
    $errors[] = "Expiry date must be later than the activation date";
  }

  if (empty($errors)) {
    $insert = "INSERT INTO licenses (license_type, description, date_activation, date_expiry) VALUES ('$license_type', '$description', '$activation_date', '$expiry_date')";
    mysqli_query($conn, $insert);

    // JavaScript code to display the pop-up message using SweetAlert
    echo '<script type="text/javascript">
            Swal.fire({
              title: "Success!",
              text: "License Added!",
              icon: "success",
              confirmButtonText: "Ok"   
            }).then(function() {
              window.location.href = "dashboard.php";
            });
          </script>';
    exit();
  }else{
    // Display error message using SweetAlert
    echo '<script type="text/javascript">
            Swal.fire({
              title: "Error!",
              text: "'. $errors[0] .'",
              icon: "error",
              confirmButtonText: "Ok"
            });
          </script>';
  }
  }

?>

    </div>

  

  </main>
</body>
<script src="main.js"></script>
</html>