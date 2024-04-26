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
        <?php
        require "connect.php";
        $x = $_GET['buyid'];
        $query = "SELECT * FROM product WHERE product_id='$x'";
        $result = mysqli_query($connect,$query);

        while($rows = mysqli_fetch_assoc($result)){
        ?>
        <label for="">Product Name</label><br>
        <input type="text" name="pname" value="<?php echo $rows['product_name']?>" required readonly><br>
        <label for="">Unit Price (Rwf)</label><br>
        <input type="number" name="unit_price" value="<?php echo $rows['unit_price']?>" required readonly><br>
        <label for="">Current In our stock (kgs)</label><br>
        <input type="number" name="cstock" value="<?php echo $rows['current_stock']?>" required readonly><br>
        <input type="number" name="reorder_level" value="<?php echo $rows['reorderlevel']?>" hidden>
        <label for="">Enter Quantity to buy (kgs)</label><br>
        <input type="number" name="quantity" required><br>
        <?php    
        }
        ?>
        <button type="submit" name="add">Buy Product</button>
        <p><a href="stock.php">View Product list</a></p>
    </form>
    <?php
    require "connect.php";
    if(isset($_POST['add'])){
        $pname = $_POST['pname'];
        $unit_price = $_POST['uprice'];
        $current_stock = $_POST['cstock'];
        $quantity = $_POST['quantity'];
        $reorderlevel = $_POST['reorder_level'];
        $newreorder_level = $reorderlevel + $quantity;
        $total = $quantity * $unit_price;  
        $newcurrent_stock = $current_stock - $quantity;

        $query = "INSERT INTO sales VALUES('','$x','$quantity',NOW(),'$total')";
        $result = mysqli_query($connect,$query);
        $update = mysqli_query($connect,"UPDATE product SET current_stock='$newcurrent_stock',reorderlevel='$newreorder_level',updated_at=NOW() WHERE product_id='$x' ");

        if($newcurrent_stock <=9){
            $inser = mysqli_query($connect,"INSERT INTO stockalert VALUES('','$x',NOW(),'Byagushira ndagaswi !')");
        }else{
            $delete = mysqli_query($connect,"DELETE FROM stockalert WHERE product_id='$x'");
        }

        header("location:stock.php");
    }
    ?>
</body>
</html>