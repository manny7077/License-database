<?php
include 'db.php';
session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password']; 
   
   $select = "SELECT * FROM users WHERE email = '$email' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $hash = $row['password']; // Get the stored password hash from the database
      if(password_verify($password, $hash)){ // Verify the password
         header('location:dashboard.php'); // Redirect to ticket page
         exit;
      }else{
         echo "<script>alert('Incorrect email or password!');</script>"; // Display error as JavaScript notification
      }
   } else {
      echo "<script>alert('User not found!');</script>"; // Display error as JavaScript notification
   }
}
?>
