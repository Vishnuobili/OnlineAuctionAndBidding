<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  include "./php/config.php";
  
  $id = $_SESSION['unique_id'];
  if(!isset($_GET['AuctionId'])){
    echo "<script>window.history.go(-1)</script>";
  }
  $aucid = $_GET['AuctionId'];
  $auction = mysqli_query($conn,"SELECT * FROM auctions WHERE AuctionID = '$aucid'");
  if(mysqli_num_rows($auction) == 0){
    echo "<script>window.history.go(-1)</script>";
  }
  $sql = mysqli_query($conn,"SELECT * FROM users WHERE UserID<>'$id'");
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

  <!-- Create Auction Body -->
  <div class="main-body form-body">
    <div class="wrapper-form">
      <div class="title-form">
        Declare Winner
      </div>
      <form class="form-main" action="#" method="POST">
          <div class="error"></div> 
          
          <div class="inputfield-form">
            <label>Winner</label>
            <div class="custom_select">
                <input type="hidden" name="auc_id" class="auc_id" value=<?php echo $aucid ?> />
              <select name="user_id">
                <option value="#">Select</option> 
                <?php while($row = mysqli_fetch_assoc($sql)){?>
                  <option value="<?php echo $row['UserID'] ?>"><?php echo $row['Username']." : ".$row['Email']." : ".$row['Role']; ?></option>
                <?php }?>
              </select>
            </div>
          </div>
          <div class="inputfield-form">
            <input type="submit" value="Declare Winner" class="btn">
          </div>
        </form>
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
  
  <script src="./js/BackendJs/declarewinner.js"></script>
</body>
</html>