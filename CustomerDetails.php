<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["aid"])) {
		header("Location:login.php");
	}
	
	require('includes/connect.php');
				
	$q = $con->prepare("SELECT * FROM `customer` where rid!=''");		
	$q->execute();
	$res = $q->get_result();
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
	
<section id="shop-cart">
	<div class="container">
		<div class="shop-cart">			
			<div class="table table-condensed table-striped table-responsive">				
						<?php				
							if (mysqli_num_rows($res) != 0) 
							{
								?>
								<div class="col-md-12 m-t-20">
									<h3>Customer Details</h3>
								</div>
								<table class="table">
								<thead>
									<tr>
										<th></th>															
										<th>Name</th>
										<th>E Mail</th>
										<th>Phone No.</th>
										<th>Room No.</th>
										<th>Notify</th>																
									</tr>
								</thead>
								<tbody>	
								<?php	
								while($row = $res->fetch_assoc())
								{
									$firstname = $row['firstname'];									
									$email= $row['email'];
									$phone = $row['phone'];
									$rid=$row['rid'];
									
									$q1 = $con->prepare("SELECT * FROM `room` where rid=?");						
									$q1->bind_param('s',$rid);
									$q1->execute();
									$res1 = $q1->get_result();
									
									if (mysqli_num_rows($res1) != 0) 
									{
										if($row1 = $res1->fetch_assoc())
										{
											$roomno=$row1['roomno'];											
										}
									}
									
									?>	
									<tr>
										<th></th>	
										<td class="cart-product-description">
											<?php echo "$firstname";?>
										</td>
										<td class="cart-product-description">
											<?php echo "$email";?>
										</td>
										<td class="cart-product-thumbnail">
											<?php echo "$phone";?>
										</td>
										<td class="cart-product-thumbnail">
											<?php echo "$roomno";?>
										</td>
										<td class="cart-product-thumbnail">
											<div class="row center">
												<a class="button small" href="admin_complain_reply.php?email=<?php echo $email; ?>"><span>Select</span> </a>
											</div>
										</td>
									</tr>
									<?php
								}
							}else
							{
								?>
									<div class="container container-fullscreen">
										<div class="text-middle">
											<div class="row">
												<div class="col-md-6 col-md-offset-3 p-30 background-white">
													<div class="col-md-12">
													<div role="alert" class="alert alert-danger">
														<h4>Customer Details!!</h4>
														<p>Their are no customers in the pg!!</p>
													</div>
											</div>
												</div>
											</div>
										</div>
									</div>
								<?php
							}
						?>
						
					</tbody>

				</table>

			</div>	

		</div>
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
