<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connection.php';

    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if admin exists
    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Admin found, redirect to admin dashboard
        $_SESSION['admin_username'] = $username;
        header("Location: adminpage.html");
    } else {
        // Admin not found, redirect back to login page
        header("Location: adminLogin.html");
    }
} else {
    // Redirect to login page if accessed directly
    header("Location: adminLogin.html");
}
?>
