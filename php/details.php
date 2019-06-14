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
	<header class="pris-header cover" style="background-image: url(../images/details.jpg);">
		<div class="overlay"></div>
		<div class="container">
		   <div class = "row">
			  <div class = "col-md-12 text-center text-wrap">
				<p>Prison Management</p>
			  </div>
			   <div class = "col-md-12 text-center text-wrap " style="margin-top: 6em;">
				<p>Prisoner's Details</p>
	      </div>
	    </div>
	</header>

	<nav class ="navbar navbar-default ">
		<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href = "../index.html">Home</a></li>
		          	<li><a href = "../html/acts_and_rules.html">Acts & Rules</a></li>   
		          	<li><a href = "../html/familyLogin.html">Family Login</a></li>
		          	<li><a href = "../html/admin.html">Admin Login</a></li> 
		          	<li class ="active"><a href="./details.php">Prisoner's Details</a></li>
				</ul>
		</div>
	</nav>	 

   <section class = "body">
   	<div class="form">
      <div class="container tab">
			  <h2 class="text-center well" data-toggle="collapse" data-target="#inout"> In-Out Register</h2>
			   <div class="table-responsive collapse" id="inout">          
				    <table class="table">
					    <thead>
						      <tr>
						        <th>Name</th>
						        <th>Age</th>
						         <th>Crime</th>
						        <th>Identity Number</th>
						        <th>Location</th>
						      </tr>
					     </thead>
					     <?php
								  $query = "SELECT * FROM `data` ";

						          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

						           while($row = mysqli_fetch_assoc($result)){

						                ?>
					     <tbody>
						      <tr>
						        <td><?php echo $row['name'] ?></td>
						        <td><?php echo $row['age'] ?></td>
						        <td><?php echo $row['crime'] ?></td>
						        <td><?php echo $row['identity'] ?></td>
						        <td><?php echo $row['inouts'] ?></td>
						        </tr>
					    </tbody>
					    <?php
						}
						?>
				  </table>
			  </div>
			</div>
    </div>
    </section>

     <section class = "body">
   	<div class="form">
      <div class="container tab">
			  <h2 class="text-center well" data-toggle="collapse" data-target="#duty"> Duty Register</h2>
			   <div class="table-responsive collapse " id="duty">          
				    <table class="table">
					    <thead>
						      <tr>
						        <th>Name</th>
						        <th>Age</th>
						         <th>Crime</th>
						        <th>Identity Number</th>
						        <th>Duty</th>
						      </tr>
					     </thead>
					     <?php

								  $query = "SELECT * FROM `data` ";

						          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

						           while($row = mysqli_fetch_assoc($result)){
                                        if(!($row['duty'] == 'none' || $row['duty'] == 'None')) {
						                ?>
					     <tbody>
						      <tr>
						        <td><?php echo $row['name'] ?></td>
						        <td><?php echo $row['age'] ?></td>
						        <td><?php echo $row['crime'] ?></td>
						        <td><?php echo $row['identity'] ?></td>
						        <td><?php echo $row['duty'] ?></td>
						        </tr>
					    </tbody>
					    <?php
						} }
						?>
				  </table>
			  </div>
	   </div>
    </div>
    </section>

   <section class = "body">
   	<div class="form">
      <div class="container tab">
			  <h2 class="text-center well" data-toggle="collapse" data-target="#date"> Release Dates</h2>
			   <div class="table-responsive collapse" id="date">          
				    <table class="table">
					    <thead>
						      <tr>
						        <th>Name</th>
						        <th>Age</th>
						         <th>Crime</th>
						        <th>Identity Number</th>
						        <th>Release Date</th>
						      </tr>
					     </thead>
					     <?php

								  $query = "SELECT * FROM `data` ";

						          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

						           while($row = mysqli_fetch_assoc($result)){

						                ?>
					     <tbody>
						      <tr>
						        <td><?php echo $row['name'] ?></td>
						        <td><?php echo $row['age'] ?></td>
						        <td><?php echo $row['crime'] ?></td>
						        <td><?php echo $row['identity'] ?></td>
						        <td><?php echo $row['date'] ?></td>
						        </tr>
					    </tbody>
					    <?php
						}
						?>
				  </table>
			  </div>
			</div>
    </div>
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