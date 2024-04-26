<?php
require "connect.php";
$id = $_GET['managerid'];
$query = "UPDATE users SET userlevel=2 WHERE uid='$id'";
$result = mysqli_query($connect,$query);
header("location:assign.php");
?>