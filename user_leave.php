<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["cid"])) 
	{
		header("Location:login.php");
	}
	
	require('includes/connect.php');
	
	$cid=$_SESSION["cid"];	
	
	$q = $con->prepare("SELECT * FROM `customer` where cid='".$cid."'");	
	$q->execute();
	$res = $q->get_result();
	
	$q2 = $con->prepare("SELECT * FROM `customer` WHERE cid = ?");
	$q2->bind_param('s', $cid);
	$q2->execute();
	$res2 = $q2->get_result();
			
	if (mysqli_num_rows($res2) != 0) 
	{
		$row2 = mysqli_fetch_array($res2);
		$status = $row2['status'];
	}
	
	//echo "$status";
	
	if($status=="0")
	{
		header('Location:msg1.php');
	}elseif($status=="")	
	{
		header('Location:msg4.php');
	}elseif($status=="2")
	{
		header('Location:msg3.php');
	}
	
	if (mysqli_num_rows($res) != 0) 
	{				
		$row = mysqli_fetch_array($res);
		$firstname = $row['firstname'];
		$email = $row['email'];
		$phone = $row['phone'];
		$rid = $row['rid'];		
	}
	
	$q1 = $con->prepare("SELECT * FROM `room` WHERE rid = ?");
	$q1->bind_param('s', $rid);
	$q1->execute();
	$res1 = $q1->get_result();
	if (mysqli_num_rows($res1) != 0) 
	{		
		$row1 = mysqli_fetch_array($res1);
		$roomno = $row1['roomno'];				
	}
?>

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
					
					
					
	<!-- SECTION -->
	<form action="user_leave_process.php" method="POST">

	<input type="hidden" value="<?php echo "$roomno";?>" name="roomno"/>
	<input type="hidden" value="<?php echo "$firstname";?>" name="firstname"/>
	<input type="hidden" value="<?php echo "$email";?>" name="email"/>
	<input type="hidden" value="<?php echo "$phone";?>" name="phone"/>
	
	<div class="container container-fullscreen">
		<div class="text-middle">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 p-30 background-white">
						<div class="col-md-12 m-t-20">
							<h3>Leave Note</h3>
						</div>
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$roomno";?>" class="form-control input-lg" disabled>
						</div>
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$firstname";?>" class="form-control input-lg" disabled>
						</div>
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$email";?>" class="form-control input-lg" disabled>
						</div>
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$phone";?>" class="form-control input-lg" disabled>
						</div>
						
						<div class="col-md-6 form-group">
							From:<input type="date" title="Enter the from date" name="fdate" value="" placeholder="From" class="form-control input-lg" required>
						</div>
						
						<div class="col-md-6 form-group">
							To:<input type="date" title="Enter the to date" name="tdate" value="" placeholder="To" class="form-control input-lg" required>
						</div>
						
						<div class="col-md-12 form-group">
							<textarea name="reason" row="10" placeholder="Reason" class="form-control input-lg"> Reason </textarea>
							
						</div>
												
						<div class="col-md-12 form-group">
							<input class="btn btn-primary" type="Submit" value="Send"> 
							<a href="index.php"><button type="button" class="btn btn-danger m-l-10">Cancel</button></a>
	
						</div>
						
					</div>
			</div>
		</div>
		
		
		
	</div>
	
</form>
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
