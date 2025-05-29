<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['lemail']);
    $password = mysqli_real_escape_string($conn, $_POST['lpassword']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE Email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['PasswordHash'];
            if($user_pass === $enc_pass){
                $_SESSION['unique_id'] = $row['UserID'];
                $_SESSION['role'] = $row['Role'];
                echo "success";
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{ 
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>