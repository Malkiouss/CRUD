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
if (isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $description = $_POST['description'];
    



    $file = $_FILES['photo'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if (in_array( $fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 100000000000) {
               $fileNameNew = uniqid('',true).".".$fileActualExt;
               $fileDestination = 'img/'.$fileNameNew;
               move_uploaded_file( $fileTmpName,$fileDestination);
               header ("Location: index.php?uploadsuccessssssssssssssssssssssssssssssssssssss");
           

               $sql = "INSERT INTO article (name, photo, description, date_added) VALUES ('$name', '$fileNameNew', '$description', '$date_added')";
               if ($conn->query($sql) === TRUE) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
            else {
                echo "Your file is too big!";
            }
        }else {
            echo "there was un error uploading your file!";
        }
    }else {
        echo "You can not upload files of this type!";
    }
}