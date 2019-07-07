<?php
include "config/db.php";
session_start();
$name = $_SESSION['name'];
$pass = $_SESSION['pass'];
$err = '';
$msg = '';

if(isset($_GET['action']) && isset($_GET['id'])){
  if($_GET['action'] == 'delete'){
    $id = $_GET['id'];
    $query = "DELETE FROM photos WHERE id = '$id'";
    mysqli_query($con, $query);
    
  }
}
if(isset($_POST['submit'])){
  $target = "img/" .basename($_FILES['img']['name']);
  $image = $_FILES['img']['name'];
  $caption = $_POST['caption'];
  $name = $_SESSION['name'];
  if(empty($image) && empty($name) || empty($caption) ) {
    $err .= '<p>Please Select a photo</p>';
  }else{

      
      $query = "INSERT INTO photos (author, image, caption) VALUES ('$name', '$image', '$caption')";
      $result = mysqli_query($con, $query);
      move_uploaded_file($_FILES['img']['tmp_name'], $target);
      if($result){
      $msg = '<p>Uploaded Successfully</p>';
  
    }
  }
}

$query = "SELECT * FROM photos WHERE author = '$name'";
$rs = mysqli_query($con, $query);



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
              <a class="navbar-brand" href="gal2.php">Photo Gallery</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="profile.php">Profile</a></li>
              </ul>
              <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $name; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="setting.php">Setting</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
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
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/img2.png" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Browse gallery for more photos.</h1>
              
              <p><a class="btn btn-lg btn-primary" href="gal.php" role="button">Gallery</a></p>
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
        <?php while($row = mysqli_fetch_assoc($rs)) : ?>
        <div class="col-lg-4">
          <img class="img-quere" src="<?php echo 'img/' .$row['image']?>" alt="Generic placeholder image" width="160" height="160">
          <h2><?php echo $row['author']?></h2>
          <p><?php echo $row['caption']?>  <a class="text-danger" href="profile.php?action=delete&id=<?php echo $row['id']?>">Delete</a></p>
          
        </div><!-- /.col-lg-4 -->
        <?php endwhile; ?>
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-4 col-md-offset-2">
          <h2 class="">Your Profile</h2>
    
           <h4> <b>User Name: </b><?php echo $name; ?></h4>

     
        </div>
        <div class="col-md-4 col-md-offset-2">
          <h2>Upload your Photos</h2>
             <div class="alert-danger">
        <?php
        if($err != ''){
          echo $err;
        }
        ?>
      </div>
       <div class="alert-success">
        <?php
        if($msg != ''){
          echo $msg;
        }
        ?>
      </div>
           <form action="profile.php" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <span>Upload your inamge</span>
               <input type="file" name="img" class="form-control">
             </div>
             <div class="form-group">
               <span>Wriate a caption for image</span>
               <input type="text" name="caption" class="form-control">
             </div>
             <input type="submit" name="submit" value="Upload" class="btn btn-success">
           </form>

     
        </div>
        </div>

      <hr class="featurette-divider">

     
      <!-- /END THE FEATURETTES -->


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
