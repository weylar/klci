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

$sql = "SELECT * FROM gallery ORDER BY id DESC";
  $result = $conn->query($sql);
 
  ?>
  

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


<div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-8">
             
            <?php
            
    if ($result->num_rows > 0) {
 
    while($row = $result->fetch_assoc()) {
    
       echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb' style='margin-bottom:10px;'>
                <a class='thumbnail'href='#' data-image-id='' data-toggle='modal'data-title='$row[title]'
                    data-image='$row[image_url]' data-target='#image-gallery'>
                    <img class='img-thumbnail' src='$row[image_url]' alt='$row[image_url]'>
                    <a class='btn btn-danger' href='gallery-list.php?delete=$row[id]'>Delete</a>
                </a>
            </div>" ;
    }
    
   }else{ 
      echo 
      '
      <tr>
        <td>No Post Yet</td>
        <td></td>
        <td></td>
      </tr>';
    }
    
    function deleteImage($id){

/*Delete blog content*/
  global $conn;
    $sql = "DELETE FROM gallery WHERE id=$id";
    
       if ($conn->query($sql) === TRUE) {
    echo ('Post deleted successfully, please referesh page');
        header('Location: '.$_SERVER['REQUEST_URI']);
   

   

} else {

    echo ('Error deleting post: (if you don\'t understand the problem, you can refer to the developer)' . $conn->error);
}
    
   
  }
  
  
   if (isset($_GET['delete'])) {
    deleteImage($_GET['delete']);

       
   }

    ?>
    </div>
    <div class="col-md-2">
            <form action="gallery-upload.php" method='POST' accept-charset='UTF-8' enctype='multipart/form-data'>
                <h4>New Image</h4>
                <input type="text" class="form-control" name="title" placeholder="Image Title" required>
                <br>
                <input type="file"  name="gallery" accept="image/*" class="form-control"required>
                <br>
                <input type="submit" value="Post" class="btn btn-primary">
            </form>
            </div>
            </div>
            

        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i
                                class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i
                                class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 
include "footer.php"; 
?>
<script>
    let modalId = $('#image-gallery');
    $(document)
        .ready(function () {
            loadGallery(true, 'a.thumbnail');

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current) {
                $('#show-previous-image, #show-next-image')
                    .show();
                if (counter_max === counter_current) {
                    $('#show-next-image')
                        .hide();
                } else if (counter_current === 1) {
                    $('#show-previous-image')
                        .hide();
                }
            }

            /**
             *
             * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
             * @param setClickAttr  Sets the attribute for the click handler.
             */

            function loadGallery(setIDs, setClickAttr) {
                let current_image,
                    selector,
                    counter = 0;

                $('#show-next-image, #show-previous-image')
                    .click(function () {
                        if ($(this)
                            .attr('id') === 'show-previous-image') {
                            current_image--;
                        } else {
                            current_image++;
                        }

                        selector = $('[data-image-id="' + current_image + '"]');
                        updateGallery(selector);
                    });

                function updateGallery(selector) {
                    let $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-title')
                        .text($sel.data('title'));
                    $('#image-gallery-image')
                        .attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }

                if (setIDs == true) {
                    $('[data-image-id]')
                        .each(function () {
                            counter++;
                            $(this)
                                .attr('data-image-id', counter);
                        });
                }
                $(setClickAttr)
                    .on('click', function () {
                        updateGallery($(this));
                    });
            }
        });

    // build key actions
    $(document)
        .keydown(function (e) {
            switch (e.which) {
                case 37: // left
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                        $('#show-previous-image')
                            .click();
                    }
                    break;

                case 39: // right
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                        $('#show-next-image')
                            .click();
                    }
                    break;

                default:
                    return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action (scroll / move caret)
        });
</script>