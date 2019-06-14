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
	<header class="pris-header cover" style="background-image: url(../images/admin.jpg);">
		<div class="overlay"></div>
		<div class="container">
		   <div class = "row">
			  <div class = "col-md-12 text-center text-wrap">
				<p>Prison Management</p>
			  </div>
			   <div class = "col-md-12 text-center text-wrap " style="margin-top: 6em;">
				<p>Admin Login Panel</p>
	      </div>
	    </div>
	</header>

	<nav class ="navbar navbar-default ">
		<div class="container-fluid">
				<ul class="nav navbar-nav" style="float: right;">
					 <?php
				      if($_SESSION["login"] == 'admin' and $_SESSION["password"] == 'admin')  {
				       ?>
					<li><a href = "session/logoutAdmin.php" class="btn btn-default">Logout</a></li>
					<?php
				    }
				    ?>
					<!-- <li><a href = "../html/find_inmate.html">Find-Inmates</a></li> 
					<li class="active"><a href = "../html/admin.html">Admin Login</a></li> 
                    <li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="">Prisoner's Details<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">In-Out Register</a></li>
								<li><a href="#">Duty Register</a></li>
								<li><a href="#">Release Dates</a></li>
							</ul>
					</li> -->
				</ul>
		</div>
	</nav>	 

   <section class = "body">

      <?php
      if($_SESSION["login"] != 'admin' or $_SESSION["password"] != 'admin')  {
       ?>

       <div class="admin-incorrect">
	       <div class="container jumbotron text-center">
		       	<p> Sorry! Incorrect Login</p><br>
	   	    	<p> <span>Try Again</span>
	   	    	<span><button type="submit" class="btn btn-default" onclick="window.location.href='../html/admin.html'">Reload!</button>
	   	    	</span></p>
	        </div>
        </div>

	   <?php  
       }
       else {
       ?>

    <section class="body">
       <div class="form">
	       <div class="container well">
	          <h2 class="text-center">Update Prisoner's-Details</h2>
	          <form class="form-horizontal" action="data.php" onsubmit="return check();" method="post" enctype="multipart/form-data">
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="name">First-Name</label>
					      <span class="error" id = "nameError"></span>
					      <div class="col-sm-5">
					        <input type="text" class="form-control" id="name" placeholder="Enter Name.." name="name" autocomplete="off">
					      </div>
					    </div>
				        <div class="form-group">
					      <label class="control-label col-sm-4" for="identity">Identity Number</label>
					      <span class="error" id = "idError"></span>
					      <div class="col-sm-5">          
					        <input type="text" class="form-control" id="identity" placeholder="Enter Identity Number.." name="identity" autocomplete="off">
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="age">Age</label>
					      <span class="error" id = "ageError"></span>
					      <div class="col-sm-5">          
					        <input type="number" class="form-control" id="age" placeholder="Enter Age.." name="age" autocomplete="off">
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="gender">Gender</label>
					       <div class="col-sm-5"> 
            				 <select class="form-control" id="gender" name="gender">
					      	   <option>Male</option>
					      	   <option>Female</option>
					         </select>
					       </div>
					   </div>
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="crime">Crime</label>
					      <span class="error" id = "crimeError"></span>
					      <div class="col-sm-5">          
					        <input type="text" class="form-control" id="crime" placeholder="Enter Crime.." name="crime" autocomplete="off">
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-4" for="date">Release Date</label>
					       <span class="error" id = "dateError"></span>
					      <div class="col-sm-5">          
					        <input type="date" class="form-control" id="date" placeholder="" name="date" autocomplete="off">
					      </div>
					    </div> 
						<div class="form-group">
					      <label class="control-label col-sm-4" for="duty">Duty</label>
					      <span class="error" id = "dutyError"></span>
					      <div class="col-sm-5">
					        <input type="text" class="form-control" id="duty" placeholder="Enter Duty.." name="duty" autocomplete="off">
					      </div>
				        </div>
				        <div class="form-group">
					      <label class="control-label col-sm-4" for="inouts">In/Out</label>
					      <span class="error" id = "inoutsError"></span>
					      <div class="col-sm-5">
					        <input type="text" class="form-control" id="inouts" placeholder="Enter Location.." name="inouts" autocomplete="off">
					      </div>
				       </div>
				       <div class="form-group">
					      <label class="control-label col-sm-4" for="crime">Inmate's Photo</label>
					      <span class="error" id = "photoError"></span>
					      <div class="col-sm-5">          
					        <input type="file" class="" id="photo" placeholder="Enter Path.." name="photo" autocomplete="off"> 
					      </div>
					    </div>
					     <div class="form-group">        
					      <div class="col-sm-offset-5 col-sm-6">
					        <button type="submit" class="btn btn-default">Update</button>
					      </div>
					    </div>
			   </form>
	        </div>
        </div>
    </section>
     

   </section>

    <section class = "body">
   	<div class="form">
       <div class="container well">
          <h2 class="text-center">Delete Prisoner's-Details</h2>
          <form class="form-horizontal" action="delete.php" method="post">
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="name">Name</label>
				      <div class="col-sm-5">
				        <input type="text" class="form-control" id="name" placeholder="Enter Name.." name="name">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="identity">Identity Number</label>
				      <div class="col-sm-5">          
				        <input type="text" class="form-control" id="identity" placeholder="Enter Identity Number.." name="identity">
				      </div>
				    </div>
				     <div class="form-group">        
				      <div class="col-sm-offset-5 col-sm-6">
				        <button type="submit" class="btn btn-default">Delete</button>
				      </div>
				    </div>
		   </form>
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

<script>
    function check() {
    	var name = document.getElementById("name").value;
    	var id = document.getElementById("identity").value;
    	var age = document.getElementById("age").value;
    	var crime = document.getElementById("crime").value;
    	var duty = document.getElementById("duty").value;
    	var inouts = document.getElementById("inouts").value;
    	var date = document.getElementById("date").value;
    	var photo = document.getElementById("photo").value;
        var flag = 0;
        
        if (!/^[a-z A-Z]*$/.exec(name)) {
        	document.getElementById("nameError").innerHTML = "*Only Characters Allowed";
        	document.getElementById("nameError").style.display = "inline-block";
            flag = 1;
        }
        else if(name == ""){
        	document.getElementById("nameError").innerHTML = "*Please Enter the Name";
        	document.getElementById("nameError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("nameError").style.display = "none";

        if(age < 1 || age > 100) {
        	document.getElementById("ageError").innerHTML = "*Age limit 1-100";
        	document.getElementById("ageError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("ageError").style.display = "none";

        if (!/^[a-z A-Z]*$/.exec(crime)) {
        	document.getElementById("crimeError").innerHTML = "*Only Characters Allowed";
        	document.getElementById("crimeError").style.display = "inline-block";
            flag = 1;
        }
        else if(crime == ""){
        	document.getElementById("crimeError").innerHTML = "*Please Enter the crime";
        	document.getElementById("crimeError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("crimeError").style.display = "none";

        if (!/^[a-z A-Z]*$/.exec(duty)) {
        	document.getElementById("dutyError").innerHTML = "*Only Characters Allowed";
        	document.getElementById("dutyError").style.display = "inline-block";
            flag = 1;
        }
        else if(duty == ""){
        	document.getElementById("dutyError").innerHTML = "*Please Enter the duty";
        	document.getElementById("dutyError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("dutyError").style.display = "none";

        if (!/^[a-z A-Z]*$/.exec(inouts)) {
        	document.getElementById("inoutsError").innerHTML = "*Only Characters Allowed";
        	document.getElementById("inoutsError").style.display = "inline-block";
            flag = 1;
        }
        else if(inouts == ""){
        	document.getElementById("inoutsError").innerHTML = "*Please Enter the inouts";
        	document.getElementById("inoutsError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("inoutsError").style.display = "none";

        if(date == "") {
       	    document.getElementById("dateError").innerHTML = "*Please Enter the date";
        	document.getElementById("dateError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("dateError").style.display = "none";

                        
        if(id == "") {
       	    document.getElementById("idError").innerHTML = "*Please Enter the id";
        	document.getElementById("idError").style.display = "inline-block";
            flag = 1;
        }

	     <?php
				  $query = "SELECT * FROM `data` ";

		          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		           while($row = mysqli_fetch_assoc($result)){

		                ?>

         else if (id == "<?php echo $row['identity'] ?>") {
          	document.getElementById("idError").innerHTML = "*Id already taken";
            document.getElementById("idError").style.display = "inline-block";
            document.getElementById("idError").style.color = "red";
            flag = 1;
        }
	             
	              <?php
	              }
	              ?>
            
        else {
        	document.getElementById("idError").innerHTML = "*This ID can be used";
        	document.getElementById("idError").style.display = "inline-block";
            document.getElementById("idError").style.color = "green";
       }

     if(photo == "") {
       	    document.getElementById("photoError").innerHTML = "*Please select the photo";
        	document.getElementById("photoError").style.display = "inline-block";
            flag = 1;
        }
        else
        	document.getElementById("photoError").style.display = "none";

          if(flag == 1)
          	return false;
        } 
</script>

</html>