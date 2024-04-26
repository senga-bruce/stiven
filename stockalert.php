<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Alert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
    <h1>My stock Alert</h1>
    <a href="storemanager.php">Home</a><br><br>
    <table width="95%" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="100%"><a href="stock.php">Product List</a></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Alert Date</th>
            <th>Alert Message</th>
            <!-- <th>Supplier Address</th> -->
            <th colspan="4">Option</th>
        </tr>
        <?php
        require "connect.php";
        $query = "SELECT * FROM stockalert LEFT JOIN product ON stockalert.product_id=product.product_id";
        $result = mysqli_query($connect,$query);
        $x = 1;
        if(mysqli_num_rows($result)<1){
            echo "<h2>No Product zenda gucira</h2>";
        }

        while($rows = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $rows['product_name']?></td>
            <td><?php echo $rows['alert_date']?></td>
            <td><?php echo $rows['alert_message']?></td>
            <td><a href="deletemessage.php?messageid=<?php echo $rows['alert_id']?>">delete</a></td>
        </tr>
        <?php   
        $x++; 
        }
       ?>
    </table>
</body>
</body>
</html>