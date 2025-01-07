<?php
include "db.php";

$user_id = $_POST['user_id'];
$password = $_POST['password'];
$name = $_POST['name'];
$reg = $_POST['reg'];
$year = $_POST['year'];
$dept = $_POST['dept'];
$mobile = $_POST['mobile'];

 $insert = "INSERT INTO ims_customer(user_id,password,name,reg,year,dept,mobile) values('$user_id','$password','$name','$reg','$year','$dept','$mobile')";
 $res = mysqli_query($conn,$insert);

 if($res){
    echo "Data inserted successfully";
 }
?>