<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


	$message="";
	require('includes/connect.php');

	if(isset($_POST['email']) && isset($_POST['pwd']))
	{		
		$user_email = $_POST['email'];
		$user_pass = md5($_POST['pwd']);
		
		if(($user_email=='admin') && ($_POST['pwd']=='admin'))
		{
			$_SESSION["aid"] = "admin"; 	
			$message="success";
			header('Location:index.php');	
		}
		else
		{				
			$q = $con->prepare("SELECT * FROM `customer` WHERE email = ? AND password = ? ");
			$q->bind_param('ss', $user_email, $user_pass);
			$q->execute();
			$res = $q->get_result();
			
			if (mysqli_num_rows($res) != 0) 
			{
				
				$row = mysqli_fetch_array($res);
				$_SESSION["cid"] = $row['cid'];
				$_SESSION["firstname"] = $row['firstname'];
				
				$message="success";
				
				header('Location:index.php');			
			}
			else
			{
				$message="Please enter correct user crediantials!!";
			}
		}
	}
	if(isset($_SESSION["user_id"])) {
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
	<title>Login</title>

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
					
					
					
					
					
					
					
					
					
	<div class="container">
		<!--Gallery masonory -->
		<div id="isotope" class="isotope col-small-margins" data-isotope-mode="masonry" data-isotope-col="3" data-lightbox-type="gallery">
			<div class="isotope-item">
				<div class="effect social-links">
					<img src="images/Pg/image1.jpg" alt="">
					<div class="image-box-content">
						<p>
							<a href="images/Pg/image1.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>
						</p>
					</div>
				</div>
			</div>
			<div class="isotope-item">
				<div class="effect social-links">
					<img src="images/Pg/image3.jpg" alt="">
					<div class="image-box-content">
						<p>
							<a href="images/Pg/image3.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>
						</p>
					</div>
				</div>
			</div>
			<div class="isotope-item">
				<div class="effect social-links">
					<img src="images/Pg/image4.jpg" alt="">
					<div class="image-box-content">
						<p>
							<a href="images/Pg/image4.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>
						</p>
					</div>
				</div>
			</div>
			<div class="isotope-item">
				<div class="effect social-links">
					<img src="images/Pg/image5.jpg" alt="">
					<div class="image-box-content">
						<p>
							<a href="images/Pg/image5.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>
						</p>
					</div>
				</div>
			</div>
			<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image7.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image7.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image8.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image8.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image10.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image10.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image11.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image11.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image13.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image13.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image14.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image14.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image16.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image16.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image17.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image17.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image18.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image18.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
									<div class="isotope-item">
										<div class="effect social-links">
											<img src="images/Pg/image19.jpg" alt="">
											<div class="image-box-content">
												<p>
													<a href="images/Pg/image19.jpg" title="Your image title here!"><i class="fa fa-expand"></i></a>								
												</p>
											</div>
										</div>
									</div>
		</div>
	</div>		
					
					<!-- SECTION -->
					
					
					
							<section class="no-padding">
								<!--Gallery masonory -->
								<div id="isotope" class="isotope col-small-margins" data-isotope-mode="masonry" data-isotope-col="5" data-lightbox-type="gallery">
									
									
									

								</div>
								<!--END: Gallery masonory -->
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
