<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, strtolower($_POST['name']));
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $desc = mysqli_real_escape_string($conn, strtolower($_POST['desc']));
    $start_price = mysqli_real_escape_string($conn, $_POST['start_price']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    if(!empty($name) && !empty($start_date) && !empty($end_date) && !empty($start_price) && !empty($status) && !empty($desc)){
        $id = $_POST['id'];
         $sql = mysqli_query($conn,"UPDATE auctions SET Title='$name' , Description='$desc', StartTime='$start_date', EndTime='$end_date', StartPrice='$start_price', Status='$status' WHERE AuctionID='$id'");
        if($sql){
            echo "success";
        }
        else{
            echo "Something went wrong Try again";
        }
    }
    else{
        echo "All input fields are required!";
    }
?>