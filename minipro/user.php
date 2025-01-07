<?php
include "db.php";

$email = $_POST['email'];
$password = $_POST['pass'];
$query = "SELECT * FROM ims_customer WHERE user_id='$email' and password='$password' ";
$connect = mysqli_query($conn,$query);
$count = mysqli_num_rows($connect);

if($count){
    


$result = mysqli_query($conn, "SELECT SUM(price) AS value_sum FROM ims_order where user = '$email' "); 
$roww = mysqli_fetch_assoc($result); 
$sum = $roww['value_sum'];

$select = "SELECT * FROM ims_order where user = '$email' ";
$res = mysqli_query($conn,$select);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta 
    http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

</head>
<style>
    body{
        background-color:aqua;
    }
    .aa{
        background-color:white;
    }
</style>

<body>
    <div class="container mt-4">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <p class=" h4 navbar-brand text-white ms-2 p-2">Welcome :<?php echo" $email"; ?></p>
            <ul class="navbar-nav ms-auto">
               
            </ul>
        </nav>
    <div class="aa shadow p-2">
        <h3 class="mt-3">Purchase List</h3>
        <hr>
    <table class="table table-bordered table-striped mt-4">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
        <?php
        
if(mysqli_num_rows($res)>0){
    foreach($res as $row){
        echo "
        
        <tr>
            <td>".$row['order_id']."</td>
            <td>".$row['product']."</td>
            <td>".$row['quantity']."</td>
            <td>".$row['price']."</td>
           
        </tr>

        
        ";
        
       
    }
}

?>

</table>
<?php
$result1 = mysqli_query($conn, "SELECT SUM(balance) AS value_add FROM balance where userid = '$email' "); 
$row1 = mysqli_fetch_assoc($result1); 
$sum1 = $row1['value_add'];



$total = $sum1 - $sum;
echo "Purchased for : $sum <br>";
echo "Remaining Balance : $total";
;  ?>
</div>
</div>
</body>
</html>
<?php

}
else{
   header("location:failure.html");
}
?>