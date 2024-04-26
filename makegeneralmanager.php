<?php
require "connect.php";
$id = $_GET['managerid'];
$query = "UPDATE users SET userlevel=3 WHERE uid='$id'";
$result = mysqli_query($connect,$query);
header("location:assign.php");
?>