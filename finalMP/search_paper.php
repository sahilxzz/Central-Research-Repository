<?php
include 'nav_search.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Research Paper</title>
    <link rel="stylesheet" href="search_paper_styles.css">
</head>
<body>
    <div class="container">
        <h1 class="board-display">Search Research Paper</h1>
        <form action="search_results.php" method="get">
            <label>Title:</label>
            <input type="text" name="title" required>
            
            <label>Author:</label>
            <input type="text" name="authors">

            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>
