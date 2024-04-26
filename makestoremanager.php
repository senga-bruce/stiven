<?php
require "connect.php";
$store = $_GET['managerid'];
$query = "UPDATE users SET userlevel=1 WHERE uid='$store'";
$result = mysqli_query($connect,$query);
header("location:assign.php");
?>