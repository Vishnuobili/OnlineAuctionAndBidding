<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  } 
  include "./php/config.php";
  $id = $_SESSION['unique_id'];
  $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE UserID = '$id'"));
  if(!isset($_GET['AuctionId'])){
    header("location: index.php");
  }
  $aucid = $_GET['AuctionId'];
  $auction_sql = mysqli_query($conn,"SELECT * FROM auctions WHERE AuctionID = '$aucid'");
  if(mysqli_num_rows($auction_sql) <= 0){
    header("location: index.php");
  }
  $auc = mysqli_fetch_assoc($auction_sql);
  date_default_timezone_set('Asia/Calcutta');
  $dates = date('Y-m-d H:i:s', time());
  $level = $auc['EndTime'] < $dates;
  $end = date_create($auc['EndTime']);
  $start = date_create($auc['StartTime']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Auction And Bidding System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <!-- Header Section -->
  <?php include "header.php" ?>

  <!-- Chat body -->
  <div class="main-body chat-area-now">

    <div class="chat-container">
      <h2 class="chat-header"><?php echo $auc['Title'] ?></h2> 
      <?php
        if($auc['SellerID'] == $id){
      ?>
      <div class="end-auction">
        <?php
          if($auc['Status']==2 || !$level){
        ?>
        <a href="./php/end-auction.php?id=<?php echo $auc['AuctionID'] ?>" class="btn">End Auction</a>
        <?php
        }
        ?>
        <?php
          if($auc['Winner'] == ""){
        ?>
        <a href="./php/end-auction.php?id=<?php echo $auc['AuctionID'] ?>" class="btn" style="margin-left:10px">Declare Winner</a>
        <?php
          }
        ?>
      </div>
      <?php
        }
      ?>
      <div class="chat-messages chat-area">
      </div>
      
      <form class="chat-input-form message-form" <?php if($level){echo "style='display:none;'";} ?>>
        <input type="text" class="chat-input input-message" name="message" required placeholder="Type here, Quote Your Price...."/>
        <input type="hidden" class="chat-input to-user" name="to_user" value="<?php echo $aucid ?>"/>
        
        <button class="button SendBtn send-button">Send</button>
      </form>
      <div class="status">
        
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="col1">
        <a href="" class="brand">AuctoState</a>
      </div>
      <div class="col2">
        <ul class="menu">
          <li>
            <a href="#">Home</a>
          </li>
          <li>
            <a href="#">Auctions List</a>
          </li>
          <li>
            <a href="#">Blog</a>
          </li>
          <li>
            <a href="">Categories</a>
          </li>
          <li>
            <a href="">Privacy & Policy</a>
          </li>
        </ul>
      </div>
      <div class="col3">
        <ul class="media-icons">
          <li><a href=""><i class="fab fa-facebook"></i></a></li>
          <li><a href=""><i class="fab fa-instagram"></i></a></li>
          <li><a href=""><i class="fab fa-twitter"></i></a></li>
          <li><a href=""><i class="fab fa-youtube"></i></a></li>
          <li><a href=""><i class="fab fa-google"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="./js/chats.js"></script>

</body>

</html>