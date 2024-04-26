<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Our Users</h1>
    <a href="logout.php">logout</a><br><br>
    <table width="95%" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="100%"><a href="assign.php">Assign Responsibililty</a></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Password</th>
            <th>User Level</th>
            <th colspan="4">Option</th>
        </tr>
        <?php
        require "connect.php";
        $x = 1;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result)<1){
            echo "<h2>No supplier Found tho !</h2>";
        }else{

        while($rows = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $rows['fullname']?></td>
            <td><?php echo $rows['username']?></td>
            <td><?php echo $rows['password']?></td>
            <td>
                <?php
                $level = $rows['userlevel'];
                if($level == 1){
                    echo "Store Manager";
                }elseif($level == 2){
                    echo "Sales Manager";
                }elseif($level == 3){
                    echo "General Manager";
                }else{
                    echo "Account not yet active";
                }
                ?>
            </td>
            <td><a href="edituser.php?editid=<?php echo $rows['uid']?>">Edit</a></td>
            <td><a href="deleteuser.php?deleteid=<?php echo $rows['uid']?>">Delete</a></td>
        </tr>
        <?php 
        $x++;   
        }
    }
        ?>
    </table>
</body>
</html>