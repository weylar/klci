<?php
include 'https://klci.com.ng/header.php';
include "https://klci.com.ng/navbar.php";

if (!isset($_GET['more'])) {
echo '<div class="container" id="blog" style="margin-bottom: 50px;">
<h2 class="text-center" style="margin-top: 70px;">Welcome to our blog!</h2>
';}
?>
      <!-- Implementation of the database blog content! -->
<?php
$servername = "localhost";
$username = "klcicomn";
$password = "";
$dbname = "klcicomn_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT  id,title, content, reg_date FROM blog_content ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row    
if (isset($_GET['more'])) {

echo '<div class="container" id="blog" style="margin-bottom: 50px;">
<h2 class="text-center" style="margin-top: 70px;"></h2>';
  $id="$_GET[more]";
  $sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
   $db_date = date_create($row['reg_date']);
$date = date_format($db_date,"Y-m-d");
$time = date_format($db_date,"h:i:s a");
$sqle = "SELECT  * FROM blog_images WHERE post_img_id=$row[id] LIMIT 1";
$result_img = $conn->query($sqle);
$roww = $result_img->fetch_assoc();

 echo "<div style='margin-top: 20px'>
  <img src='https://klci.com.ng/uploads/$roww[img_title]' alt='$roww[img_title]' class='img-rounded img-responsive' width='600' height='250' style='margin: auto'>
       <div class='row'>
      <div class='col-md-12'>
     <h2 id='blog-title'><a  class='blog-title-link'>$row[title] </a></h2>
     <br>
      <p id='blog-content'>$row[content]</p>
      <br>";
      $sql_extra = "SELECT  * FROM blog_images WHERE post_img_id=$row[id] ";
$result_img = $conn->query($sql_extra);
$row_extra = $result_img->fetch_assoc();
echo "<div class='row' style='margin:auto'>";
      while ($row_extra = $result_img->fetch_assoc()) {

         echo" <div class='col-md-6'>
         <img src='https://klci.com.ng/uploads/$row_extra[img_title]' alt='$row_extra[img_title]' class='img-rounded img-responsive' style='padding-top: 20px;' >
         </div>";

      }
     
     echo " </div> <br>
      <p>By <span style='color: orange'>Kayfactor</span> | $date |   <span class= 'glyphicon glyphicon-time' style='color: black'></span> $time </p><hr class='thin'>";
}else{

/*Check for tags with project only*/
if (isset($_GET['tag'])) {
  if ($_GET['tag'] === 'projects'  ) {

    echo '<ul class="nav nav-tabs values">
<li><a  href="index.php">All</a></li>
  <li><a style="background-color: orange; color: white;"  href="index.php?tag=projects">Projects</a></li>
  <li><a  href="index.php?tag=news">News</a></li>
  <li><a  href="index.php?tag=outreaches">Outreaches</a></li>
</ul>';

    $sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE tag='projects'";
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

     $sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE tag='projects' ORDER BY id  DESC  LIMIT $offset, $rowsperpage";
     $result = $conn->query($sql);
  
  while($row = $result->fetch_assoc()) {
      
      $db_date = date_create($row['reg_date']);
$date = date_format($db_date,"Y-m-d");
$time = date_format($db_date,"h:i:s a");

$sqle = "SELECT  * FROM blog_images WHERE post_img_id=$row[id] LIMIT 1";
$result_img = $conn->query($sqle);
$roww = $result_img->fetch_assoc();

     echo "<div style='margin-top: 20px'>
 <a href='index.php?more=$row[id]'> <img src='https://klci.com.ng/uploads/$roww[img_title]' alt='$roww[img_title]' class='img-rounded img-responsive' width='600' height='250' style='margin: auto'></a>
       <div class='row'>
      <div class='col-md-12'>
     <h2 id='blog-title'><a href='index.php?more=$row[id]' class='blog-title-link'>$row[title] </a></h2>";
    
    if(strlen($row['content']) < 1000 ){

      echo "<p id='blog-content'>$row[content]</p>";

     }else{

echo "<p id='blog-content'>"?> <?php  echo substr_replace($row['content'],"...<br><br><a href='index.php?more=$row[id]' class='btn btn-sm carousel-btn blog-btn'  >READ MORE</a>", 1000)?> 
<?php
echo "</p>";

     }

     ?>
<?php
 echo "<p>By <span style='color: orange'>Kayfactor</span> | $date |   <span class= 'glyphicon glyphicon-time' style='color: black'></span> $time </p><hr class='thin'><br></div></div>";
  
    }
}elseif ($_GET['tag'] === 'news') {
echo '<ul class="nav nav-tabs values">
<li><a  href="index.php">All</a></li>
  <li><a  href="index.php?tag=projects">Projects</a></li>
  <li><a style="background-color: orange; color: white;"  href="index.php?tag=news">News</a></li>
  <li><a  href="index.php?tag=outreaches">Outreaches</a></li>
</ul>';
$sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE tag='news'";
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

 $sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE tag='news' ORDER BY id  DESC  LIMIT $offset, $rowsperpage";
     $result = $conn->query($sql);

  
  while($row = $result->fetch_assoc()) {
      
      $db_date = date_create($row['reg_date']);
$date = date_format($db_date,"Y-m-d");
$time = date_format($db_date,"h:i:s a");

$sqle = "SELECT  * FROM blog_images WHERE post_img_id=$row[id] LIMIT 1";
$result_img = $conn->query($sqle);
$roww = $result_img->fetch_assoc();


     echo "<div style='margin-top: 20px'>
  <a href='index.php?more=$row[id]'><img src='https://klci.com.ng/uploads/$roww[img_title]' alt='$roww[img_title]' class='img-rounded img-responsive' width='600' height='250' style='margin: auto'></a>
       <div class='row'>
      <div class='col-md-12'>
     <h2 id='blog-title'><a href='index.php?more=$row[id]' class='blog-title-link'>$row[title] </a></h2>";
    
    if(strlen($row['content']) < 1000 ){

      echo "<p id='blog-content'>$row[content]</p>";

     }else{

echo "<p id='blog-content'>"?> <?php  echo substr_replace($row['content'],"...<br><br><a href='index.php?more=$row[id]' class='btn btn-sm carousel-btn blog-btn'  >READ MORE</a>", 1000)?> 
<?php
echo "</p>";


     }

     ?>
<?php
 echo "<p>By <span style='color: orange'>Kayfactor</span> | $date |   <span class= 'glyphicon glyphicon-time' style='color: black'></span> $time </p><hr class='thin'><br></div></div>";
    }
  }elseif ($_GET['tag'] === 'outreaches') {

    echo '<ul class="nav nav-tabs values">
<li><a  href="index.php">All</a></li>
  <li><a  href="index.php?tag=projects">Projects</a></li>
  <li><a   href="index.php?tag=news">News</a></li>
  <li><a style="background-color: orange; color: white;" href="index.php?tag=outreaches">Outreaches</a></li>
</ul>';

$sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE tag='outreaches'";
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

 $sql = "SELECT  id,title, content, reg_date FROM blog_content WHERE tag='outreaches' ORDER BY id  DESC  LIMIT $offset, $rowsperpage";
     $result = $conn->query($sql);
  
  
  while($row = $result->fetch_assoc()) {
      
      $db_date = date_create($row['reg_date']);
$date = date_format($db_date,"Y-m-d");
$time = date_format($db_date,"h:i:s a");

$sqle = "SELECT  * FROM blog_images WHERE post_img_id=$row[id] LIMIT 1";
$result_img = $conn->query($sqle);
$roww = $result_img->fetch_assoc();


     echo "<div style='margin-top: 20px'>
 <a href='index.php?more=$row[id]'> <img src='https://klci.com.ng/uploads/$roww[img_title]' alt='$roww[img_title]' class='img-rounded img-responsive' width='600' height='250' style='margin: auto'></a>
       <div class='row'>
      <div class='col-md-12'>
     <h2 id='blog-title'><a href='index.php?more=$row[id]' class='blog-title-link'>$row[title] </a></h2>";
    
    if(strlen($row['content']) < 1000 ){

      echo "<p id='blog-content'>$row[content]</p>";

     }else{

echo "<p id='blog-content'>"?> <?php  echo substr_replace($row['content'],"...<br><br><a href='index.php?more=$row[id]' class='btn btn-sm carousel-btn blog-btn'  >READ MORE</a>", 1000)?> 
<?php
echo "</p>";
   

     }

     ?>
<?php
 echo "<p>By <span style='color: orange'>Kayfactor</span> | $date |   <span class= 'glyphicon glyphicon-time' style='color: black'></span> $time </p><hr class='thin'><br></div></div>";
    }
  }
}
else{

   echo '<ul class="nav nav-tabs values">
<li><a style="background-color: orange; color: white;"  href="index.php">All</a></li>
  <li><a  href="index.php?tag=projects">Projects</a></li>
  <li><a   href="index.php?tag=news">News</a></li>
  <li><a href="index.php?tag=outreaches">Outreaches</a></li>
</ul>';


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

  $sql = "SELECT  id,title, content, reg_date FROM blog_content ORDER BY id  DESC  LIMIT $offset, $rowsperpage";
     $result = $conn->query($sql);
  
  
  while($row = $result->fetch_assoc()) {
      
      $db_date = date_create($row['reg_date']);
$date = date_format($db_date,"Y-m-d");
$time = date_format($db_date,"h:i:s a");

$sqle = "SELECT  * FROM blog_images WHERE post_img_id=$row[id] LIMIT 1";
$result_img = $conn->query($sqle);
$roww = $result_img->fetch_assoc();


     echo "<div style='margin-top: 20px'>
  <a href='index.php?more=$row[id]'><img src='https://klci.com.ng/uploads/$roww[img_title]' alt='$roww[img_title]' class='img-rounded img-responsive' width='600' height='250' style='margin: auto'></a>
       <div class='row'>
      <div class='col-md-12'>
     <h2 id='blog-title'><a href='index.php?more=$row[id]' class='blog-title-link'>$row[title] </a></h2>";
    
    if(strlen($row['content']) < 1000 ){

      echo "<p id='blog-content'>$row[content]</p>";

     }else{

echo "<p id='blog-content'>"?> <?php  echo substr_replace($row['content'],"...<br><br><a href='index.php?more=$row[id]' class='btn btn-sm carousel-btn blog-btn'  >READ MORE</a>", 1000)?> 
<?php
echo "</p>";
   

     }




     ?>
<?php
 echo "<p>By <span style='color: orange'>Kayfactor</span> | $date |   <span class= 'glyphicon glyphicon-time' style='color: black'></span> $time </p><hr class='thin'><br></div></div>";
  
    }

}
}

 
  
}else {
    echo "0 results";
}


/*Close the connection bro*/
$conn->close();

?>
<?php
echo '
    </div>
  </div>
</div>

</div>
</div>'

?>


<?php

if (!isset($_GET['more'])){
/******  build the pagination links ******/
// if not on page 1, don't show back links
if (isset($_GET['tag'])) {
  if ($_GET['tag'] === 'projects'  ) {


if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <ul class='pagination page'><li><a href='index.php?tag=projects&currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='index.php?tag=projects&currentpage=$prevpage'><</a></li> ";
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
         echo " <li><a href='index.php?tag=projects&currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='index.php?tag=projects&currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='index.php?tag=projects&currentpage=$totalpages'>>></a</li></ul> ";
} // end if
/****** end build pagination links ******/
}



}
if(isset($_GET['tag'])) {
  if ($_GET['tag'] === 'news'  ) {

    if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <ul class='pagination page'><li><a href='index.php?tag=news&currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='index.php?tag=news&currentpage=$prevpage'><</a></li> ";
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
         echo " <li><a href='index.php?tag=news&currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='index.php?tag=news&currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='index.php?tag=news&currentpage=$totalpages'>>></a</li></ul> ";
} // end if
/****** end build pagination links ******/
}


  }

  if (isset($_GET['tag'])) {
    if ($_GET['tag'] === 'outreaches') {

if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;
       if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <ul class='pagination page'><li><a href='index.php?tag=outreaches&currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='index.php?tag=outreaches&currentpage=$prevpage'><</a></li> ";
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
         echo " <li><a href='index.php?tag=outreaches&currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='index.php?tag=outreaches&currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='index.php?tag=outreaches&currentpage=$totalpages'>>></a</li></ul> ";
} // end if
/****** end build pagination links ******/
 
  }

}else{

  if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <ul class='pagination page'><li><a href='index.php?currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='index.php?currentpage=$prevpage'><</a></li> ";
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
         echo " <li><a href='index.php?currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='index.php?currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='index.php?currentpage=$totalpages'>>></a</li></ul> ";
} // end if
/****** end build pagination links ******/
}
}

echo '<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src=\'https://embed.tawk.to/5c652e666c0a8d38ecc705b4/default\';
s1.charset=\'UTF-8\';
s1.setAttribute(\'crossorigin\',\'*\');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script--></div>';

include 'https://klci.com.ng/footer.php';

echo '</body>
</html>';

?>





