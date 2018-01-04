<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["cid"])) 
	{
		header("Location:index.php");
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

	if (isset($_POST['rid']))
	{
		$cid=$_SESSION["cid"];
		$rid=$_POST['rid'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$address=$_POST['address'];
		$door=$_POST['door'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pin=$_POST['pin'];
		$pname=$_POST['pname'];
		$pphone=$_POST['pphone'];
		$proof=$_POST['proof'];
		$id_no=$_POST['id_no'];
		$status="0";					
					
		$q = $con->prepare("UPDATE `customer` SET gender = ?, dob = ?, address = ?, door = ?, city = ?, state = ?, pin = ?, pname = ?, pphone = ?, proof = ?, id_no = ?, rid = ?, status = ? WHERE cid = ?");
		$q->bind_param('ssssssssssssss', $gender, $dob, $address, $door, $city, $state, $pin, $pname, $pphone, $proof, $id_no, $rid, $status, $cid);
		$q->execute();
		$res = $q->get_result();
			
		?>
			<div role="alert" class="alert alert-success"> 
				<strong>Request sent successfully!!</strong> For further details please contact admin...
			</div>
		<?php		
	}	
	else
	{			
		header('Location:add_room.php');			
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
