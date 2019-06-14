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
					<li><a href = "../html/familyLogin.html" class="btn btn-default">Back to Family Login</a></li>
				</ul>
		</div>
	</nav>	 

   <section class = "body">
   	<div class="form">
       <div class="container well">
          <h2 class="text-center">Enter Details</h2>
          <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return check();"method="post">
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="name">User-Name</label>
				      <span class="error" id = "nameError"></span>
				      <div class="col-sm-5">
				        <input type="text" class="form-control" id="name" placeholder="Enter Name.." name="name" autocomplete="off">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="identity">Password</label>
				      <span class="error" id = "passwordError"></span>
				      <div class="col-sm-5">          
				        <input type="Password" class="form-control" id="password" placeholder="Enter password.." name="password" autocomplete="off">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="identity">Inmate Id</label>
				      <span class="error" id = "idError"></span>
				      <div class="col-sm-5">          
				        <input type="text" class="form-control" id="id" placeholder="Enter inmate id.." name="id" autocomplete="off">
				      </div>
				    </div>
				    <div class="form-group">        
				      <div class="col-sm-offset-5 col-sm-6">
				        <button type="submit" class="btn btn-default">Submit</button>
				      </div>
				    </div>
		   </form>
        </div>
    </div>
    </section>

<section>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST["name"];
		$identity = $_POST["id"];
		$password = $_POST["password"];
		 
		$q = "INSERT INTO `family`( `name`, `password`, `identity`) VALUES ('$name','$password','$identity');";
		if(mysqli_query($conn,$q))
			{
			?>
		    <div class="admin-incorrect">
			    <div class="container jumbotron text-center">
			       	<p>Data Successfully Updated</p><br>
		   	    	<p> <span>Login</span>
		   	    	<span><button type="submit" class="btn btn-default" onclick="window.location.href='../html/familyLogin.html'">Go Back!</button>
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
		   	    	<p> <span>Try Again</span> </p>
		   	    	<!-- <span><button type="submit" class="btn btn-default"onclick="window.location.href='admin.php'">Go Back!</button>
		   	    	</span></p> -->.
		        </div>
	        </div>
	        <?php
	        }
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

<script>
    function check() {
    	var name = document.getElementById("name").value;
    	var id = document.getElementById("id").value;
    	var password = document.getElementById("password").value;
        var flag = 0;
        var flag2 = 0;
        
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

         <?php
				  $query = "SELECT * FROM `family` ";

		          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		           while($row = mysqli_fetch_assoc($result)){

		                ?>

         else if (name == "<?php echo $row['name'] ?>") {
          	document.getElementById("nameError").innerHTML = "User-Name already taken";
            document.getElementById("nameError").style.display = "inline-block";
            document.getElementById("nameError").style.color = "red";
            flag = 1;
        }
	             
	              <?php
	              }
	              ?>
        else
        	document.getElementById("nameError").style.display = "none";
                        
	     <?php
				  $query = "SELECT * FROM `data`";

		          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		           while($row = mysqli_fetch_assoc($result)){

		                ?>

			        if (id == "<?php echo $row['identity'] ?>") {
			            flag2 = 1;
       				}
	             
	              <?php
	              }
	              ?>

	   if(id == "") {
       	    document.getElementById("idError").innerHTML = "*Please Enter the id";
        	document.getElementById("idError").style.display = "inline-block";
            flag = 1;
        }

	   else if(flag2 == 0) {
	   	document.getElementById("idError").innerHTML = "*Id Doesn't exists";
        document.getElementById("idError").style.display = "inline-block";
        document.getElementById("idError").style.color = "red";
        flag = 1;
	   }

	   else
        document.getElementById("idError").style.display = "none";

       if(password == "") {
       	    document.getElementById("passwordError").innerHTML = "*Please Enter the password";
        	document.getElementById("passwordError").style.display = "inline-block";
            flag = 1;
        }

        else
         document.getElementById("passwordError").style.display = "none";

       if(flag == 1)
          	return false;
    } 
</script>
</html>