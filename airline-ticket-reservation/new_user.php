<html>
	<head>
		<title>
			Create New User Account
		</title>
		<style>
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
			form{
				background-color:gray;
				width:45%;
				margin-left:25%
			}
			legend{
			margin-left:3%;
			padding:5px 10px;
			background-color:gray;
			border:1px solid;
			color:white;
			width:30%;
			
		}
		.button{
			text-transform: uppercase;
			color:white;
			margin: 0px, 60px;
			padding:10px;
			margin-bottom:15px;
			background-color:#030337;
			border-radius: 10px;
			font-family:TimesNewRoman;
		}
		.button:hover{
			background-color: white;
			color: #030337;
}
		
		</style>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>

		
		<div>
			<ul class = "menu">
					<li id= "one">
					  
						
					<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="login_page.php"><i class="fa fa-ticket" aria-hidden="true"></i> Book Tickets</a></li>
				<li><a href="home_page.php"><i class="fa fa-plane" aria-hidden="true"></i> About Us</a></li>
				<li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
			</ul>
			</li>
		</div>
		<br><br><br><br><br><br><br>
		<form class="center_form" action="new_user_form_handler.php" method="POST" id="new_user_from">
			<fieldset>
			<legend> CREATE NEW USER ACCOUNT</legend>
			<br>
			<table cellpadding='10'>
				<tr>
					<td>Enter a valid username  </td>
					<td><input type="text" name="username" required><br><br></td>
				</tr>
				<tr>
					<td>Enter your desired password  </td>
					<td><input type="password" name="password" required><br><br></td>
				</tr>
				<tr>
					<td>Enter your email address</td>
					<td><input type="text" name="email" required><br><br></td>
				</tr>
			</table>
			
			<table cellpadding='10'>
				<tr>
					<td>Enter your name </td>
					<td><input type="text" name="name" required><br><br></td>
				</tr>
				<tr>
					<td>Enter your phone #</td>
					<td><input type="text" name="phone_no" required><br><br></td>
				</tr>
				<tr>
					<td>Enter your address</td>
					<td><input type="text" name="address" required><br><br></td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Submit"  name="Submit" class = "button">
			<br>
			<br>
			</fieldset>
		</form>
	</body>
</html>
