<?php
include 'nav_add.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Research Paper</title>
    <link rel="stylesheet" href="add_paper_styles.css">
</head>
<script>
        function addAuthorField() {
            var input = document.createElement("input");
            input.type = "text";
            input.name = "authors[]"; 
            input.placeholder = "Enter author's name";
            
            var br = document.createElement("br");

            document.getElementById("authors").appendChild(input);
            document.getElementById("authors").appendChild(br);
        }
    </script>
<body>
    <div class="container">
        <h1 class="board-display">ADD RESEARCH PAPER</h1>
        <form action="upload_paper.php" method="post" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="title" required>
            
            <label>Authors:</label>
            <div id="authors">
            <input type="text" name="authors[]" placeholder="Enter author's name" required><br>
             </div>
            <button type="button" onclick="addAuthorField()">+ Add Author</button><br>

            <label>Date of Publication:</label>
            <input type="date" name="date_of_publication" required>
            
            <label for"type_of_publication">Type of Publication:</label>
            <select id="type_of_publication" name="type_of_publication" required>
                <option disabled selected value> -- Select an option -- </option>
                <option value="Journal">Journal</option>
                <option value="Conference">Conference</option>
                <option value="Book">Book</option>
                <option value="Book Chapter">Book Chapter</option>
                <option value="Thesis">Thesis</option>
                <option value="Technical Report:">Technical Report</option>
                <option value="Science Magazine">Science Magazine</option>
                <option value="Statistical analysis">Statistical analysis</option>
                <option value="Other(non-classified)">Other(non-classified)</option>
                </select><br>
            
            <label>Upload PDF:</label>
            <input type="file" name="file" accept=".pdf" required>

            <button type="submit">UPLOAD</button>
        </form>
    </div>
</body>
</html>
