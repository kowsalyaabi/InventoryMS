<?php
include "db.php";

$email = $_POST['email'];
$password = $_POST['pass'];
$query = "SELECT * FROM ims_customer WHERE user_id='$email' and password='$password' ";
$connect = mysqli_query($conn,$query);
$count = mysqli_num_rows($connect);

if($count){
    header("location:user.php");
}

?>