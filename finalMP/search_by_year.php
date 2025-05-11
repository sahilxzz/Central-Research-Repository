<?php
include 'nav_byYear.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Papers by Year</title>
    <link rel="stylesheet" href="search_paper_by_year.css">
</head>
<body>
    <h2>Search Papers by Year</h2>
    <form action="search_by_year.php" method="get">
        <label for="year">Enter Year:</label>
        <input type="number" id="year" name="year" min="1900" max="9999" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "research";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['year']) && !empty($_GET['year'])) {
    $year = $_GET['year'];

    
    $sql = "SELECT * FROM files WHERE YEAR(date_of_publication) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $year);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Papers Published in $year</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Title: " . $row["title"] . "</li>";
            echo "<li>Authors: " . $row["authors"] . "</li>";
            echo "<li>Publication Date: " . $row["date_of_publication"] . "</li>";
            echo "<li>Type: " . $row["type_of_publication"] . "</li>";
            echo "<br>";
        }
        echo "</ul>";
    } else {
        echo "No papers found for the year $year.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please provide a year parameter.";
}
?>
<?php include 'footer.php'; ?>