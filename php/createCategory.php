<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, strtolower($_POST['name']));
    $desc = mysqli_real_escape_string($conn, strtolower($_POST['desc']));
    if(!empty($name) && !empty($desc)){
        $sql = mysqli_query($conn, "SELECT * FROM category WHERE Name = '{$name}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$name - This Category name already exist!";
        }else{
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];            
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
    
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $name.$time.".".$img_ext;
                        if(move_uploaded_file($tmp_name,"C:/xampp/htdocs/Projects/OnlineAuctionAndBidding/images/Categories/".$new_img_name)){
                            $insert_query = mysqli_query($conn, "INSERT INTO category(Name, Description, ImageURL) VALUES ('$name','$desc','$new_img_name')");
                            if($insert_query){
                               echo "success";
                            }else{
                                echo "Something went wrong. Please try again!";
                            }
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }else{
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }
        }
    }else{
        echo "All input fields are required!";
    }
?>