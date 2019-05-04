<?php
$servername = "Localhost";
$username = "klcicomn_admin";
$password = "";
$dbname = "klcicomn_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$target_dir = "../uploads/";
$fileName = $_FILES['gallery']['name'];
$dbPath = $target_dir . $fileName;
$target_file = $target_dir . basename($fileName);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.\n";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES['gallery']['tmp_name'], $target_file) ) {

       }
       
       $image = "INSERT INTO gallery (image_url, title)
        VALUES ('$dbPath', '$_POST[title]')";
        
            if ($conn->query($image) === TRUE) {
         header("Location: gallery-list.php");
   
        } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
}


 
}

?>