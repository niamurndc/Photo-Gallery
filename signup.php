<?php
include "config/db.php";
session_start();
$err = '';
$msg = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $pass = $_POST['pass'];
  
  if(empty($name) && empty($pass)) {
    $err .= '<p>Please fill in all field</p>';
  }else{
      $sql = "SELECT * FROM users WHERE name = '$name'";
    $rs = mysqli_query($con, $sql);
    
    $num = mysqli_num_rows($rs);
    if($num == 0){
      
      $query = "INSERT INTO users (name, password) VALUES ('$name', '$pass')";
      mysqli_query($con, $query);
      $_SESSION['name'] = $name;
      $_SESSION['pass'] = $pass;
      header('location: profile.php');
    }else{
      $err .= '<p>This username already exist</p>';
    }
    
  }
}
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




    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-offset-2">
          <h2 class="">Please SignUp:</h2>
                   <div class="alert-danger">
        <?php
        if($err != ''){
          echo $err;
        }
        ?>
      </div>
            <form action="signup.php" method="post">

       <div class="form-group">
         <span>User Name</span>
         <input type="name" name="name" class="form-control">
       </div>
       <div class="form-group">
         <span>Pssword</span>
         <input type="password" name="pass" class="form-control">
       </div>
   
       <input type="submit" name="submit" class="btn btn-success">
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
