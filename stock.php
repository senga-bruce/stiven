<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Our Product</h1>
    <a href="logout.php">logout</a><br><br>
    <table width="95%" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="100%"><a href="suppliers.php">Back To suppliers</a></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Current Stock</th>
            <th>Re-order level</th>
            <th>Supplier ID</th>
            <th>Brought or Supplied By</th>
            <th>Inserted ON</th>
            <th>Updated ON</th>
            <th colspan="4">Option</th>
        </tr>
        <?php
        require "connect.php";
        $x = 1;
        $query = "SELECT * FROM product LEFT JOIN supliers ON product.supplier_id=supliers.supplier_id";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result)<1){
            echo "<h2>No Product Found tho !</h2>";
        }else{

        while($rows = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $rows['product_name']?></td>
            <td><?php echo $rows['unit_price']?></td>
            <td><?php echo $rows['current_stock']?></td>
            <td><?php echo $rows['reorderlevel']?></td>
            <td><?php echo $rows['supplier_id']?></td>
            <td><?php echo $rows['supplier_name']?></td>
            <td><?php echo $rows['created_at']?></td>
            <td><?php echo $rows['updated_at']?></td>
            <td><a href="buy.php?buyid=<?php echo $rows['product_id']?>">buy</a></td>
            <td><a href="editproduct.php?editid=<?php echo $rows['product_id']?>">Edit</a></td>
            <td><a href="deleteproduct.php?deleteid=<?php echo $rows['product_id']?>">Delete</a></td>
        </tr>
        <?php 
        $x++;   
        }
    }
        ?>
    </table>
</body>
</html>