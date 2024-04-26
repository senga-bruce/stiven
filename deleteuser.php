<?php
require "connect.php";
$id = $_GET['deleteid'];
$query = "DELETE FROM users WHERE uid='$id'";
$result = mysqli_query($connect,$query);
header("location:userlist.php");
?>