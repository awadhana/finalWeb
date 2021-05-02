<?php
	session_start();
?>
<html>
	<head>
		<title>
			About Us 
		</title>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
			a{
			font-size:25px;
		}
			body{
				background-image: url('slide1.jpeg');
			}
			*{
				text-align:center;
			}
			
		</style>
		
	</head>
	<body>

		<div>
			<ul >
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
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
			</li>
			<ul>
		</div>
	
		<br>
		<h1> About Us </h1>
		   <p><b>Hana Awad </b>- Project Lead. Ensured project worked cohesively and all game functionality was present.<br>
      Worked exclusively on buttons relating to the generation as well as bringing cells to life/death with a mouse click</p>
      <p><b>Adhil Habib-</b> Back end engineer. Collaborated closely with Hana to ensure project meet requirements.<br>
        Worked exclusively on all patterns, the reset button and dynamic grid sizing.
        </p>
      <p><b>Suzanne Alexander</b>-Front end engineer oversaw the front-end functionality of the landing page specifically.<br>
        Pair-programmed with Hana to ensure back-end functionality was present.
      <br> Worked closely with Kevin and John to ensure project flow was present between pages</p>
        <p><b>Kevin Nguyen</b>- Front end engineer, working closely with Suzanne to ensure project success. <br>
        Project deck designer and UML diagram creator also pair-programming with Hana to ensure back-end<br>
      functionality was present.</p>
      <p><b>John Arthur</b>- Front end enginner. Worked on log in page, authentification system and front-end <br>
      design alongside Suzanne and Kevin.</p>

      <p><b> Description: </b>Conway's Game of Life with extensive functionality.</p>

      <p> <b>Methodology:</b> We used the Agile Scrum framework. Thanks to it's flexible design and <br>
      the ease in implementation with continuous reiteration and reevealuation of priorities, the <br>
    the team was able to seamlessly coordinate between each other with clear and distinct roles. The <br>
    framework allowed us to implement sprints where we continuously gave input on project status, issues and, <br>
  most importantly, successes. Thanks to this Methodology, we were able to complete the entirety of our project<br>
within half the alloted time for project submission.</p>

		
	
	</body>
</html>