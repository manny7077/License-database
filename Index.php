<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>License database</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form  class="sign-in-form" method="post">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" name="email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <button type="submit" class="btn" name="submit">Login</button>
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
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
      if(password_verify($password, $hash)){   // Verify the password
         $_SESSION['name'] = $row['name'];
         header('location:dashboard.php'); // Redirect to ticket page
         exit;
      }else{
         echo '<script> 
          Swal.fire({
            title: "Oops",
            text: "Incorrect Email or Password!",
            icon: "error",
            confirmButtonText: "Ok"
          });
          </script>'; // Display error as JavaScript notification
      }
   } else {
      echo '<script> 
          Swal.fire({
            title: "Error",
            text: "User not found!",
            icon: "error",
            confirmButtonText: "Ok"
          });
          </script>'; // Display error as JavaScript notification
   }
}
?>


        <!-- signing up form -->
        <form  class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Full Name" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="confirm-password" placeholder="Confirm Password" required />
          </div>
          <button type="submit" class="btn" name="register">Sign Up</button>

          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <?php

include 'db.php';

if(isset($_POST['register'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $cpassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);

   $select = "SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
    echo '<script> 
          Swal.fire({
            title: "Oops",
            text: "User Already Exists!",
            icon: "error",
            confirmButtonText: "Ok"
          });
          </script>';
} else {
      if(password_verify($cpassword, $password)){
         $insert = "INSERT INTO users(name, email, password) VALUES('$name','$email','$password')";
         mysqli_query($conn, $insert);
         echo '<script type="text/javascript">
          Swal.fire({
            title: "Success!",
            text: "User registered Successfully!",
            icon: "success",
            confirmButtonText: "Ok"
          }).then(function() {
            window.location.href = "index.php";
          });
        </script>';
      }else{
         echo '<script> 
          Swal.fire({
            title: "Oops",
            text: "Passwords do not match!",
            icon: "error",
            confirmButtonText: "Ok"
          });
          </script>'; // JavaScript code to display password mismatch notification
      }
   }
}
 

?>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Register now to gain access to our internal systems and resources by creating an account. Please click on
            the 'Sign up' button to get started. If you experience any issues registering, please contact the IT
            department for assistance.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            This page is exclusively for employees of our company to access our internal systems and resources securely.
            Please ensure you enter your login credentials accurately to gain access. If you experience any issues
            logging in, please contact the IT helpdesk for assistance.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>