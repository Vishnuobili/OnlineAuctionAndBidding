<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  } 
  include "./php/config.php";
  if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $cate = mysqli_query($conn,"SELECT * FROM category WHERE CategoryID = '$id'");
  }
  else{
    $cate = mysqli_query($conn,"SELECT * FROM category ORDER BY CategoryID");
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
  
  <!-- Body -->
  <div class="main-body">
    <div class="cta">
      <div class="cta-container" style="width: 70%;">
        <h2>Category List</h2>
      </div>
    </div>
    <?php
      if(mysqli_num_rows($cate) >0){
      ?>
    <div class="cards-main">
      <div class="list-cards">
        <?php
          while($row = mysqli_fetch_assoc($cate)){
        ?>
        <div class="flex-card">
          <div class="content-main">
            <div class="img-container">
              <img src="images/Categories/<?php echo $row['ImageURL'] ?>" alt="">
            </div>
            <div class="content">
              <h1 class="title"><?php echo $row['Name'] ?></h1>
              <p class="content"><?php echo substr($row['Description'],0,80)."..." ?></p>
              <div class="btns">
                <a href="AuctionListing.php?CateId=<?php echo $row['CategoryID'] ?>" class="btn full-btn">Read more</a>
              </div>
            </div>
          </div>
        </div>
      <?php
          }
      ?>
        
      </div>
    </div>
    <?php
      }
      else{
      ?>
        <div style="text-align: center;">
          <h1>No Categories Found</h1>
          <div style="margin-top:30px;">
            <a href="AuctionCategory.php" class="btn">Return to Categories</a>
            <a href="CreateCategory.php" class="btn">Create Category</a>
          </div>
        </div>
      <?php
      }
    ?>
    
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