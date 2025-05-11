<?php
$login = false;
$showAlert=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["username"],$_POST["cpassword"])){
  
   include 'db_connection.php' ;
$username = $_POST["username"];
$email = $_POST["email"];
$password= $_POST["password"];
$cpassword = $_POST["cpassword"];
// $username_unique_id = password_hash($username, PASSWORD_DEFAULT);

$exists = false;
if(($password == $cpassword)  && $exists==false){
   $sql = "INSERT INTO `research`.`signup_requests` (`Username`, `email`, `Password`, `dd`)
    VALUES ( '$username', '$email', '$password', current_timestamp())";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
       $showAlert=true;
    }  
 }
 else{
   $showError="Passwords do not match!";
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signupstyle.css">
</head>
<body>
    <div class="login-container">
        <p>Signup</p>
        <form action="signup.php" method="post" id="form" autocomplete="off">
            <div class="user">
                <img src="user.png" alt="">
            <input type="text" name="username" placeholder="username" id="username" autocomplete="off" required>
            </div>
            <div class="email">
                <img src="email.png" alt="">
            <input type="email" name="email" placeholder="gsuit" id="email" autocomplete="off" required>
            </div>
            <div class="pass">
                <img src="pass.png" alt="" class="passicon">
            <input type="password" placeholder="password" id="password" name="password" autocomplete="off" required>
            </div>
            
            <!-- <small>we'll never share your password with anyone</small><br> -->
            <div class="cpass">
                <img src="pass.png" alt="" class="cpassicon">
            <input type="password" placeholder="confirm password" id="password" name="cpassword" autocomplete="off" required><br>
            </div>
            
            <button class="btn btn-primary" type="submit" name="submit">Signup</button>
           <button type="reset">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

<!-- <?php
    if($showAlert)
{
    echo "<p>Account created!</p>";
    // $login =true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['$username'] = $username;
    header("location: basic.php");
}
?>
<?php
    if($showError)
{
    echo "$showError";
}
?> -->