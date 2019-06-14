<?php
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
	<header class="pris-header cover" style="background-image: url(../images/admin.jpg);">
		<div class="overlay"></div>
		<div class="container">
		   <div class = "row">
			  <div class = "col-md-12 text-center text-wrap">
				<p>Prison Management</p>
			  </div>
			   <div class = "col-md-12 text-center text-wrap " style="margin-top: 6em;">
				<p>Admin Login</p>
	      </div>
	    </div>
	</header>

	<nav class ="navbar navbar-default ">
		<div class="container-fluid">
				<ul class="nav navbar-nav" style="float: right;">
					<li><a href = "session/logoutAdmin.php" class="btn btn-default">Logout</a></li>
					<!-- <li><a href = "../html/find_inmate.html">Find-Inmates</a></li> 
					<li class="active"><a href = "#">Admin Login</a></li> 
                    <li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="">Prisoner's Details<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">In-Out Register</a></li>
								<li><a href="#">Duty Register</a></li>
								<li><a href="#">Release Dates</a></li> -->
							</ul>
					</li>
				</ul>
		</div>
	</nav>	 

   <section class = "body">

<?php

$name = $_POST["name"];
$identity = $_POST["identity"];
$age = $_POST["age"];
$gender = $_POST["gender"];
// $photo = "../images/prisoners/" . $_POST["photo"];
$crime = $_POST["crime"];
$date = $_POST["date"];
$duty = $_POST["duty"];
$inout = $_POST["inouts"];
// uploading the photo
$target_dir = "../images/prisoners/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

 
$q = "INSERT INTO `data`( `name`, `identity`, `age`, `gender`,`photo`, `crime`, `date`, `duty`, `inouts`) VALUES ('$name','$identity','$age','$gender','$target_file','$crime','$date','$duty','$inout');";
if(mysqli_query($conn,$q))
 {
?>
 <div class="admin-incorrect">
       <div class="container jumbotron text-center">
	       	<p>Data Successfully Updated</p><br>
   	    	<p> <span>Add More</span>
   	    	<span><button type="submit" class="btn btn-default"onclick="window.location.href='admin.php'">Go Back!</button>
   	    	</span></p>
        </div>
    </div>

   <?php  
   }
   else {
   ?>
   <div class="admin-incorrect">
       <div class="container jumbotron text-center">
	       	<p>Data not Updated</p><br>
   	    	<p> <span>Try Again</span>
   	    	<span><button type="submit" class="btn btn-default"onclick="window.location.href='admin.php'">Go Back!</button>
   	    	</span></p>
        </div>
    </div>
    <?php
    }
   ?>

   </section>

 
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