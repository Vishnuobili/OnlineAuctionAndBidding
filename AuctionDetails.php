<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  } 
  include "./php/config.php";
  if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $auc = mysqli_query($conn,"SELECT * FROM auctions WHERE AuctionID = '$id'");
    $auction = mysqli_fetch_assoc($auc);
  }
  else{
    header("location: index.php");
  }
  $idu = $_SESSION['unique_id'];
  $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE UserID = $idu"));
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
   <!-- Header Section  -->
  
   <?php include "header.php" ?>
   <!-- Details Body -->
  <div class="main-body details">
        
    <div class = "main-wrapper">
        <div class = "container">
            <div class = "product-div">
              <?php 
                $cateid = $auction['CategoryID'];
                $img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT ImageURL FROM category WHERE CategoryID = '$cateid'"));
              ?>
                <div class = "product-div-left">
                    <div class = "img-container">
                        <img src = "images/Categories/<?php echo $img['ImageURL']; ?>" alt = "<?php echo $auction['Title'] ?>">
                    </div>
                    <div class = "hover-container">
                        <div><img src = "images/Categories/<?php echo $img['ImageURL']; ?>" height="50"></div>
                        <?php
                          $gallery = mysqli_query($conn,"SELECT * FROM gallery WHERE auctionId = '$id' LIMIT 4 ");
                          while($rowg = mysqli_fetch_assoc($gallery)){
                      ?>
                        <div><img src = "images/Bids/<?php echo $rowg['Image']; ?>" height="50"></div>
                      <?php
                          }
                      ?>
                    </div>
                </div>
                <div class = "product-div-right">
                    <span class = "product-name" style="text-transform: uppercase"><?php echo $auction['Title'] ?></span>
                    <span class = "product-price">Rs. <?php echo $auction['StartPrice'] ?></span>
                    <p class = "product-description"><?php echo $auction['Description'] ?></p>
                    <div class = "btn-groups">
                        <a href="chat.php?AuctionId=<?php echo $auction['AuctionID']; ?>" class = "add-cart-btn"><i class = "fas fa-download"></i>Join Now</a>
                        <a href="AuctionGallery.php?id=<?php echo $auction['AuctionID']; ?>" class = "buy-now-btn"><i class = "fas fa-eye"></i>View Gallery</a>
                        <?php
                          if($auction['SellerID']==$idu ){
                        ?>
                            <a href="UploadGallery.php?Id=<?php echo $auction['AuctionID']; ?>" class = "add-cart-btn"><i class = "fas fa-image"></i>Add Image</a>
                        <?php
                          }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
   <!-- Footer  -->
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
  <script src="./js/details.js"></script>
</body>

</html>