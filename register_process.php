<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	
	<link rel="shortcut icon" href="">
	<title>Register</title>

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
						<a href="index.html" class="logo" data-dark-logo="images/logo/logo.png">
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
							ob_start();
							include("support_files/navstatic.php");
						?>
					
					

					<!-- END: search / navigation / message -->
					
					
					
	<!-- SECTION -->

	<div class="container container-fullscreen">
		<div class="text-middle">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 p-30 background-white">
						
<?php

	require("includes/connect.php");
	
	if(!isset($_POST['email']) && !isset($_POST['phone'])  )
	{
		
		header('Location:register.php');
		
		
	}
	else
	{
	
		
	
	$usr_email = $_POST['email'];
	$usr_phone = $_POST['phone'];

	$q = $con->prepare("SELECT * FROM `customer` WHERE email = ? ");
	$q->bind_param('s', $usr_email);
	$q->execute();
	$res = $q->get_result();
	
	$q1 = $con->prepare("SELECT * FROM `customer` WHERE phone = ? ");
	$q1->bind_param('s', $usr_phone);
	$q1->execute();
	$res1 = $q1->get_result();
	
	if (mysqli_num_rows($res) != 0) {
		$row = mysqli_fetch_array($res);
		
		?>
		
		<h1>Registration failed</h1>
		
		<div role="alert" class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
		<strong><i class="fa fa-warning"></i> Warning!</strong> Better check your email id, it's used already. Try with diffrent email id or login
		</div>
		
		
		
		<?php
		
	}
	
	else if (mysqli_num_rows($res1) != 0) {
		$row = mysqli_fetch_array($res1);
		?>
		
		<h1>Registration failed</h1>
		
		<div role="alert" class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
		<strong><i class="fa fa-warning"></i> Warning!</strong> Better check your phone number, it's used already. Try with diffrent phone number or login
		</div>
		
		<?php
		
	}
	
	else
	{
	
		if (isset($_POST['fname']) && isset($_POST['lname'])
		&& isset($_POST['email']) && isset($_POST['pwd1'])
		&& isset($_POST['phone']) && isset($_POST['question']) && isset($_POST['answer']))
		{
			$firstname=$_POST['fname'];
			$lastname=$_POST['lname'];
			$email=$_POST['email'];
			$password=md5($_POST['pwd1']);
			$phone=$_POST['phone'];
			$question=$_POST['question'];
			$answer=$_POST['answer'];
			
			
			$stmt = $con->prepare("INSERT INTO customer (firstname, lastname, email, password, phone, question, answer) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssss", $firstname, $lastname, $email, $password, $phone, $question, $answer);
			$stmt->execute();
			
			?>
			
			
		
				<div role="alert" class="alert alert-success"> 
					<strong>Well done!!</strong> Registration successfull...
				</div>
			
			
			<?php
			
			
			
			
		}	
		else
		{
			
			header('Location:register.php');
			
		}	
	}
	}
	mysqli_close($con);
?>	
			
						
						
						
						
					</div>
			</div>
		</div>
		
		
		
	</div>
	

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
