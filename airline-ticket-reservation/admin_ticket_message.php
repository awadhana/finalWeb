<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Flights
		</title>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
		table,td,tr{
			margin:auto;
		}
			a{
			font-size:25px;
		}
		
		body{
				background-image: url('slide3.jpg');
				text-align:center;
				}
				</style>
	</head>
	<body>
		
		<div>
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="home_page.php"><i class="fa fa-address-book" aria-hidden="true"></i> About Us</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h3>Oops! You need to login with a Customer Account to Book Tickets</h3>
	</body>
</html>