<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Insert new supplier Here !</h2>
    <form action="" method="post">
        <label for="">Supplier Name</label><br>
        <input type="text" name="sname" required><br>
        <label for="">Contact Name</label><br>
        <input type="text" name="cname"  required><br>
        <label for="">Email</label><br>
        <input type="email" name="email" required><br>
        <label for="">Phone</label><br>
        <input type="number" name="phone" required><br>
        <label for="">Address</label><br>
        <input type="text" name="address" required><br>
        <button type="submit" name="add">add new supplier</button>
        <p><a href="suppliers.php">View suppliers list</a></p>
    </form>
    <?php
    require "connect.php";
    if(isset($_POST['add'])){
        $sname = $_POST['sname'];
        $cname = $_POST['cname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $query = "INSERT INTO supliers VALUES('','$sname','$cname','$email','$phone','$address')";
        $result = mysqli_query($connect,$query);

        header("location:suppliers.php");
    }
    ?>
</body>
</html>