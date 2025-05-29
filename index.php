<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  } 
  include "./php/config.php";
  $cate = mysqli_query($conn,"SELECT * FROM category ORDER BY CategoryID ASC LIMIT 3");
  $auctions = mysqli_query($conn,"SELECT * FROM auctions ORDER BY AuctionID DESC LIMIT 3");
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
  <div class="main-body">
    <!-- Carousel Hero -->
    <div class="carousel">
      <!-- list item -->
      <div class="list">
        <div class="item">
          <img src="images/img1.jpg">
          <div class="content">
            <div class="author">ReG's</div>
            <div class="title">Victorian</div>
            <div class="topic">Furniture</div>
            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/img2.jpg">
          <div class="content">
            <div class="author">LUNDEV's</div>
            <div class="title">3 BHK Flat</div>
            <div class="topic">Land Properties</div>

            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/img3.jpg">
          <div class="content">
            <div class="author">LUNDEV's</div>
            <div class="title">Rolex Daytona</div>
            <div class="topic">Watch List</div>

            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/img4.jpg">
          <div class="content">
            <div class="author">LUNDEV's</div>
            <div class="title">1954 Mercedes-Benz W196</div>
            <div class="topic">Car List</div>

            <div class="buttons">
              <button>SEE MORE</button>
            </div>
          </div>
        </div>
      </div>
      <!-- list thumnail -->
      <div class="thumbnail">
        <div class="item">
          <img src="images/img1.jpg">
        </div>
        <div class="item">
          <img src="images/img2.jpg">
        </div>
        <div class="item">
          <img src="images/img3.jpg">
        </div>
        <div class="item">
          <img src="images/img4.jpg">
        </div>
      </div>
      <!-- next prev -->

      <div class="arrows">
        <button id="prev" style="cursor: pointer;"> <i class="fa fa-arrow-left"></i> </button>
        <button id="next" style="cursor: pointer;"> <i class="fa fa-arrow-right"></i> </button>
      </div>
      <!-- time running -->
      <div class="time"></div>
    </div>

    <!-- Featured Auctions -->
    <div class="container-featured ">
      <h1>Featured Auctions</h1>
      <p>Click or hover to view</p>
      <a href="AuctionListing.php" class="MainLink" >View More</a>
      <div class="card__container" style="margin-top:20px;">
      <?php
        while($row = mysqli_fetch_assoc($auctions)){
          $cates = $row['CategoryID'];
          $auc = mysqli_query($conn,"SELECT ImageURL FROM category WHERE CategoryID = '$cates' ");
      ?>
        <article class="card__article">
          <img src="images/Categories/<?php echo mysqli_fetch_assoc($auc)['ImageURL'] ?>" alt="image" class="card__img">

          <div class="card__data">
            <span class="card__description"><?php echo substr($row['Description'],0,20)."..." ?></span>
            <h2 class="card__title"><?php echo $row['Title'] ?></h2>
            <a href="#" class="card__button">Read More</a>
          </div>
        </article>
      <?php
        }
      ?>
      </div>
    </div>

    <!-- CTA -->
    <div class="cta">
      <div class="cta-container" style="width: 70%;">
        <h2>Call to action</h2>
        <p>Our platform offers a seamless experience, so you can focus on finding the best deals and winning big.Don't let these opportunities pass you by! Join the excitement, place your bids, and make your mark in our online auction. Act fast—these deals won't last long!</p>
        <a href="#" class="btn">Click here</a>
      </div>
    </div>

    <!-- Categories -->
    <div class="container-featured ">
      <h1>Categories</h1>
      <p>Click or hover to view</p>
      <a href="AuctionCategory.php" class="MainLink" >View More</a>
      <div class="card__container" style="margin-top:20px;">
      <?php
        while($row = mysqli_fetch_assoc($cate)){
      ?>
        <article class="card__article">
          <img src="images/Categories/<?php echo $row['ImageURL'] ?>" alt="image" class="card__img">

          <div class="card__data">
            <span class="card__description"><?php echo $row['NumberOfItems'] ?> Items</span>
            <h2 class="card__title"><?php echo $row['Name'] ?></h2>
            <a href="AuctionListing.php?CateId=<?php echo $row['CategoryID'] ?>" class="card__button">Read More</a>
          </div>
        </article>
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

  <script src="./js/carousel.js"></script>
</body>

</html>