<?php
    session_start();
    include_once "config.php";
        $id = $_GET['id'];
        $sql = mysqli_query($conn,"UPDATE auctions SET Status='1' WHERE AuctionID='$id'");
        if($sql){
            header("Location: ../declarewinner.php?AuctionId=".$id);
        }
        else{
            echo "Something went wrong Try again";
        }
?>