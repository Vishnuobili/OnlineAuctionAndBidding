<?php 
  session_start();
  if(!isset($_SESSION['unique_id']) or !isset($_SESSION['role'])){
    header("location: login.php");
  } 
  include "./php/config.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $auc = mysqli_query($conn,"SELECT * FROM gallery WHERE auctionID = '$id'");
    $sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM auctions WHERE AuctionID='$id'"));
  }
  else{
    $auc = mysqli_query($conn,"SELECT * FROM gallery ORDER BY auctionID");
  }
  $id = $_SESSION['unique_id'];
  $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE UserID = $id"));
  
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

  <!-- Gallery Body -->
  <div class="main-body">
    <div class="image-gallery">
        <?php
        if(isset($_GET['id'])){
        ?> <h2 class="img-title"><?php echo $sql['Title'] ?></h2>
        <?php
        }else{
        ?>
        <h2 class="img-title">All List Gallery</h2>
        <?php
        }
        ?>
      <div class="image-container">
        <?php
        // echo mysqli_num_rows($auc);
        while($row = mysqli_fetch_assoc($auc)){
        ?>
          <img src="./images/Bids/<?php echo $row['Image']; ?>" alt="">
        <?php
          }
        ?>
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
</body>

</html>