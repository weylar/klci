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

$sql = "SELECT * FROM volunteers ORDER BY id DESC";
  $result = $conn->query($sql);
 
  ?>


<html>

<head>
    <title>Admin | Volunteer List</title>
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

    <!-- Blog Table -->
    <div class="jumbotron" style="padding: 10px">
        <p>Volunteer Request List</p>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Location</th>
                        <th>Occupation</th>
                        <th>Phone Number</th>
                        <th>Skill</th>
                        <th>HOPE</th>
                        <th>What you do</th>
                        <th>Path to chang</th>
                        <th>Why</th>
                        <th>Referral</th>
                        <th>Duration</th>
                        <th>DOB</th>
                        <th>Role</th>
                        <th>Hours</th>
                        <th>Degree</th>
                         <th>Date Requested</th>
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
        <td>$row[name]</td>
        <td>$row[gender]</td>
        <td>$row[age]</td>
        <td>$row[location]</td>
        <td>$row[occupation]</td>
        <td>$row[phone]</td>
        <td>$row[skill]</td>
        <td>$row[hope]</td>
        <td>$row[what_you_do]</td>
        <td>$row[path_changes]</td>
        <td>$row[why]</td>
        <td>$row[know]</td>
        <td>$row[duration]</td>
        <td>$row[dob]</td>
        <td>$row[role]</td>
        <td>$row[hours]</td>
        <td>$row[degree]</td>
        <td>$row[date_submitted]</td>
      </tr>";

      }
    }else{ 
      echo 
      "<tr>
        <td>No Volunteer Yet</td>
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