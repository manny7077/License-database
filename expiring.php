<?php
include 'db.php';
session_start();

// Query the database for the licenses expiring in less than 3 months
$sql = "SELECT COUNT(*) AS num_expiring FROM licenses WHERE DATEDIFF(date_expiry, CURDATE()) < 90";
$result = mysqli_query($conn, $sql);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $numExpiring = $row['num_expiring'];

  if ($numExpiring > 0) {
    $expiringMessage = "<script>Swal.fire({
      title: 'Warning!',
      text: 'You have " . $numExpiring . " license(s) expiring in less than 3 months',
      icon: 'warning',
      confirmButtonText: 'Ok'
    })</script>";
  }
} else {
  // Error occurred while retrieving data
  $expiringMessage = "<script>Swal.fire({
    title: 'Error!',
    text: 'Failed to fetch expiring licenses',
    icon: 'error',
    confirmButtonText: 'Ok'
  })</script>";
}

mysqli_close($conn);
?>
