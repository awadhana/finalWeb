<?php
	session_start();
?>
<html>
	<head>
		<title>
			Cancel Booked Tickets
		</title>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
			a{
			font-size:25px;
		}
				body{
				background-image: url('slide1.jpeg');
				text-align:center;
				}
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 68px
			}
		</style>
	</head>
	<body>
	<div>
			<ul class = "menu">
					<li id= "one">
				
						
					<ul>
				<li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
				</ul>
			</li>
			</ul>
		</div>
		<h2>CANCEL BOOKED TICKETS</h2>
		<h3 style='padding-left: 40px;'>Your ticket has been cancelled successfully.<br><br>Your amount of &#x24; <?php echo $_SESSION['refund_amount']?> will be refunded to your bank account (Cancellation charge on 15% of your ticket amount has been deducted).</td>
		</h3>
		<br>
		
	</body>
</html>