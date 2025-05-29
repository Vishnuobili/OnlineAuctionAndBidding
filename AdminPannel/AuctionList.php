<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
  } 
  if(!isset($_SESSION['role'])){
	if($_SESSION['role'] != 'Admin'){
		header("location: ../index.php");
	}
  } 
  include "../php/config.php";
  $id = $_SESSION['unique_id'];
  $auc = mysqli_query($conn, "SELECT * FROM auctions");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Online Auction And Bidding System</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AuctoState</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li  class="active">
				<a href="AuctionList.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Auctions List</span>
				</a>
			</li>
			<li>
				<a href="Users.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Users Lists</span>
				</a>
			</li>
			<li>
				<a href="LiveAuctions.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Live Auctions</span>
				</a>
			</li>
			<li>
				<a href="../php/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<button type="submit" class="search-btn" style="display:none;"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Auctions List</h1>
					<ul class="breadcrumb">
						<li>
							<a href="AuctionList.php">Auctions List</a>
						</li>
						<li><i class='bx bx-chevron-left' ></i></li>
						<li>
							<a class="active" href="index.php">Dashboard</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Auctions</h3>
					</div>
					<table>
						
							<?php
								if(mysqli_num_rows($auc) > 0){
							?>
							<thead>
								<tr>
									<th>Auction</th>
									<th>Category</th>
									<th>Date Order</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>

							<?php
									while($row = mysqli_fetch_assoc($auc)){
										$catid = $row['CategoryID'];
										$cate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM category WHERE CategoryID = '$catid'"));
										
							?>
								<tr>
									<td>
										<img src="../images/Categories/<?php echo $cate['ImageURL']?>">
										<p><a href="../EditAuction.php?id=<?php echo $row['AuctionID'] ?>"><?php echo substr($row['Title'],0,20)."..."?></a></p>
									</td>
									<td><?php echo $cate['Name']?></td>
									<td><?php echo substr($row['StartTime'],0,10)?></td>
									<td><span class="status 
									<?php 
										if($row['Status'] == 1) {
											echo "completed" ;
											$sts = "Done";
										}
										else if($row['Status'] = 2){
											echo "pending";
											$sts = "Ongoing";
										}
										else{
											echo "process";
											echo "Didnt Start";
										}
									?>"><?php echo $sts ?></td>
								</tr>
								<?php
									}
							?> 	
							</tbody>
							<?php
								}
								else{
									echo "<h1>No Auctions Found</h1>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>