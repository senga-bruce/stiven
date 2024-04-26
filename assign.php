<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUser List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Give responsibilities to users here !</h1>
    <a href="logout.php">logout</a>
    <a href="generalmanager.php">Home</a><br><br>
    <table width="95%" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="100%"><a href="userlist.php">View user list</a></th>
        </tr>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Password</th>
            <th>User Level</th>
            <!-- <th colspsan="2">Give responsibilities</th> -->
            <th colspan="4">Give responsibilities </th>
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
            <td><a href="makestoremanager.php?managerid=<?php echo $rows['uid']?>">Store manager</a></td>
            <td><a href="makesalesmanager.php?managerid=<?php echo $rows['uid']?>">sales manager</a></td>
            <td><a href="makegeneralmanager.php?managerid=<?php echo $rows['uid']?>">general manager</a></td>
            <td><a href="deactivate.php?deactivateid=<?php echo $rows['uid']?>">Deactivate</a></td>

        </tr>
        <?php 
        $x++;   
        }
    }
        ?>
    </table>
</body>
</html>