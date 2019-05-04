<?php
$servername = "localhost";
$username = "klcicomn_admin";
$password = "";
$dbname = "klcicomn_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_GET['post'])) {
 
$placeholder = $_GET['post'];


$sql = "SELECT  title, tag, content FROM blog_content WHERE id=$placeholder";

  $result = $conn->query($sql);
}

if (isset($_POST['title'])) {

$title = $_POST['title'];
}
if (isset($_POST['content'])) {
   $content = $_POST['content'];
}
 if (isset($_POST['tag'])) {
 
  $tag = $_POST['tag'];
}
 if (isset($_POST['feature-img'])) {
$feature_img = $_POST['feature-img'];

}
 


  ?>



<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<meta charset="utf-8">
  <!-- For rich text editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="home.js"></script>
  <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body >

	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="background-color: black"></span>
        <span class="icon-bar" style="background-color: black"></span>
        <span class="icon-bar" style="background-color: black"></span> 
      </button>
      <a class="navbar-brand" href="new-post.php"><img class=" img-rounded" src="/klca/images/klci.jpg" alt="KLCI" style="width:100px; height:40px;"> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li ><a ><h5>Welcome Admin</h5></a></li>
        <li><a><span class="glyphicon glyphicon-user" style="font-size: 30px"></span></a></li>
      </ul>
    </div>
  </div>
</nav>


<?php include 'sidebar.php'; ?>

    <div class="col-md-10" style="margin-top: 100px" >
    <div class="col-md-9">
      <div class="jumbotron" style="padding: 10px">
        <?php
        /*To check either to attach edit to it or not*/
if (isset($_GET['post'])) {
  echo "<form action='upload.php?edit=$placeholder' method='post' accept-charset='UTF-8'
enctype='multipart/form-data' autocomplete='off' validate>";
}else{
  echo "<form action='upload.php' method='post' accept-charset='UTF-8'
enctype='multipart/form-data' autocomplete='off' validate>";
}
        ?>
        
        <h3>Create a new post</h3>
       
  <label for="post-title"><h4>Post Title</h4></label>
 

  <?php

if (isset($_GET['post'])) {
  
$row = $result->fetch_assoc();

  echo "
  <input type='text' class='form-control' name='title' id='post-title' value='$row[title]' required>";
}else{
  echo '<input type="text" class="form-control" name="title" id="post-title" required>';
}



echo "<h4>Post Content</h4>";


if (isset($_GET['post'])) {
echo "<textarea class='form-control' name='content' id='editor'>$row[content]</textarea required>";

}else{

  echo '<textarea class="form-control" name="content" id="editor" required></textarea>';
}

?>
   

   
  <label for="post-tag"><h4>Tag</h4></label>

  <?php


if (isset($_GET['post'])) {
echo "<input type='text' class='form-control' name='tag' id='post-tag' value='$row[tag]' required>";

}else{

  echo '<input type="text" class="form-control" name="tag" id="post-tag" required>';
}

?>
  


       
      </div>
    </div>
<div class="col-md-3" >
      <div class="jumbotron" style="padding: 10px">
        <h4>Feature Image</h4>

        <?php

if (isset($_GET['post'])) {
  
$row = $result->fetch_assoc();

  echo "<input class='form-control' type='file' name='feature' id='feature' required>\n (Image broken, re-upload ) ";
   echo "<input class='form-control' type='file' name='img_1' id='img_1' >\n (Image broken, re-upload ) ";
    echo "<input class='form-control' type='file' name='img_2' id='img_2'>\n (Image broken, re-upload) ";
     echo "<input class='form-control' type='file' name='img_3' id='img_3'>\n (Image broken, re-upload) ";
      echo "<input class='form-control' type='file' name='img_4' id='img_4'>\n (Image broken, re-upload) ";


}else{
  echo "<input class='form-control' type='file' name='feature' id='feature' required>";
  echo "<input class='form-control' type='file' name='img_1' id='img_1' >";
  echo "<input class='form-control' type='file' name='img_2' id='img_2'>";
  echo "<input class='form-control' type='file' name='img_3' id='img_3'>";
  echo "<input class='form-control' type='file' name='img_4' id='img_4'>";
}
if (isset($_GET['post'])) {
  
$row = $result->fetch_assoc();

  echo "<br> <input type='submit'  value='Update' class='btn carousel-btn' style='width: 100%'>"; 
}
else{
   echo "<br> <input type='submit' ; value='Post' class='btn carousel-btn' style='width: 100%'>"; 
}


  ?>
          
      </div>
</form>
      


    </div>

  </div>
</div>
</div>

</body>
</html>