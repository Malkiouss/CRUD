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
$id = $_GET['id'];
$sql = "DELETE FROM article WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
