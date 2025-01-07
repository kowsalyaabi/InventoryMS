<?php
include "db.php";

$order_id = $_POST['order_id'];
$user = $_POST['user'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

 $insert = "INSERT INTO ims_order(order_id,user,product,quantity,price) values('$order_id','$user','$product','$quantity','$price')";
 $res = mysqli_query($conn,$insert);

 if($res){
    header("location:success.html");
 }
?>