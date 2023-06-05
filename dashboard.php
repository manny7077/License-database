<?php

include 'expiring.php';


if(!isset($_SESSION['name'])){
   header('location:dashboard.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Dashboard</title>
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
   
     <div class="search" id="">
      <i class='bx bx-search'></i>
      <form method="GET" action="search.php"  id="search-form">
      <input name="search" id="search-input" class="hide" placeholder="Quick Search ...">
</form>
    </div>
    
    <div id="search-results">
    </div>

    <div class="sidebar-links">
      <ul>
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="#" class="active" data-active="0">
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
    <h1>My Dashboard</h1>
  </div>
  <div class="button-container">
    <a href="add_license.php"><button type="button" class="btn">Add License</button></a>
  </div>
</header>


    <div>
    <?php echo $expiringMessage; ?>
    </div>
    <div class="table-container">
  <table id="myTable" >
    <thead>
      <tr>
        <th>License Type</th>
        <th>Description</th>
        <th>Activation Date</th>
        <th>Expiry Date</th>
      </tr>
    </thead>
    <tbody id="license-table-body">
      <?php
        if (isset($_GET['search'])) {
          include 'search.php';
        } else {
          include 'licenses.php';
        }
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