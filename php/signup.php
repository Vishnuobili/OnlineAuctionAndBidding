<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['sname']);
    $email = mysqli_real_escape_string($conn, $_POST['semail']);
    $password = mysqli_real_escape_string($conn, $_POST['spassword']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['scpassword']);
    if(!empty($name) && !empty($cpassword) && !empty($email) && !empty($password)){
        if($cpassword == $password){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE Email = '{$email}' or Username = '{$name}'");
                if(mysqli_num_rows($sql1) > 0){
                    echo "This email or username already exist!";
                }else{
                    $user_pass = md5($password);
                    $sql = mysqli_query($conn,"INSERT INTO users(Username, Email, PasswordHash, Role)   VALUES ('$name','$email','$user_pass','User')");
                    if($sql){
                        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE Email = '{$email}'");
                        if(mysqli_num_rows($sql2) > 0){
                            $result = mysqli_fetch_assoc($sql2);
                            $_SESSION['unique_id'] = $result['UserID'];
                            $_SESSION['role'] = $row['Role'];
                            echo "success";
                        }else{
                            echo "This email address not Exist!";
                        }
                    }
                    else{
                        echo "Something went wrong Try again";
                    }
                }
            }else{
                echo "$email is not a valid email!";
            }

        }
        else{
            echo "Password and Confirm password should match";
        }
    }else{
        echo "All input fields are required!";
    }
?>