<nav class="navbar navbar-default">
  <div id="horizontal-greenbar" class="wrapper">
    <ul class="nav navbar-nav">
      <?php
        if (isset($_SESSION['current_user'])) {
          echo '
            <li class="navbar-login" id="welcome-nav">
             <a href="profile.php"> Hello, ' . ucfirst($_SESSION['current_user']) . '!</a>
            </li>
          ';
        } else {
          echo '<li class="navbar-icons"><a href="#"><span class="glyphicon glyphicon-envelope gold" aria-hidden="true"></span> grainsmart.cainta@gmail.com</a></li>
      <li class="navbar-icons"><a href="#"><span class="glyphicon glyphicon-earphone gold" aria-hidden="true"></span> +63.917.632.3441</a></li>';
        }

      ?>
      
    </ul>
  </div>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img alt="Grainsmart Cainta" src="assets/image/grainsmart.jpg">
      </a>


    </div>

<!--  LOG IN REGISTER WITH ICON   <ul class="nav navbar-nav navbar-right">
      <li><a href="#" class="dark-green"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log In</a></li>
      <li><a href="register.php" class="dark-green"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register</a></li>
    </ul> -->

    <!-- Collect the nav links, forms, and other content for toggling -->
<!--    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>/.navbar-collapse -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="center-menu">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        
        <?php

        if (isset($_SESSION['current_user'])) {
          echo '
            <li>
              <a href="logout.php">Logout</a>
            </li>
          ';
        } else {
          echo '<li><a href="login.php">Log In</a></li>';
        }

        ?>
      </ul>
    </div> <!--/.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>