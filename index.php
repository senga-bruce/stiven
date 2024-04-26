<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h2>Login here !</h2>
        <label for="">User Name :</label><br>
        <input type="text" name="uname"><br>
        <label for="">Password :</label><br>
        <input type="password" name="pword"><br>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="signup.php">Signup</a></p>
    </form>
    <?php
    require "connect.php";
    if(isset($_POST['login'])){
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $query = "SELECT * FROM users WHERE username='$uname' AND password='$pword' ";
        $result = mysqli_query($connect,$query);

        if (mysqli_num_rows($result) >0 ) {

            while($rows = mysqli_fetch_assoc($result)){
                $level = $rows['userlevel'];
            }
            if($level == 1){
                header("location:storemanager.php");
            }elseif($level == 2){
                header("location:salesmanager.php");
            }elseif($level == 3){
                header("location:generalmanager.php");
            }else{
                header("location:default.php");
            }
        }
    }
    ?>
</body>
</html>