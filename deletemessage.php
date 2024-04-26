<?php
require "connect.php";
$x = $_GET['messageid'];
$query = "DELETE FROM stockalert WHERE alert_id='$x'";
$result = mysqli_query($connect,$query);
header("location:stockalert.php");
?>