<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["cid"])) 
	{
		header("Location:login.php");
	}
	
	$cid=$_SESSION["cid"];
	
	require('includes/connect.php');
	
	$q = $con->prepare("SELECT * FROM `customer` where cid=?");						
	$q->bind_param('s',$cid);
	$q->execute();
	$res = $q->get_result();
	
	if (mysqli_num_rows($res) != 0) 
	{
		if($row = $res->fetch_assoc())
		{
			$lastname=$row['lastname'];
			$phone_no = $row['phone'];
			$email = $row['email'];
		}
	}
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
			<div class="container">	
					<!--Horizontal tabs triangle line simple-->
				<div id="tabs-01d1" class="tabs linetriangle triangle-simple">
					<h3>Hi, <?php echo $_SESSION["firstname"];   ?> </h3>
					<p></p>
					<ul class="tabs-navigation">
						<li class="active"><a href="#About01d"><i class="fa fa-home"></i>Your Profile</a> </li>
						<li><a href="#Services01d"><i class="fa fa-home"></i>Edit Profile </a> </li>
						
						<li><a href="#Assets01d"><i class="fa fa-home"></i>Change Password</a> </li>
					</ul>
			<div class="tabs-content">					
			<div class="tab-pane active" id="About01d">			
			<form action="#" method="POST">
			<div class="container container-fullscreen">
			<div class="text-middle">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 p-30 background-white">
					<div class="col-md-12 m-t-20">
						<h3>Account Information</h3>
						<p>If you want to edit your infromation, go to edit profile tab</p>
					</div>
						
						<div class="col-md-6 form-group">
							<label class="sr-only">First Name</label>
							<input type="text" readonly title="First name must contain only alphabets and length should be greater than 3"
							name="fname" value="<?php echo $_SESSION["firstname"];   ?>" placeholder="First Name" class="form-control input-lg minlength="3" required  pattern="[a-zA-Z]+"   ">
						</div>
						
						<div class="col-md-6 form-group">
							<label class="sr-only">Last Name</label>
							<input readonly title="Last name must contain only alphabets" 
							type="text" name="lname" value="<?php echo "$lastname";   ?>" placeholder="Last Name" 
							class="form-control input-lg"  required  pattern="[a-zA-Z]+" >
						</div>
						
						<div class="col-md-12 form-group">
							<label class="sr-only">Email</label>
							<input readonly type="email" name="email" value="<?php echo "$email";   ?>" placeholder="Email"
							class="form-control input-lg" required>
						</div>
												
						<div class="col-md-12 form-group">
							<label class="sr-only">Phone</label>
							<input readonly title="Enter valid number" type="text" name="phone"  minlength="10"  maxlength="10" required pattern="(7|8|9)\d{9}" 
							value="<?php echo "$phone_no";   ?>" placeholder="Phone" class="form-control input-lg">
						</div>
				</div>
			</div>
			</div>		
			</div>
			</form>	
			</div>
						
						
						
			<div class="tab-pane" id="Services01d">
				<form action="edit_user.php" method="POST">
					<div class="container container-fullscreen">
						<div class="text-middle">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 p-30 background-white">
									<div class="col-md-12 m-t-20">
										<h3>Edit Account Information</h3>
										<p>If you want to edit your phone no. & email, edit existing data to new.</p>
									</div>
									<div class="col-md-6 form-group">
										<label class="sr-only">First Name</label>
										<input readonly type="text" title="First name must contain only alphabets and length should be greater than 3"
										name="fname" value="<?php echo $_SESSION["firstname"];   ?>" placeholder="First Name" class="form-control input-lg minlength="3" disabled>
									</div>
									<div class="col-md-6 form-group">
										<label class="sr-only">Last Name</label>
										<input readonly title="Last name must contain only alphabets" 
										type="text" name="lname" value="<?php echo "$lastname";   ?>" placeholder="Last Name" 
										class="form-control input-lg">
									</div>
									<div class="col-md-12 form-group">
										<label class="sr-only">Email</label>
										<input type="email" name="email" value="<?php echo "$email";   ?>" placeholder="Email"
										class="form-control input-lg" required>
									</div>
									<div class="col-md-12 form-group">
										<label class="sr-only">Phone</label>
										<input title="Enter valid number" type="text" name="phone"  minlength="10"  maxlength="10" required pattern="(7|8|9)\d{9}" 
										value="<?php  echo "$phone_no";   ?>" placeholder="Phone" class="form-control input-lg">
									</div>
									<div class="col-md-12 form-group">
										<input class="btn btn-primary" type="Submit" value="Update">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>	
			</div>
			
			<div class="tab-pane" id="Assets01d">
				<form action="edit_password.php" method="POST">
					<div class="container container-fullscreen">
						<div class="text-middle">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 p-30 background-white">
									<div class="col-md-12 m-t-20">
										<h3>Change Password</h3>
										<p>Enter new password and confirm password to change the password</p>
									</div>
										<div class="col-md-6 form-group">
											<label class="sr-only">Password</label>
											<input type="password" name="pwd1" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"
											value="" placeholder="New Password" class="form-control input-lg" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
											onchange="
											this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
											if(this.checkValidity()) form.pwd2.pattern = this.value;"
											>
										</div>
										<div class="col-md-6 form-group">
											<label class="sr-only">Confirm Password</label>
											<input type="password" name="pwd2" title="Please enter the same Password as above"
											value="" placeholder="Confirm Password" class="form-control input-lg"
											required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
											onchange="
											this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
											>
										</div>
										<div class="col-md-12 form-group">
											<input class="btn btn-primary" type="Submit" value="Change Password"> 
										</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
				<!--END: Horizontal tabs triangle line simple-->
					
					
					</div>
					</section>
	
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
