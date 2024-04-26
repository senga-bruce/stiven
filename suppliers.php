<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Our suppliers</h1>
    <a href="logout.php">logout</a><br><br>
    <table width="95%" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="100%"><a href="insertsupplier.php">Insert A new supplier</a></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Supplier Name</th>
            <th>Contact Name</th>
            <th>Contact Email</th>
            <th>Contact Phone</th>
            <th>Supplier Address</th>
            <th colspan="4">Option</th>
        </tr>
        <?php
        require "connect.php";
        $x = 1;
        $query = "SELECT * FROM supliers";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result)<1){
            echo "<h2>No supplier Found tho !</h2>";
        }else{

        while($rows = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $rows['supplier_name']?></td>
            <td><?php echo $rows['contact_name']?></td>
            <td><?php echo $rows['contact_email']?></td>
            <td><?php echo $rows['contact_phone']?></td>
            <td><?php echo $rows['address']?></td>
            <td><a href="addproduct.php?productid=<?php echo $rows['supplier_id']?>">Addproduct</a></td>
            <td><a href="editsupplier.php?editid=<?php echo $rows['supplier_id']?>">Edit</a></td>
            <td><a href="deletesupplier.php?deleteid=<?php echo $rows['supplier_id']?>">Delete</a></td>
        </tr>
        <?php 
        $x++;   
        }
    }
        ?>
    </table>
</body>
</html>