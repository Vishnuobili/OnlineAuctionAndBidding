<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  include "./php/config.php";
  $sql = mysqli_query($conn,"SELECT * FROM category");
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

  <!-- Create Auction Body -->
  <div class="main-body form-body">
    <div class="wrapper-form">
      <div class="title-form">
        Create Auction
      </div>
      <form class="form-main" action="#" method="POST">
          <div class="error"></div> 
          <div class="inputfield-form" style="margin-top:15px;">
            <label>Auction Name</label>
            <input type="text" class="input" name="name">
          </div>   
          <div class="inputfield-form">
            <label>Category</label>
            <div class="custom_select">
              <select name="category">
                <option value="">Select</option> 
                <?php while($row = mysqli_fetch_assoc($sql)){?>
                  <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['Name'] ?></option>
                <?php }?>
              </select>
            </div>
          </div>
          <div class="inputfield-form">
             <label>Category Description</label>
             <textarea name="desc" id="desc" class="input" style="resize: none; height: 150px;"></textarea>
          </div> 
          <div class="inputfield-form">
            <label>Start Date</label>
            <input type="datetime-local" class="input" name="start_date">
          </div> 
          <div class="inputfield-form">
            <label>End Date</label>
            <input type="datetime-local" class="input" name="end_date">
          </div>
          <div class="inputfield-form">
            <label>Start Price</label>
            <input type="text" class="input" name="start_price">
          </div>  
          <div class="inputfield-form">
            <label>Status</label>
            <div class="custom_select">
              <select name="status">
                <option value="">Select</option>
                <option value="1">Done</option>
                <option value="2">Ongoing</option>
                <option value="3">Didnt start</option>
              </select>
            </div>
          </div>
          <div class="inputfield-form">
            <input type="submit" value="Add Auction" class="btn">
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
  
  <script src="./js/BackendJs/createAuction.js"></script>
</body>
</html>