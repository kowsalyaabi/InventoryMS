<?php
include 'db.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM ims_order WHERE order_id = '$id' ";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo "Success";
    }
    else{
        die(my_sqli_error($conn));
    }
}
?>