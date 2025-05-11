<?php
include 'nav_users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="#.css">
</head>
<body>
    <style>
        body{
            background-color: #d6f6fa;
        }
    </style>
    <div class="container">
        <h2>Users</h2>
        <table>
            <tr>
                <th>S No.</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php

            // Start session
            session_start();

            // Check if admin is logged in
            if (!isset($_SESSION['username'])) {
            header("Location: adminLogin.php");
            exit();
            } 

            // Include database connection
            include 'db_connection.php';

            // Query to fetch signup requests
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['sno.'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No Users</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
