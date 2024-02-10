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

// Read operation
$sql = "SELECT * FROM article";
$result = $conn->query($sql);
?>
<?include 'footer.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Article Management</title>
</head>
<body>
<div class="container my-5">
    <h1>Your Article list ✅</h1> 

    <br>
    <table class="table table-striped table-hover">
<tr>
  <th>name</th>
  <th>photo</th>
  <th>Description</th>
  <th>Due Date</th>
  <th>Actions</th>
</tr>
<?php


// Check if there are any results
if (mysqli_num_rows($result) > 0) {
   

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row['name'] . "</td>
                <td> <a href='des.php'> <img  src=img/".  $row['photo'] ." width='100px' />". "</a></td>
                <td>" . $row['description'] . "</td>
                <td>" . $row['date_added'] . '</td>
                <td> <button class="btn btn-success me-md-2" type="button"><a style="text-decoration: none; color: #fff;" href="href="edit.php?id='.$row["id"].'">Edit</a></button>
                <button class="btn btn-danger" type="button"><a style="text-decoration: none; color: #fff;" href="delete.php?id='.$row["id"].'">Delete</a></button></td>
                
            </tr>
            ';
    }

   
} else {
    echo "No records found";
}

// Close the connection
mysqli_close($conn);
?>
</table>
<br>
    <button type="button" class="btn btn-primary"><a style="text-decoration: none; color: #fff;" href="add.php">Add Article</a></button>

</body>
</html>
