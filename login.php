<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/style.css">
         
    <title>Login & Registration Form</title> 
</head>
<body class="login-body">

    
    <div class="login-container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#" class="login-form" method="POST">
                    <div class="error login"></div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="lemail" name="lemail" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="lpassword" id="lpassword" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="button" value="Login" class="loginBTN">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

           <!-- Registration Form -->
           <div class="form signup">
                <span class="title">Registration</span>
                <form action="#" class="signup-form" method="POST">
                    <div class="error signup"></div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" id="sname" name="sname"  required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="semail" name="semail"  required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password"  name="spassword" id="spassword"  placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="scpassword" id="scpassword"  placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    
                    <div class="input-field button">
                        <input type="button" value="Signup" class="signupBTN">
                    </div>
                </form>
        
                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

     <script src="./js/login.js"></script> 
     <script src="./js/BackendJs/login.js"></script> 
     <script src="./js/BackendJs/signup.js"></script> 
</body>
</html>