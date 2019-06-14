<?php
session_start();
require_once('config.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
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

   <section class = "body">
   	<?php
		if($isValidChecksum == "TRUE") {
			// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
			if ($_POST["STATUS"] == "TXN_SUCCESS") {
				echo "<div class='text-center'><h2>Transaction status is success</h2></div>" . "<br/>";
				//Process your transaction here as success transaction.
				//Verify amount & order id received from Payment gateway with your application's order id and amount.
			}
			else {
				echo "<b>Transaction status is failure</b>" . "<br/>";
			}

			if (isset($_POST) && count($_POST)>0 )
			{
				?>
				<div class="container tab">
					 <div class="table-responsive" id="payment">
						<table class= 'table table-striped'>
							<tbody>
								<?php
									foreach($_POST as $paramName => $paramValue) {
								?>
								<tr >
									<td><label><?php echo $paramName?></label></td>
									<td><?php echo $paramValue?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<?php
			}
		}
		else {
			echo "<b>Checksum mismatched.</b>";
			//Process transaction as suspicious.
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