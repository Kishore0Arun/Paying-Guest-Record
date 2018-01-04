<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


	$message="";
	require('includes/connect.php');

	if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['phone']) && isset($_POST['answer'])  )
	{
		$usr_email = $_POST['email'];
		$usr_phone = $_POST['phone'];
		$usr_que = $_POST['question'];
		$usr_ans = $_POST['answer'];
		
		$q = $con->prepare("SELECT * FROM `users` WHERE email= ? and  phone = ? and question = ? and answer = ?");
		$q->bind_param('ssss', $usr_email, $usr_phone, $usr_que, $usr_ans);
		$q->execute();
		$res = $q->get_result();
			
			if (mysqli_num_rows($res) != 0) 
			{
				header('Location:index.php');			
			}
			else
			{
				$message="Please enter correct user crediantials!!";
				header('Location:forgot.php');	
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
	<title>Forgot Password</title>

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
							ob_start();
							include("support_files/navstatic.php");
						?>
					
					

					<!-- END: search / navigation / message -->
					
					
					
	<!-- SECTION -->
	<form action="forgot_process.php" method="POST">

	<div class="container container-fullscreen" name="mainForm"    >
		<div class="text-middle">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 p-30 background-white">
						<div class="col-md-12 m-t-20">
						<h3>Forgot Password?</h3>
						<p>To reset your password, enter your email address and phone number below.</p>
						</div>
						
						
						
						<div class="col-md-6 form-group">
							<label class="sr-only">Email</label>
							<input type="email" name="email" value="" placeholder="Email"
							class="form-control input-lg" required>
						</div>
						
						<div class="col-md-6 form-group">
							<label class="sr-only">Phone</label>
							<input title="Enter valid number" type="text" name="phone"  minlength="10"  maxlength="10" required pattern="(7|8|9)\d{9}" 
							value="" placeholder="Phone" class="form-control input-lg">
						</div>
						
						
						<div class="col-md-12 form-group">
							<select title="Select security question" name="question"  class="form-control" required>
							<option selected disabled>Security Question</option>
							<option value="1">1. What is the last name of the teacher who gave you your first failing grade?</option>
							<option value="2">2. In what city or town does your nearest sibling live?</option>
							<option value="3">3. What time of the day were you born? (hh:mm)</option>
							<option value="4">4. What was the name of the hospital where you were born?</option>
							<option value="4">5. What is your oldest cousin's first and last name? </option>
							<option value="4">6. What's John's (or other friend/family member) middle name?</option>	
							</select>
					   </div>
						
						<div class="col-md-12 form-group">
							<label class="sr-only">Answer</label>
							<input type="text" name="answer" value="" placeholder="Your answer"
							class="form-control input-lg" required>
						</div>
									
						
						
						
						<div class="col-md-12 form-group">
						<input class="btn btn-primary" type="Submit" value="Submit"> <a href="index.php"><button type="button" class="btn btn-danger m-l-10">Cancel</button></a>
	
						</div>
						
					</div>
			</div>
		</div>
		
		
		
	</div>
	
</form>

	<div class="container container-fullscreen">
		<div class="text-middle">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 p-30 background-white">


<?php

	require("includes/connect.php");
	
	
	if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['phone']) && isset($_POST['answer'])  )
	{
		$usr_email = $_POST['email'];
		$usr_phone = $_POST['phone'];
		$usr_que = $_POST['question'];
		$usr_ans = $_POST['answer'];
		
		$q = $con->prepare("SELECT * FROM `users` WHERE email= ? and  phone = ? and question = ? and answer = ?");
		$q->bind_param('ssss', $usr_email, $usr_phone, $usr_que, $usr_ans);
		$q->execute();
		$res = $q->get_result();
		
		
		if (mysqli_num_rows($res) != 0) {
		$row = mysqli_fetch_array($res);
		
		
		$_SESSION["user_phone"] = $row['phone'];
		
		
		
		//echo $user_phoneSession;
		
		
		?>
			<form action="forgot_process.php" method="POST">
						<div class="col-md-12 m-t-20">
						<h3>Enter new password.</h3>
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">Password</label>
							<input type="password" name="pwd1" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"
							value="" placeholder="Enter new password" class="form-control input-lg" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
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
						<input class="btn btn-primary" name="btn2" type="Submit" value="Reset"> <a href="index.php"><button type="button" class="btn btn-danger m-l-10">Cancel</button></a>
	
						</div>
			</form>
						
						
		
		<?php
		
		
		
			
			
			
			
		
		
		
		
		
		
		
		
		
			
	
	}
	else
	{
		?>
		
		<h3>Password recovery failed.</h3>
		
		<div role="alert" class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
		<strong><i class="fa fa-warning"></i> Warning!</strong> Enter valid email address, phone number, security question and answer
		</div>
		
		
		
		
		<?php
		
		
		
			
	}
		
	}
	else
	{
		//main if else part 
	
	}
	
	
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