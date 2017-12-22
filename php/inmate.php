
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
				<ul class="nav navbar-nav">
					<li><a href = "../index.html">Home</a></li>
					<li class="active"><a href = "../html/find_inmate.html">Find-Inmates</a></li> 
					<li><a href = "../html/admin.html">Admin Login</a></li> 
                    <li><a href="details.php">Prisoner's Details</a></li>
				</ul>
		</div>
	</nav>	 

  <?php
  $conn = mysqli_connect("localhost", "root" , "" ,"prison");
  if(!$conn)
    die("Connection failed: " . mysqli_connect_error());

   $name = $_POST["name"];
   $identity = $_POST["identity"];
   $query = "SELECT * FROM `data` WHERE `identity` = '$identity' AND `name` = '$name' ";
   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $row = mysqli_fetch_assoc($result);
   if(is_null($row)) {
   ?>
     <div class="admin-incorrect">
  	       <div class="container jumbotron text-center">
  		       	<p> Sorry! No Inmate Found</p><br>
  	   	    	<p> <span>Try Again</span>
  	   	    <span><button type="submit" class="btn btn-default"onclick="window.location.href='../html/find_inmate.html'">Reload!</button>
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