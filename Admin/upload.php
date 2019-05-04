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


        $title = $_POST['title'];
        $content = $_POST['content'];
        $tag = $_POST['tag'];
        $target_dir = "../uploads/";
        
if(isset($_POST['picture'])){
    $target_file_picture = $target_dir . basename($_FILES["picture"]["name"]);
}else{
    $target_file_feature = $target_dir . basename($_FILES["feature"]["name"]);
$target_file_img_1 = $target_dir . basename($_FILES["img_1"]["name"]);
$target_file_img_2 = $target_dir . basename($_FILES["img_2"]["name"]);
$target_file_img_3 = $target_dir . basename($_FILES["img_3"]["name"]);
$target_file_img_4 = $target_dir . basename($_FILES["img_4"]["name"]);
}
$uploadOk = 1;
$imageFileType_feature = pathinfo($target_file_feature,PATHINFO_EXTENSION);
$imageFileType_img_1 = pathinfo($target_file_img_1,PATHINFO_EXTENSION);
$imageFileType_img_2 = pathinfo($target_file_img_2,PATHINFO_EXTENSION);
$imageFileType_img_3 = pathinfo($target_file_img_3,PATHINFO_EXTENSION);
$imageFileType_img_4 = pathinfo($target_file_img_4,PATHINFO_EXTENSION);
$imageFileType_picture = pathinfo($target_file_picture,PATHINFO_EXTENSION);

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["feature"]["tmp_name"], $target_file_feature)
     
       ) {

        echo "The file ". basename( $_FILES["feature"]["name"]). " has been uploaded.\n";
       echo "The file ". basename( $_FILES["img_1"]["name"]). " has been uploaded.\n";
          echo "The file ". basename( $_FILES["img_2"]["name"]). " has been uploaded.\n";
             echo "The file ". basename( $_FILES["img_3"]["name"]). " has been uploaded.\n";
                echo "The file ". basename( $_FILES["img_4"]["name"]). " has been uploaded.\n";


        if (move_uploaded_file($_FILES["img_1"]["tmp_name"], $target_file_img_1)){

        } 
      if(move_uploaded_file($_FILES["img_2"]["tmp_name"], $target_file_img_2) ){

      }
       if(move_uploaded_file($_FILES["img_3"]["tmp_name"], $target_file_img_3)) {

       }
        if(move_uploaded_file($_FILES["img_4"]["tmp_name"], $target_file_img_4)){

        }
 if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file_picture)){

        }
 if (isset($_GET['edit'])) {

$placeholder = $_GET['edit'];
// Update blog
$sql = "UPDATE blog_content
SET title=\"$title\", content=\"$content\", tag=\"$tag\"
WHERE id= $placeholder";
 

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully\n";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*Delete old image*/
$sql_img = "DELETE FROM blog_images WHERE post_img_id=$placeholder";

if ($conn->query($sql_img) === TRUE) {
  echo "Old image deleted successfully\n";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*Add a new image to database*/
$image_title_feature = basename( $_FILES["feature"]["name"]);
$image_title_img_1 = basename( $_FILES["img_1"]["name"]);
$image_title_img_2 = basename( $_FILES["img_2"]["name"]);
$image_title_img_3 = basename( $_FILES["img_3"]["name"]);
$image_title_img_4 = basename( $_FILES["img_4"]["name"]);

$sql_new_img_feature = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_feature', '$placeholder')";

$sql_new_img_1 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_1', '$placeholder')";

$sql_new_img_2 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_2', '$placeholder')";

$sql_new_img_3 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_3', '$placeholder')";

$sql_new_img_4 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_4', '$placeholder')";
   
if ($conn->query($sql_new_img_feature) === TRUE &&
  $conn->query($sql_new_img_1) === TRUE &&
  $conn->query($sql_new_img_2) === TRUE &&
  $conn->query($sql_new_img_3) === TRUE &&
  $conn->query($sql_new_img_4) === TRUE  ) {

  echo "New Images uploaded successfully\n";   

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

 }else{
 

 $sql_elite = "INSERT INTO blog_content (title, content, tag) VALUES (\"$title\", \"$content\", \"$tag\")";
if ($conn->query($sql_elite) === TRUE) {

 $last_id = $conn->insert_id;
 $image_title_feature = basename( $_FILES["feature"]["name"]);
$image_title_img_1 = basename( $_FILES["img_1"]["name"]);
$image_title_img_2 = basename( $_FILES["img_2"]["name"]);
$image_title_img_3 = basename( $_FILES["img_3"]["name"]);
$image_title_img_4 = basename( $_FILES["img_4"]["name"]);


$sql_new_img_feature = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_feature', '$last_id')";

$sql_new_img_1 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_1', '$last_id')";

$sql_new_img_2 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_2', '$last_id')";

$sql_new_img_3 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_3', '$last_id')";

$sql_new_img_4 = "INSERT INTO blog_images (img_title, post_img_id)
VALUES ('$image_title_img_4', '$last_id')";



   
if($conn->query($sql_new_img_feature) === TRUE &&
  $conn->query($sql_new_img_1) === TRUE &&
  $conn->query($sql_new_img_2) === TRUE &&
  $conn->query($sql_new_img_3) === TRUE &&
  $conn->query($sql_new_img_4) === TRUE  ) {


  echo "Images uploaded successfully\n";   

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}




}
        header("Location: ../admin/list.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>