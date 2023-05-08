<?php

include 'db.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $cpassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);

   $select = "SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      echo "<script>alert('User already exists!');</script>"; // JavaScript code to display user already exists notification
   }else{
      if(password_verify($cpassword, $password)){
         $insert = "INSERT INTO users(name, email, password) VALUES('$name','$email','$password')";
         mysqli_query($conn, $insert);
         echo '<script type="text/javascript">
         alert("Registration successful!");
         window.location.href = "Index.html";
       </script>';
      }else{
         echo "<script>alert('Passwords do not match!');</script>"; // JavaScript code to display password mismatch notification
      }
   }
}
 

?>
