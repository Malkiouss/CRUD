<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "articles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container my-5">
    <h1>Add New Item</h1>
    <form method="post" action="upload.php" enctype="multipart/form-data">
<div class="mb-3">
      
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Title" required>
  </div>
  <div class="mb-3">
  <label class="form-label">Description :</label>
  <textarea class="form-control" name="description" placeholder="Enter description" rows="3" required></textarea>
</div>
<div class="mb-3">
  <label for="formFile" class="form-label" >Image</label>
  <input class="form-control" type="file" name="photo" required>
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>