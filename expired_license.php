<?php
session_start();
if(!isset($_SESSION['name'])){
   header('location:expired_license.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Expired Licenses</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
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
          <a href="#" data-active="1">
            <div class="icon">
                <i class='bx bx-x-circle'></i>
                <i class='bx bx-x-circle'></i>
            </div>
            <span class="link hide">Expired Licenses</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="add_license.php" data-active="2">
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
  <header>
  <div class="title-container">
    <h1>Expired Licenses</h1>
  </div>
</header>


    
    <div class="table-container">
        <table id="myTable">
          <thead>
            <tr>
              <th>License Type</th>
              <th>Description</th>
              <th>Activation Date</th>
              <th>Expiry Date</th>
            </tr>
          </thead>
          <tbody>
          <?php
            include 'expired.php'
            ?>
          </tbody>
        </table>
      </div>
      <div class="form-container"></div>
  </main>
     
</body>
<script src="main.js"></script>
<script>
$(document).ready(function() {
  $('#myTable').DataTable({
    searching: false
  });
});
</script>
</html>