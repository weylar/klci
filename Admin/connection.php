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

$sql = "SELECT * FROM connect ORDER BY id DESC";
  $result = $conn->query($sql);
 
  ?>


<html>

<head>
    <title>Admin | Connect List</title>
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
    <!-- Blog Table -->
    <div class="jumbotron" style="padding: 10px;">
        <p>Connections</p>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Connect ID</th>
                        <th>Email</th>
                        <th>School</th>
                         <th>Phone Number</th>
                         <th>Location</th>
                         <th>Contact Phone</th>
                         <th>Additional Info</th>
                         <th>Date</th>
                       
                    </tr>
                </thead>
                <tbody>


    <?php
if (!$result == null) {     
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>
        <td># $row[id]</td>
        <td>$row[email]</td>
        <td>$row[school]</td>
        <td>$row[phone_num]</td>
        <td>$row[location]</td>
        <td>$row[contact_person]</td>
        <td>$row[extra]</td>
        <td>$row[date]</td>
       
      </tr>";

      }
    }else{ 
      echo 
      "<tr>
        <td>No Connection Yet</td>
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