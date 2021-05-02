<?php
	session_start();
?>
<html>
	<head>
		<title>
			Account Login
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
    			border-radius: 10px;
    			padding: 10px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 10px;
    			padding: 10px;
    			margin: 0px 60px
			}
		fieldset{
			margin-left:105%;
			text-align:center;
			position:relative;
			background-color:gray;
			width:600px;
			border-radius: 10px;
		}
		
		legend{
			margin-left:1%;
			padding:5px 10px;
			background-color:gray;
			border:1px solid;
			color:white;
			
		}
		.button, input.button{
			text-transform: uppercase;
			color:white;
	margin: 0px, 60px;
	padding:10px;
	margin-bottom:15px;
	background-color:#030337;
	border-radius: 10px;
			font-family:TimesNewRoman;
		}
		input.button:hover{
	background-color: white;
	color: #030337;
}

			
		</style>
		
	</head>
	<body>
		
		<div>
			<ul class = "menu">
					<li id= "one">
				
						
					<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="login_page.php"><i class="fa fa-plane" aria-hidden="true"></i> Book A Flight</a></li>
					<li><a href="login_page.php"><i class="fa fa-car" aria-hidden="true"></i> Reserve A Parking Spot</a></li>
				
				<li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
				<li><a href="aboutus.php"><i class="fa fa-address-book" aria-hidden="true"></i> About Us</a></li>
			</ul>
			</li>
			</ul>
		</div>
		<br><br><br><br><br><br><br>

		<form class="float_form" style="padding-left: 40px" action="login_handler.php" method="POST">
			<fieldset>
				<legend>Login Details</legend>
				<strong>Username:</strong><br>
				<input type="text" name="username" placeholder="Enter your username" required><br><br>
				<strong>Password:</strong><br>
				<input type="password" name="password" placeholder="Enter your password" required><br><br>
				<strong>User Type:</strong><br>
				Customer <input type='radio' name='user_type' value='Customer' checked/> Administrator <input type='radio' name='user_type' value='Administrator'/>
				<br><br>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "<br>
						<strong style='color:red'>Invalid Username/Password</strong>
						<br><br>";
					}
				?>
				<input type="submit" name="Login" value="Login" class ="button">
				<a href="new_user.php" class="button" >Don't have an account?</a>
			</fieldset>
			<br>
		</form>

	</body>
</html>
