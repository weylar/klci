<!-- Implementation of the database blog content! -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $sql = "SELECT  id,title, content, reg_date FROM blog_content";
$result = $conn->query($sql);


/* Total number of rows in the blog_content table */
$numrows = $result->num_rows;

// number of rows to show per page
$rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;


$sql = "SELECT  id,title, content, reg_date FROM blog_content ORDER BY reg_date DESC LIMIT $offset, $rowsperpage";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {      
$db_date = date_create($row['reg_date']);
$date = date_format($db_date,"Y-m-d");
$time = date_format($db_date,"h:i:s a");

$sqle = "SELECT  * FROM blog_images WHERE post_img_id=$row[id]";
$result_img = $conn->query($sqle);
$roww = $result_img->fetch_assoc(); ?>

<div style='margin-top: 20px'>
<img src='admin-blog/uploads/$roww[img_title]' class='img-rounded img-responsive' width='600' height='350' style='margin: auto'>
<div class='row'>
<div class='col-md-12'>
<h2 id='blog-title'><a href='' class='blog-title-link'>$row[title]  </a></h2>
     


<!-- This reduces the number of strings -->
<?php 
    if(strlen($row['content']) < 1000 ){

      echo "<p id='blog-content'>$row[content]</p>";

     }else{

echo "<p id='blog-content'>";
 echo substr_replace($row['content'],"...<br><br><button class='btn btn-sm carousel-btn blog-btn'  >READ MORE</button>", 1000);
echo "</p>";

     }
 echo "<p>By <span style='color: orange'>Kayfactor</span> | $date |   <span class= 'glyphicon glyphicon-time' style='color: black'></span> $time </p><hr class='thin'><br></div></div>";
  
    }
} else {
    echo "0 results";
}



/******  build the pagination links ******/
// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <ul class='pagination page'><li><a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a></li> ";
} // end if

// range of num links to show
$range = 3;

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range)  + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <li class='active'><a>$x</a></li> ";
      // if not current page...
      } else {
         // make it a link
         echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a</li></ul> ";
} // end if
/****** end build pagination links ******/
?>