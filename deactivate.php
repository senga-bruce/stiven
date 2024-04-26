<?php
require "connect.php";
$x = $_GET['deactivateid'];
$query = "UPDATE users SET userlevel=0 WHERE uid='$x'";
$result = mysqli_query($connect,$query);
header("location:assign.php")
?>