<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="search_results.css">
</head>

<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "research";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$title = $_GET["title"] ?? '';
$authors = $_GET["authors"] ?? '';
$date_of_publication = $_GET["date_of_publication"] ?? '';
$type_of_publication = $_GET["type_of_publication"] ?? '';


$sql = "SELECT * FROM files WHERE 1";

if (!empty($title)) {
    $sql .= " AND title LIKE '%$title%'";
}

if (!empty($authors)) {
    $sql .= " AND authors LIKE '%$authors%'";
}
if (!empty($publication_date)) {
    $sql .= " AND date_of_publication = '$date_of_publication'";
}

if (!empty($publication_type)) {
    $sql .= " AND type_of_publication LIKE '%$type_of_publication%'";
}


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<h2>Search Results</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>Title: " . $row["title"] . "</p>";
        echo "<p>Authors: " . $row["authors"] . "</p>";
        echo "<p>Date of Publication: " . $row["date_of_publication"] . "</p>";
        echo "<p>Type of Publication: " . $row["type_of_publication"] . "</p>";
        $filename = $row['filename'];
        echo "<a href='$filename'>Download File</a>";        
    
        echo "<hr>";
    }
} else {
    echo "No results found.";
}



$conn->close();
?>
<?php include 'footer.php'; ?>