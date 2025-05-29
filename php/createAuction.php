<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, strtolower($_POST['name']));
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $desc = mysqli_real_escape_string($conn, strtolower($_POST['desc']));
    $start_price = mysqli_real_escape_string($conn, $_POST['start_price']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    if(!empty($name) && !empty($category) && !empty($start_date) && !empty($end_date) && !empty($start_price) && !empty($status) && !empty($desc)){
        $id = $_SESSION['unique_id'];
        $sql = mysqli_query($conn,"INSERT INTO auctions(SellerID, Title, Description, StartPrice, Status, CategoryID, StartTime, EndTime) VALUES ('$id','$name','$desc','$start_price','$status','$category','$start_date','$end_date')");
        if($sql){
            // echo "success";
            $sqlc = mysqli_query($conn,"SELECT * FROM Category Where CategoryID = $category");
            if (mysqli_num_rows($sqlc) > 0) {
                $row = mysqli_fetch_assoc($sqlc);
                $number = $row['NumberOfItems']+1;
                $sqlm = mysqli_query($conn,"UPDATE Category SET NumberOfItems='$number' WHERE CategoryID = $category");
                if($sqlm){
                    echo "success";
                }
                else{
                    echo "Something went wrong Try again";
                }
            }
        }
        else{
            echo "Something went wrong Try again";
        }
    }
    else{
        echo "All input fields are required!";
    }
?>