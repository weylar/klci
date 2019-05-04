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

$sql = "SELECT  id,title, tag, content, reg_date FROM blog_content ORDER BY id DESC";
  $result = $conn->query($sql);
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="home.js"></script>
  <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="background-color: black"></span>
        <span class="icon-bar" style="background-color: black"></span>
        <span class="icon-bar" style="background-color: black"></span> 
      </button>
      <a class="navbar-brand" href="#home">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li ><a ><h5>Welcome Admin</h5></a></li>
        <li><a ><span class="glyphicon glyphicon-user" style="font-size: 30px"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
include 'sidebar.php'; ?>
    <div class="col-md-10" style="margin-top: 100px">
      <div class="jumbotron" style="padding: 10px">
        <p>Blog Post</p>
        <div >
        <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Post Title</th>
        <th>Published Date</th>
        <th>Edit Post</th>
        <th>Action</th>
        <th>Delete Post</th>
      </tr>
    </thead>
    <tbody>

     <?php

if (!$result == null) {
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>
        <td>$row[title]</td>
        <td>$row[reg_date]</td>
        <td><a href='new-post.php?post=$row[id]'>Edit post</a></td>
        <td><a href='/Klca/blog.php?more=$row[id]'>View post</a></td>
       <td><a class='btn' style='background-color:red; color:white;' onclick='location.href=\"list.php?delete=$row[id]\"'>Delete</a></td>
      </tr>";
   }
    }else{ 

      echo 
      '<tr>
        <td>No Post Yet</td>
        <td></td>
        <td></td>
      </tr>';
    }
  }else{
    echo 
      "<tr>
        <td>Oops! Database error, please refer to the developer</td>
        <td></td>
        <td></td>
      </tr>";
  }


function deletePost($id){

/*Delete blog content*/
  global $conn;
    $sql = "DELETE FROM blog_content WHERE id=$id";
    
       if ($conn->query($sql) === TRUE) {
    echo ('Post deleted successfully');

   

} else {

    echo ('Error deleting post: (f you don\'t understand the problem, you can refer to the developer)' . $conn->error);
}


/*Delete image too*/
$sql_img = "DELETE FROM blog_images WHERE post_img_id=$id";

 if ($conn->query($sql_img) === TRUE) {
    echo ('Image deleted successfully');

} else {

    echo ('Error deleting image: (f you don\'t understand the problem, you can refer to the developer)' . $conn->error);
}

}

if (isset($_GET['delete'])) {
    deletePost($_GET['delete']);
  }


$conn->close();
?>      
    </tbody>
  </table>
  </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

