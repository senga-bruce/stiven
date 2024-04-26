<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Create An account Here !</h2>
    <form action="" method="post">
        <label for="">Full Name</label><br>
        <input type="text" name="fullname" required><br>
        <label for="">User Name</label><br>
        <input type="text" name="uname"  required><br>
        <label for="">Password</label><br>
        <input type="password" name="pword" required><br>
        <label for="">Confirm Password</label><br>
        <input type="password" name="cpword" required><br>
        <button type="submit" name="signup">Signup</button>
        <p>Already have an account?<a href="index.php">login</a></p>
    </form>
    <?php
    require "connect.php";
    if(isset($_POST['signup'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['uname'];
        $pword = $_POST['pword'];
        $pword1= $_POST['cpword'];

        if($pword != $pword1 ){
            echo "Passwprds doesn't match !";
        }else{
            $query = "INSERT INTO users VALUES('','$fullname','$username','$pword','3')";
            $result = mysqli_query($connect,$query);

            echo "<script>alert('",$fullname, " Added successfully !'),location.replace('index.php')</script>";
        }
    }
    ?>
</body>
</html>