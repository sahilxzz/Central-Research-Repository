<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login copy.php" method="post">
            <div class="user">
                <img src="user.png" alt="">
            <input img="user.png" type="text" name="username" placeholder="Username" autocomplete="off" required >
            </div>
            <div class="password">
                <img src="pass.png" alt="" class="pass">
            <input type="password" name="password" placeholder="Password" autocomplete="off" required>
            </div>
            
            <!-- <small>Don't have an account?</small><a href="signup.php">Signup</a> -->
            <button type="submit">Login</button>
            <button type="reset">Reset</button>
        </form>
        <form action="signup.php" method="post">
            <button>Signup</button>
</form>
    </div>
</body>
</html>

<?php
 $login=false;
 $showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    // if(isset($_POST['$username'])){
   
    include 'db_connection.php' ;
$username = $_POST["username"];
$password= $_POST["password"];


    $sql = "Select * from `users` where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==1)
    {
        $login =true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: main.php");
    }
  else{
    $showError="Invalid credentials!";    
}
}
?>
