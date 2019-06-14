<?php
session_start();
require_once('config.php');
?>
<!-- bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<!-- main style -->
<link rel="stylesheet" href="../css/style.css">
<!-- icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- script boostrap -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<html>
    <head>
      <title> Prison Management </title>
    </head>

<body>
  <header class="pris-header cover" style="background-image: url(../images/prison_inmates.jpg);">
    <div class="overlay"></div>
    <div class="container">
       <div class = "row">
        <div class = "col-md-12 text-center text-wrap">
        <p>Prison Management</p>
        </div>
         <div class = "col-md-12 text-center text-wrap " style="margin-top: 6em;">
        <p>Find Inmates</p>
        </div>
      </div>
  </header>

  <nav class ="navbar navbar-default ">
    <div class="container-fluid">
       <ul class="nav navbar-nav" style="float: right;">
           <?php
            $name = $_SESSION["login"];
              $password = $_SESSION["password"];

            $query = "SELECT * FROM `family` WHERE `name` = '$name'";

            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $row = mysqli_fetch_assoc($result);
      
              if($_SESSION["password"] == $row['password'])  {
               ?>
          <li><a href = "session/logoutFamily.php" class="btn btn-default">Logout</a></li>
          <?php
            }
            ?>
        </ul>
    </div>
  </nav>   

  <?php
 
   $identity = $_GET['id'];
   $query = "SELECT * FROM `data` WHERE `identity` = '$identity'";
   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $row = mysqli_fetch_assoc($result);
   if(is_null($row)) {
   ?>
     <div class="admin-incorrect">
           <div class="container jumbotron text-center">
              <p> Sorry! No Inmate Found</p><br>
              <p> <span>Try Again <?php echo $identity?></span>
            <span><button type="submit" class="btn btn-default"onclick="window.location.href='../html/familyLogin.html'">Reload!</button>
              </span></p>
            </div>
      </div>

      <?php
      }
      else {
      ?>

    <section class="body">
        <div class="container">
          <div class="text-center">
          <div class="photo-container">
                <img src = "<?php echo $row['photo'] ?>">
          </div></div>
          <div class="row jumbotron">
            <div class="col-md-4">
                    <p>Name : <?php echo $row['name'] ?></p><br>
                    <p>Age : <?php echo $row['age'] ?></p><br>
                    <p>Gender : <?php echo $row['gender'] ?></p>
                </div>
                <div class="col-md-4">
                    <p>Identity-Number : <?php echo $row['identity'] ?></p><br>
                    <p>Crime : <?php echo $row['crime'] ?></p><br>
                    <p>Location : <?php echo $row['inouts'] ?></p>
                </div>
                <div class="col-md-4">
                    <p>Current-Duty : <?php echo $row['duty'] ?></p><br>
                    <p>Release Date : <?php echo $row['date'] ?></p>
                </div>
          </div>
        </div>
    </section>
    <?php 
    }
    ?>

 
  <footer id="footer" class="style2">
      <div class="container">
      <div class="">
        <div class="col-md-12 text-center">
          <p>&copy; Prison Management | All Rights Reserved. </p>
        </div>
      </div>
    </div>
  </footer>

</body> 
</html>