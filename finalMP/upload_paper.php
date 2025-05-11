<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "research";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    
    $title = $_POST["title"];
    $authors = implode(",", $_POST["authors"]);
    $date_of_publication = $_POST["date_of_publication"];
    $type_of_publication = $_POST["type_of_publication"];


    $file = $_FILES["file"];
    $filename = $file["name"];
    $file_tmp = $file["tmp_name"];


    $uploads_dir = __DIR__ . "/";
    move_uploaded_file($file_tmp, $uploads_dir . $filename);

    
    $sql = "INSERT INTO files (title, authors,date_of_publication,type_of_publication, filename) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);   
    $stmt->bind_param("sssss", $title, $authors, $date_of_publication, $type_of_publication, $filename);

    if ($stmt->execute()) {
        echo "File uploaded successfully!";

    } else {
        echo "Error uploading file: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<?php include 'footer.php'; ?>
