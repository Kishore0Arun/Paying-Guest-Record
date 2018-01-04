


					

					
					
					
					<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									
									<?php
										if(!isset($_SESSION)) 
										{ 
											session_start(); 
										} 
									?>
									
									<?php									
									if(!isset($_SESSION['cid']) && !isset($_SESSION['aid'])) {																			
									?>									
									<li ><a href="index.php"><i class="fa fa-home"></i></a>
									</li>									
									<li > <a href="aboutus.php">Gallery</a>																						
									<li  class="dropdown"> <a href="login.php"> Account </a>
									<ul class="dropdown-menu">
											<li > <a href="login.php">Login</a>
											<li > <a href="register.php">Register</a>
									</ul>																				
									<?php									
										}
									?>
									
									<?php									
									if(isset($_SESSION['cid'])) {										
									?>
									<li ><a href="index.php"><i class="fa fa-home"></i></a>
									</li>
									<li > <a href="aboutus.php">Gallery</a>
									<li > <a href="view_room.php">Rooms</a>
									<li class="dropdown"> <a href="customers.php">Queries</a>										
									<ul class="dropdown-menu">
										<li > <a href="user_leave.php"> Leave Note </a>
										<li > <a href="user_complaint.php"> Feedback / Complaints </a>									
									</ul>									<li class="dropdown"> <a href="#">Hello, <?php echo $_SESSION["firstname"]; ?> </a>									
									<ul class="dropdown-menu">
										<li > <a href="profile.php"> Profile </a>
										<li > <a href="logout.php"> Logout </a>									
									</ul>									
									<?php
									}
									?>	

									<?php									
									if(isset($_SESSION['aid'])) {										
									?>
									<li ><a href="index.php"><i class="fa fa-home"></i></a>
									</li>
									<li > <a href="aboutus.php">Gallery</a>
									<li class="dropdown"> <a href="#">Room</a>
									<ul class="dropdown-menu">
										<li > <a href="view_room_admin.php">Rooms</a>
										<li > <a href="add_room.php">Add Room</a>																											
									</ul>
									<li class="dropdown"> <a href="#">Customer</a>																			
									<ul class="dropdown-menu">
										<li > <a href="admin_request_reply.php">Requests</a>	
										<li > <a href="CustomerDetails.php">View Customers</a>	
										<li > <a href="admin_leave.php">Leave Note</a>	
										<li > <a href="admin_complaint.php">Feedback / Complaint</a>		
									</ul>
									<li class="dropdown"> <a href="#">Hello, <?php echo "Admin"; ?> </a>									
									<ul class="dropdown-menu">									
										<li><a href="logout.php"> Logout </a></li>									
									</ul>									
									<?php
									}
									?>		
							</nav>
						</div>
					</div>
					<!--END: NAVIGATION-->
					
					
					
				</div>
			</div>
		</header>
		<!-- END: HEADER -->
    
<!-- PAGE TITLE -->
<section id="page-title" class="page-title-parallax page-title-center text-dark" style="background-image:url(images/Pictures/Home.jpg);">
	<div class="container">
		<div class="page-title col-md-8">
			<h1>Aashirvad Paying Guest</h1>
            <span>The Most Amazing Thing is Here</span>
        </div>
       
    </div>
</section>
<!-- END: PAGE TITLE -->



