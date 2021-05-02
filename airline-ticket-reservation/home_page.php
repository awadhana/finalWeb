<?php
	session_start();
?>
<html>
	<head>
		<title>
			JKASH Airlines
		</title>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
		a{
				text-align:center;
				font-size:25px;
			}
			</style>
	</head>
	
	<body>

<div class = "container">
		<div class="fling-minislide">
  <img src="slide4.jpg" alt="Slide 4" />
  <img src="slide3.jpg" alt="Slide 3" />
  <img src="slide2.jpg" alt="Slide 2" />
  <img src="slide1.jpeg" alt="Slide 1" />
</div>
		<div id  = "menuicon">
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				</li>
				<li><a href="login_page.php"><i class="fa fa-plane" aria-hidden="true"></i> Book A Flight</a></li>
				<li><a href="login_page.php"><i class="fa fa-car" aria-hidden="true"></i> Reserve A Parking Spot</a></li>
				<li>
					<?php
						if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Customer')
						{
							echo "<a href=\"customer_homepage.php\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Login</a>";
						}
						else if(isset($_SESSION['login_user'])&&$_SESSION['user_type']=='Administrator')
						{
							echo "<a href=\"admin_homepage.php\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Login</a>";
						}
						else
						{
							echo "<a href=\"login_page.php\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Login</a>";
						}
					?>
				</li>
						<li><a href="aboutus.php"><i class="fa fa-address-book" aria-hidden="true"></i> About Us</a></li>
			</ul>
		</div>
	</div>
	</body>
</html>