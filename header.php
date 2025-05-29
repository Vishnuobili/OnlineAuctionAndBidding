<nav>
    <div class="wrapper">
      <div class="logo"><a href="index.php">AuctoState</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn no-background btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="AuctionGallery.php">Gallery</a></li>
        <li>
          <a href="#" class="desktop-item">Auctions</a>
          <input type="checkbox" id="showDrop1">
          <label for="showDrop1" class="mobile-item">Auctions</label>
          <ul class="drop-menu menu1">
           <li><a href="AuctionListing.php">Auctions List</a></li>
            <li><a href="AuctionCategory.php">Join Auction</a></li>
            <li><a href="CreateAuction.php">Create Auction</a></li>
          </ul>
        </li>
       <li>
          <a href="AuctionCategory.php" class="desktop-item">Categories</a>
        </li>
        <li>
          <a href="#" class="desktop-item"><?php echo $user['Username']; ?></a>
          <input type="checkbox" id="showDrop2">
          <label for="showDrop2" class="mobile-item"><?php echo $user['Username']; ?></label>
          <ul class="drop-menu menu2">
            <?php
              if($_SESSION['role'] == "Admin"){
            ?>
              <li><a href="./AdminPannel/">Admin Pannel</a></li>
            <?php
              }
            ?>
            <li><a href="./php/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>