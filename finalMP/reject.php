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

// Query to delete signup request
$delete_query = "DELETE FROM signup_requests WHERE email='$id'";
mysqli_query($conn, $delete_query);

// Redirect back to signup requests page
header("Location: admin_dashboard.php");
exit(); // Make sure to exit after the header redirect
?>
