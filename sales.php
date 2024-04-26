<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Stock out</h1>
    <a href="logout.php">logout</a><br><br>
    <table width="95%" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="100%"><a href="#">Make Report</a></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Amount Sold in (kgs)</th>
            <th>Time it was sold</th>
            <th>Total Amount in (Rfw)</th>
            <th colspan="4">Option</th>
        </tr>
        <?php
        require "connect.php";
        $x = 1;
        $query = "SELECT * FROM sales JOIN product ON sales.product_id=product.product_id";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result)<1){
            echo "<h2 style='text-align:center; margin-bottom:10px;'>Nothin sold tho !</h2>";
        }else{

        while($rows = mysqli_fetch_assoc($result)){
            $quantity = $rows['quantity_sold'];
            $unit_price = $rows['unit_price'];
            $total_amount = $quantity*$unit_price;
        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $rows['product_name']?></td>
            <td><?php echo $rows['quantity_sold']?></td>
            <td><?php echo $rows['sale_date']?></td>
            <td><?php echo $total_amount," ";?></td>
            
            <td><a href="editsales.php?editid=<?php echo $rows['sale_id']?>">Edit</a></td>
            <td><a href="deletesales.php?deleteid=<?php echo $rows['sale_id']?>">Delete</a></td>
        </tr>
        <?php 
        $x++;   
        }
    }
        ?>
    </table>
</body>
</html>