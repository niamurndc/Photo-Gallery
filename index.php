<?php
include "config/db.php";

$query = "SELECT * FROM photos LIMIT 21";
$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <title>Photo Gallaery</title>

    <!-- Bootstrap core CSS -->
    <link href="https://bootswatch.com/3/slate/bootstrap.min.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Photo Gallery</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="gal.php">Gallery</a></li>
              </ul>
              <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                    
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/img1.png" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Upload your favorite Photo.</h1>
              
              <p><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/retailer.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>See your uploaded photo and maintain.</h1>
              
              <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Login</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="img/img2.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Browse our gallery for more photos.</h1>
              
              <p><a class="btn btn-lg btn-primary" href="gal.php" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-lg-4">
          <img class="img-quere" src="<?php echo 'img/' .$row['image']?>" alt="Generic placeholder image" width="160" height="160">
          <h2><?php echo $row['author']?></h2>
          <p><?php echo $row['caption']?></p>
          
        </div><!-- /.col-lg-4 -->
        <?php endwhile; ?>
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      


      <!-- FOOTER -->
      <footer>
   
        <p>&copy; 2019 PhotoGallery Inc. </p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
