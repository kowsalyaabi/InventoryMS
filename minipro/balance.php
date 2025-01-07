
<?php
include "db.php";
$result1 = mysqli_query($conn, 'SELECT SUM(balance) AS value_add FROM balance'); 
$row1 = mysqli_fetch_assoc($result1); 
$sum1 = $row1['value_add'];

echo "$sum1";

$result = mysqli_query($conn, 'SELECT SUM(base_price) AS value_sum FROM ims_product'); 
$roww = mysqli_fetch_assoc($result); 
$sum = $roww['value_sum'];

$total = $sum1 - $sum;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

</head>
<style>
    *{
        font-family: 'Source Sans Pro', sans-serif;
    }
</style>
<body>
    <div class="container">
        <div class="box mt-5 shadow p-3">
            <p class="h3">Balance:</p>
            <hr>
            <p class="h5 ms-3">Your purchased for<strong> <?php echo($sum);
 ?></p>
            <p class="h5 ms-3">Your remaining balance is<strong> <?php echo("$total.00");
 ?></p>
        </div>
    </div>
</body>
</html>