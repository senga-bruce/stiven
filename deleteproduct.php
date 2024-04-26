<?php
require "connect.php";
$id = $_GET['deleteid'];
$query = "DELETE FROM sales WHERE product_id='$id'";
$delete = "DELETE FROM product WHERE product_id='$id'";
$result = mysqli_query($connect,$query);
$go = mysqli_query($connect,$delete);
header("location:stock.php")
?>