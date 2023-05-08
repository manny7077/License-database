<?php
include 'db.php';

if(isset($_POST['submit'])){
  $license_type = mysqli_real_escape_string($conn, $_POST['license_type']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $activation_date = mysqli_real_escape_string($conn, $_POST['date_activation']);
  $expiry_date = mysqli_real_escape_string($conn, $_POST['date_expiry']);

  $insert = "INSERT INTO licenses (license_type, description, date_activation, date_expiry) VALUES ('$license_type', '$description', '$activation_date', '$expiry_date')";
  mysqli_query($conn, $insert);
}

?>
