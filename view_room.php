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
				
	$q = $con->prepare("SELECT * FROM `customer` WHERE cid = ?");
	$q->bind_param('s', $cid);
	$q->execute();
	$res = $q->get_result();
			
	if (mysqli_num_rows($res) != 0) 
	{
		$row = mysqli_fetch_array($res);
		$status = $row['status'];
	}
	
	echo "$status";
	
	if($status=="0")
	{
		header('Location:msg1.php');
	}elseif($status=="1")	
	{
		header('Location:msg2.php');
	}elseif($status=="2")
	{
		header('Location:msg3.php');
	}
	
	$a="0";
	
	$q = $con->prepare("SELECT * FROM `room` where availability = ?");		
	$q->bind_param('s', $a);	
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

								<table class="table">
									<thead>
										<tr>
											<th></th>															
											<th>Room No.</th>
											<th>Description</th>
											<th>Price</th>
											<th>Availability</th>
											<?php
												if(isset($_SESSION["aid"]))
												{
													?>
														<th>Delete</th>	
													<?php
												}
												elseif(isset($_SESSION["cid"]))
												{
													?>
														<th>Request</th>	
													<?php				
												}
											?>													
										</tr>
									</thead>
									<tbody>
								<?php		
								while($row = $res->fetch_assoc())
								{
									$rid=$row['rid'];
									$roomno = $row['roomno'];									
									$availability= $row['availability'];
									$price = $row['price'];
									$sharing=$row['sharing'];
									$food = $row['food'];									
									$tv= $row['tv'];
									$wifi = $row['wifi'];
									
									?>	
									<tr>
										<th></th>	
										<td class="cart-product-description">
											<?php echo "$roomno";?>
										</td>
										<td class="cart-product-description">
											<p>
												<span>Sharing: <?php echo "$sharing";?></span>
												<span>Food: <?php echo "$food";?></span>
												<span>TV: <?php echo "$tv";?></span>
												<span>WiFi: <?php echo "$wifi";?></span>
											</p>
										</td>
										<td class="cart-product-thumbnail">
											<?php echo "$price";?>
										</td>
										<td class="cart-product-price">
											<?php 
												if($availability=="0")
													echo "Available";
												elseif($availability=="1")
													echo "Occuppied";	
											?>
										</td>
										<td class="cart-product-quantity">	
											<?php
												if(isset($_SESSION["aid"]))
												{
													if($availability=="0")
													{													
														?>
														<div class="row center">
															<a class="button small" href="delete_room.php?rid=<?php echo $rid; ?>"><span>Select</span> </a>
														</div>
														<?php
													}
													elseif($availability=="1")
													{
														?>
														<div class="row center">
															<a class="button small" href="#"><span>Select</span> </a>
														</div>
														<?php
													}
												}
												elseif(isset($_SESSION["cid"]))
												{
													if($availability=="0")
													{													
														?>
														<div class="row center">
															<a class="button small" href="register_user.php?rid=<?php echo $rid; ?>"><span>Select</span> </a>
														</div>
														<?php
													}
													elseif($availability=="1")
													{
														?>
														<div class="row center">
															<a class="button small" href="#"><span>Select</span> </a>
														</div>
														<?php
													}
												}
											?>											
										</td>
									</tr>
									<?php
								}
							}	
							else
							{
								?>
									<div class="container container-fullscreen">
										<div class="text-middle">
											<div class="row">
												<div class="col-md-6 col-md-offset-3 p-30 background-white">
													<div class="col-md-12">
													<div role="alert" class="alert alert-warning">
														<h4>Room Details!!</h4>
														<p>Sorry!! Rooms are not available...</p>
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
