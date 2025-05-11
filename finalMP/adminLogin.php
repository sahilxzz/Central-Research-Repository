<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="adminLogin.php" method="post">
            <div class="user">
                <img src="user.png" alt="">
            <input type="text" name="username" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="password">
                <img src="pass.png" alt="">
            <input type="password" name="password" placeholder="Password" autocomplete="off" required>
            </div>
            
            <button type="submit">Login</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>

<?php
 $login=false;
 $showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    include 'db_connection.php' ;
$username = $_POST["username"];
$password= $_POST["password"];


    $sql = "Select * from `admins` where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num==1)
    {
        $login =true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: adminpage.php");
    }
  else{
    $showError="Invalid credentials!";
}
}
    if($login)
{
    echo "<p>You are logged in!</p>";
}
?>
<?php
    if($showError)
{
     echo "$showError";
}
?>