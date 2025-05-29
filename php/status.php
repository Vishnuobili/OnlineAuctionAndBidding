
<?php
        include "config.php";
        $dates = date('Y-m-d H:i:s', time());
        $incoming_id = $_POST['incoming_id'];
        $auc = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM auctions LEFT JOIN users ON users.userId=auctions.Winner WHERE AuctionId='$incoming_id'"));
        $level = $auc['EndTime'] < $dates;
        $end = date_create($auc['EndTime']);
        $start = date_create($auc['StartTime']);
        if($level){
          echo '<div class="auctionoutput">Auction Has ended at '.date_format($end,"d/m/Y H:i:s").'<input type="hidden" class="chat-input to-user" name="to_user" value="<?php echo $aucid ?>"/>';
        }else if($auc['StartTime'] < $dates && $auc['EndTime'] >= $dates){
          if($auc['Status']==1){
            echo '<div class="auctionoutput">Auction Has ended</div><input type="hidden" class="chat-input to-user" name="to_user" value="<?php echo $aucid ?>"/>';
          }
          else if($auc['Status']==3){
            echo '<div class="auctionoutput">Auction Hasn\'t Started yet < /div><input type="hidden" class="chat-input to-user" name="to_user" value="<?php echo $aucid ?>"/>';
  
          }
        }
        else{
          echo '<div class="auctionoutput">Auction Hasn\'t Started yet. It will start at '.date_format($start,"d/m/Y H:i:s").'<input type="hidden" class="chat-input to-user" name="to_user" value="<?php echo $aucid ?>"/>';
        }
        if($auc['UserID'] == null){
          echo '.</div>';
        }
        else{
          echo '. <br>The winner of the contest is <br> Username : '.$auc['Username']."<br> Email : ".$auc['Email'].'</div>';
        }
?>