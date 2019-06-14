<?php
	session_start();
	require_once('config.php');
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
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
				<p>Family Login</p>
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

 
    <section class="body">
       <div class="form">
	       <div class="container well">
	          <h2 class="text-center">Update Prisoner's-Details</h2>
	          <form class="form-horizontal" action="pgRedirect.php"  method="post" enctype="multipart/form-data">
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="name">Email</label>
					      <span class="error" id = "nameError"></span>
					      <div class="col-sm-5">
					        <input class="form-control" id='email' type="email" name="EMAIL"  autocomplete="off">
					      </div>
					    </div>
				        <div class="form-group">
					      <label class="control-label col-sm-4" for="identity">Phone Number</label>
					      <span class="error" id = "idError"></span>
					      <div class="col-sm-5">          
					       <input class="form-control" id='phone' type="text" name="PHONE"  autocomplete="off">
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="age">Amount</label>
					      <span class="error" id = "ageError"></span>
					      <div class="col-sm-5">          
					        <input class="form-control" id='amount' type="text" name="TXN_AMOUNT"autocomplete="off">
					      </div>
					    </div>
					    <div class="col-sm-offset-5 col-sm-6">
					        <button type="submit" class="btn btn-default">Pay Money</button>
					      </div>
					    </div>
			   </form>
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