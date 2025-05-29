<?php 
    include "config.php";
    session_start();
    if(isset($_SESSION['unique_id'])){
        $auction_id = $_POST['auc_id'];
        $user_id = $_POST['user_id'];
        if($user_id == "#"){
            echo "User is required";
        }else{
            $sql = mysqli_query($conn,"UPDATE auctions SET Winner='$user_id' WHERE AuctionID='$auction_id'");
            if($sql){
                echo "success";
            }
            else{
                echo "Try Again";
            }

        }
    }
    else{
        header("Location: ../index.php");
    }