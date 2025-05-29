<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT *,DATE_FORMAT(messages.Timestamp, '%h:%i %p') AS timestamp FROM messages INNER JOIN users on messages.SenderID = users.UserID WHERE messages.AuctionId = '$incoming_id' ORDER BY messages.Timestamp DESC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['SenderID'] === $outgoing_id){
                    $output .= '<div class="message">
                                    <div class="main-message blue-bg">
                                        <div class="message-sender">'.$row['Username'].'</div>
                                        <div class="message-text">'.$row['Body'].'</div>
                                        <div class="message-timestamp">'.$row['timestamp'].'</div>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="message">
                                    <div class="main-message gray-bg">
                                        <div class="message-sender">'.$row['Username'].'</div>
                                        <div class="message-text">'.$row['Body'].'</div>
                                        <div class="message-timestamp">'.$row['timestamp'].'</div>
                                    </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="auctionoutput" style="display:flex;justify-content:center;align-items:center;margin-bottom:40%;transform:translateY(50%)">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>