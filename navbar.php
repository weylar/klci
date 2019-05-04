<!-- NAVBAR -->
<div class="container">
  <div class="row" style="margin-top:10px;">
    <div class="col-md-5">
      <a onclick="location.href='https://klci.com.ng'"><img class="img-responsive img-rounded"
          src="https://klci.com.ng/images/klci.png" alt="KLCI" style="width:100px;"></a>
    </div>
  </div>
</div>
<nav class="navbar navbar-default" id='stickyheader'>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="background-color: black"></span>
        <span class="icon-bar" style="background-color: black"></span>
        <span class="icon-bar" style="background-color: black"></span>
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar">
        <li><a onclick="location.href='https://klci.com.ng/index.php'">HOME</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"> ABOUT <span class="caret"
              style="color: black"> </span></a>
          <ul class="dropdown-menu">
            <li><a onclick="location.href='https://klci.com.ng/about.php'">Who we are</a></li>
            <li><a onclick="location.href='https://klci.com.ng/gallery.php'">Our Gallery</a></li>
          </ul>
        </li>

        <li><a onclick="location.href='https://blog.klci.com.ng'">BLOG</a></li>
        <li><a onclick="location.href='https://academy.klci.com.ng'">ACADEMY</a></li>
        <li><a onclick="location.href='https://klci.com.ng/team.php'">OUR TEAM</a></li>
        <li><a onclick="location.href='https://klci.com.ng/join.php'">JOIN US</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a onclick="location.href='https://klci.com.ng/donate.php'"
            style="color:yellow !important;"><b>DONATE</b></a>
        <li><a data-toggle="collapse" data-target="#search" style="color: black"><span
              class="glyphicon glyphicon-search"></span></a> </li>
        <li style="margin-top: 8px;">
          <div id="search" class="collapse">
            <form action="/search.php">
              <div class="form-group">
                <input type="search" class="form-control" id="search_item" placeholder="Type and hit enter...">
              </div>
            </form>
          </div>
        </li>
      </ul>

    </div>
  </div>
</nav>

<script>
  $(function () {
    // Check the initial Poistion of the Sticky Header
    var stickyHeaderTop = $('#stickyheader').offset().top;

    $(window).scroll(function () {
      if ($(window).scrollTop() > stickyHeaderTop) {
        $('#stickyheader').css({ position: 'fixed', top: '0px', width: '100%' });
        $('#stickyalias').css('display', 'block');
      } else {
        $('#stickyheader').css({ position: 'static', top: '0px' });
        $('#stickyalias').css('display', 'none');
      }
    });
  });
</script>