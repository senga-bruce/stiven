<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addproduct</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h2>Insert new Product Here !</h2>
    <form action="" method="post">
        <label for="">Product Name</label><br>
        <input type="text" name="pname" required><br>
        <label for="">Unit Price in(Rfw)</label><br>
        <input type="number" name="uprice" required><br>
        <label for="">Quantity in (kgs)</label><br>
        <input type="number" name="quantity" required><br>
        <button type="submit" name="add">add Product</button>
        <p><a href="stock.php">View Product list</a></p>
    </form>
    <?php
    $add = $_GET['productid'];
    require "connect.php";
    if(isset($_POST['add'])){
        $pname = $_POST['pname'];
        $price = $_POST['uprice'];
        $quantity = $_POST['quantity'];
        $current_stock = $price * $quantity;

        $query = "INSERT INTO product VALUES('','$pname','$price','$quantity','0','$add',NOW(),NOW())";
        $result = mysqli_query($connect,$query);

        header("location:stock.php");
    }
    ?>
</body>
</html>