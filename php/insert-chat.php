<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['to_user']);
        $message = mysqli_real_escape_string($conn, $_POST['message']); 
        echo "True";
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM auctions WHERE AuctionID = '$incoming_id' AND Status='2'"))){
            if(!empty($message)){
                $sql = mysqli_query($conn, "INSERT INTO messages (AuctionId, SenderID, Body)
                                            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
            }
        }
        else{
            echo "Exit";
        }
    }else{
        header("location: ../login.php");
    }


    
?>