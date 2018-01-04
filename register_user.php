<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["cid"])) {
		header("Location:login.php");
	}
	
	require('includes/connect.php');
	$cid=$_SESSION["cid"];					
	$q = $con->prepare("SELECT * FROM `customer` where cid='".$cid."'");	
	$q->execute();
	$res = $q->get_result();
	
	if (mysqli_num_rows($res) != 0) 
	{				
		$row = mysqli_fetch_array($res);
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$email = $row['email'];
		$phone = $row['phone'];
	}
?>

<?php
	$rid=$_GET['rid'];
	//echo "$rid";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	
	<link rel="shortcut icon" href="">
	<title>Paying Guest</title>

	<!-- Bootstrap Core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="vendor/animateit/animate.min.css" rel="stylesheet">

	<!-- Vendor css -->
	<link href="vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Template base -->
	<link href="css/theme-base.css" rel="stylesheet">

	<!-- Template elements -->
	<link href="css/theme-elements.css" rel="stylesheet">	
    
    
	<!-- Responsive classes -->
	<link href="css/responsive.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->		

	<!-- Template color -->
	<link href="css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">

	<!-- LOAD GOOGLE FONTS -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

	<!-- CSS CUSTOM STYLE -->
    <link rel="stylesheet" type="text/css" href="css/custom.css" media="screen" />

    <!--VENDOR SCRIPT-->
    <script src="vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="vendor/plugins-compressed.js"></script>

</head>

<body class="wide">
	

	<!-- WRAPPER -->
	<div class="wrapper">

	<!-- HEADER -->
	<header id="header" class="header-transparent">
	<div id="header-wrap">
	<div class="container">

	<!--LOGO-->
	<div id="logo">
	<a href="index.php" class="logo" data-dark-logo="images/logo/logo.png">
	<img src="images/logo/logo.png" alt="Polo Logo">
	</a>
	</div>
	<!--END: LOGO-->

	<!--MOBILE MENU -->
	<div class="nav-main-menu-responsive">
	<button class="lines-button x" type="button" data-toggle="collapse" data-target=".main-menu-collapse">
	<span class="lines"></span>
	</button>
	</div>
	<!--END: MOBILE MENU -->
	
	<!-- search / navigation / message -->
									
	<?php
		include("support_files/navstatic.php");
	?>

	<!-- END: search / navigation / message -->
					
	
	<section>
	<form action="request_room.php" method="POST">
	<input type="hidden" name="rid" value="<?php echo $_GET['rid']; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-8 center no-padding">
						<div class="col-md-12">
							<h3>Register User</h3>							
						</div>						
						<div class="col-md-6 form-group">
							<input type="text" name="fname" value="<?php echo "$firstname";?>" class="form-control input-lg minlength="3" disabled>
						</div>
						<div class="col-md-6 form-group">
							<input type="text" name="lname" value="<?php echo "$lastname";?>" class="form-control input-lg" disabled>
						</div>	
						<div class="col-md-6 form-group">
							<input type="text" class="form-control input-lg" value="<?php echo "$email";?>" name="email" disabled>
						</div>
						<div class="col-md-6 form-group">
							<input title="Enter valid number" type="text" name="phone"  value="<?php echo "$phone";?>" class="form-control input-lg" disabled>
						</div>			
						<div class="col-md-6 form-group">
							<select name="gender"  class="form-control" required>
								<option selected disabled>Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
					   </div>
						<div class="col-md-6 form-group">
							<input type="date" name="dob" value="" placeholder="Date of Birth" class="form-control input-lg"  required>
						</div>
						
						<div class="col-md-12 form-group">
							<input type="text" class="form-control input-lg" placeholder="Address" value="" name="address">
						</div>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control input-lg" placeholder="Door No. / Apartment" value="" name="door">
						</div>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control input-lg" placeholder="Town / City" value="" name="city">
						</div>						
						<div class="col-md-6 form-group">
							<input type="text" class="form-control input-lg" placeholder="State / County" value="" name="state">
						</div>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control input-lg" placeholder="Pin Code" value="" name="pin" pattern="[0-9]+" minlength="6"  maxlength="6">
						</div>												
						<div class="col-md-6 form-group">
							<input type="text" title="Name must contain only alphabets and length should be greater than 3"
							name="pname" value="" placeholder="Parent / Guardian Name" class="form-control input-lg minlength="3" required  pattern="[a-zA-Z]+">
						</div>
						<div class="col-md-6 form-group">						
							<input title="Enter valid number" type="text" name="pphone"  minlength="10"  maxlength="10" required pattern="(7|8|9)\d{9}" 
							value="" placeholder="Parent / Guardian Phone" class="form-control input-lg">
						</div>
						<div class="col-md-6 form-group">
							<select name="proof"  class="form-control" required>
							<option selected disabled>ID Proof</option>
							<option value="Aadhar Card">1. Aadhar Card</option>
							<option value="Voter's ID">2. Voter's ID</option>
							<option value="Passport">3. Passport</option>
							<option value="Driving License">4. Driving License</option>	
							</select>
					   </div>
						<div class="col-md-6 form-group">
							<input type="text" class="form-control input-lg" placeholder="ID No." value="" name="id_no">
						</div>												
						<div class="col-md-12 form-group">
							<input class="btn btn-primary" type="Submit" value="Save"> 
							<a href="index.php"><button type="button" class="btn btn-danger m-l-10">Cancel</button></a>
						</div>					
			</div>
		</div>
	</div>
	</form>
	</section>
<!-- END: SECTION -->
	
	
	<!-- FOOTER -->
	<?php
	include("support_files/footer.html");
	?>
	<!-- END: FOOTER -->

	</div>
	<!-- END: WRAPPER -->

	<!-- GO TOP BUTTON -->
	<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

		<!-- Theme Base, Components and Settings -->
		<script src="js/theme-functions.js"></script>

	<!-- Custom js file -->
	<script src="js/custom.js"></script>
</body>
</html>
