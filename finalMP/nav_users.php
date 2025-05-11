<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navigation Bar</title>
<link rel="stylesheet" href="nav_bar.css">
<style>
/* Style for the navigation bar */
*{
  margin: 0px;
  padding: 0px;
}
.navbar {
  background-color: #333;
  overflow: hidden;
  color: white;
  width: 100%;
}

/* Style for the navigation links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 10px 15px; /* Adjust padding to reduce height */
  text-decoration: none;
  font-size: 16px; /* Adjust font size */
  margin: 10px;
}

/* Style for the active link */
.navbar a.active {
  background-color: #007bff;
}

/* Style for the logout link */
.logout {
  float: right;
}

/* Style for the login/logout button */
.logout button {
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 8px 15px; /* Adjust padding to reduce height */
  margin: 4px 0; /* Adjust margin */
  cursor: pointer;
}

/* Change background color on hover */
.logout button:hover {
  background-color: #0056b3;
}

/* Clear floats after the navigation links */
.navbar::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="basic.php" class="active">Home</a>
  <a href="admin_dashboard.php" class="active">Signup Requests</a>
  <!-- <a href="users.php" class="active">View Users</a> -->
  <a href="search_by_year.php" class="active">Paper list by year</a>
  <a href="search_paper.php" class="active">search</a>
  
  <?php
  // Check if the user is logged in
  session_start();
  if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // If logged in, display the username and logout button
    echo '<div class="logout">';
    echo 'Logged in as ' . $_SESSION['username'];
    echo ' <form action="logout.php" method="post">';
    echo ' <button type="submit" name="logout">Logout</button>';
    echo ' </form>';
    echo '</div>';
} else {
    // If not logged in, display the login button
    echo '<div class="logout">';
    echo '<form action="login copy.php" method="post">';
    echo '<button type="submit" name="login">Login</button>';
    echo '</form>';
    echo '</div>';
}
?>
</div>

</body>
</html>
