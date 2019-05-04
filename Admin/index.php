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
  
  $sql = "SELECT  * FROM gallery";
  $resultGallery = $conn->query($sql);
  
   
  $sql = "SELECT  * FROM volunteers";
  $resultVolunteers = $conn->query($sql);
  
   
  $sql = "SELECT  * FROM connect";
  $resultConnect = $conn->query($sql);
  
   
  $sql = "SELECT  * FROM message";
  $resultMessage = $conn->query($sql);
  
  ?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
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

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar" style="background-color: black"></span>
                    <span class="icon-bar" style="background-color: black"></span>
                    <span class="icon-bar" style="background-color: black"></span>
                </button>
                <a class="navbar-brand" onclick="location.href=\'klca/home.php\'">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a>
                            <h5>Welcome Admin</h5>
                        </a></li>
                    <li><a><span class="glyphicon glyphicon-user" style="font-size: 30px"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
include 'sidebar.php';
?>

    <div class="col-md-10" style="margin-top: 100px">
        <div class="jumbotron" style="padding: 10px">
            <p>Quick Statistics</p>
            <div class="row">

                <!-- Total Users -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Total Users</h4>
                        <h5 class='btn btn-primary'>1</h5>
                    </div>
                </div>

                <!--Total blog post  -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Total blog post</h4>';
                        <?php echo "<h5 class='btn btn-primary'> $result->num_rows </h5>"; ?>
                    </div>
                </div>

                <!-- Total Gallery -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Total Gallery Images</h4>
                        <?php echo "<h5 class='btn btn-primary'> $resultGallery->num_rows </h5>"; ?>
                    </div>
                </div>

            </div>
            <br>
            <div class='row'>
                <!-- Total Volunteering Request -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Total Volunteering Request</h4>
                        <?php echo "<h5 class='btn btn-primary'> $resultVolunteers->num_rows </h5>"; ?>
                    </div>
                </div>

                <!-- Total Connect Us -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Total Connect Us</h4>
                        <?php echo "<h5 class='btn btn-primary'> $resultConnect->num_rows </h5>"; ?>
                    </div>
                </div>

                <!-- Total Direct Messages -->
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Total Direct Messages</h4>
                        <?php echo "<h5 class='btn btn-primary'> $resultMessage->num_rows </h5>"; ?>
                    </div>
                </div>
            </div>
        </div>
            <br>
            
            <!-- Blog Table -->
            <div class="jumbotron" style="padding: 10px">
                <p>Blog Post</p>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Post Title</th>
                                <th>Action</th>
                                <th>Date Created</th>
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
        <td><a href='/Klca/blog.php?more=$row[id]' target = '_blank'>View post</a></td>
        <td>$row[reg_date]</td>
      </tr>";

      }
    }else{ 
      echo 
      "<tr>
        <td>No Post Yet</td>
        <td></td>
        <td></td>
      </tr>";
    }

    }else{
      echo 
      "<tr>
        <td>Oops! Database error, please refer to the developer</td>
        <td></td>
        <td></td>
      </tr>";
    }
    
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