<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['username'])) {
    header("Location: adminLogin.php");
    exit();
}

// Include database connection
include 'db_connection.php';

// Get signup request ID from URL
$id = $_GET['id'];

// Query to fetch signup request details
$query = "SELECT * FROM `signup_requests` WHERE email='$id'";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) == 1) {
    // Fetch signup request details
    $row = mysqli_fetch_assoc($result);
    
    // Add user to users table
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password']; // Assuming you have hashed passwords in signup_requests table
    
    $insert_query = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $insert_query);

    // Remove signup request from signup_requests table
    $delete_query = "DELETE FROM signup_requests WHERE email='$id'";
    mysqli_query($conn, $delete_query);

    // Redirect back to admin dashboard
    // header("Location: admin_dashboard.php");
    header("Location: admin_dashboard.php");
} else {
    // Invalid request
    echo "Invalid request";
}
?>
