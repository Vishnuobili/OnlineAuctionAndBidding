<?php
    $id = $_GET['id'];
    include "config.php";
    $sql = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE UserID = '$id'"));
    if($sql > 0){
        $main = mysqli_query($conn,"DELETE FROM users WHERE UserID = '$id'");
    }
    echo "<script>window.history.go(-1)</script>";
?>  