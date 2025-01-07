<?php
include "db.php";
$id = $_POST['userid'];
$amt = $_POST['amount'];
$insert = "INSERT INTO balance(userid,balance) values('$id','$amt')";
$res = mysqli_query($conn,$insert);
if($res){
    header("location:success.html");
}
?>