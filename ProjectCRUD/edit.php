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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $fileNameNew = $myFunction;
    
    
    $description = $_POST['description'];

    $sql = "UPDATE article SET name='$name', photo='$fileNameNew', description='$description' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: accuiel.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM article WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
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
    <h1>Edit Item</h1>
    <form method="post" action="edit.php?id=<?= $id ?>">
<div class="mb-3">
     
    <label class="form-label">Title</label>
    <input type="text"  class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required>
  </div>
  <div class="mb-3">
  <label class="form-label">Description :</label>
  <textarea  class="form-control" id="description" name="description" required><?= $row['description'] ?></textarea>
</div>
<div class="mb-3">
  <label for="formFile" class="form-label" >Image</label>
  <input type="file"  class="form-control" id="photo" name="photo" >
  <img  src="img/<?=  $row['photo'] ?>" width="100px" />
</div>
<button type="submit" name="submitt" class="btn btn-primary">Save Changes</button>
</form>
</div>
</body>
</html>


