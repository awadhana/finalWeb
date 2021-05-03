<?php
	session_start();
?>
<html>
	<head>
		<title>
			Enter Payment Details
		</title>
			<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
		body{
			background-image:url('slide3.jpg');
		}
		*{
			text-align:center;
		}
		a{
			font-size:25px;
		}
			input {
				display: block;
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 357px
			}
			input[type=text]{
			  background-color: white;
			}

			select{
				display: block;
			}
			table,tr,td{
				margin:auto;
			}
		</style>
	</head>
	<body>
		<div>
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h3> WE ACCEPT: </h3>
		<img src="creditcard.jpg" style="width:400px;height:60px;">
		<form action="payment_details_form_handler.php" method="post">
			<h2>ENTER THE PAYMENT DETAILS</h2>
			<h3 style="margin-left: 30px"><u>PAYMENT SUMMARY</u></h3>
			<?php
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$no_of_pass=$_SESSION['no_of_pass'];
				//$total_no_of_meals=$_SESSION['total_no_of_meals'];
				$payment_id=rand(100000000,999999999);
				$pnr=$_SESSION['pnr'];
				$_SESSION['payment_id']=$payment_id;
				$payment_date=date('Y-m-d');
				$_SESSION['payment_date']=$payment_date;


				require_once('Database Connection file/mysqli_connect.php');
				if($_SESSION['class']=='economy')
				{
					$query="SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				else if($_SESSION['class']=='business')
				{
					$query="SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				$total_ticket_price=$no_of_pass*$ticket_price;
				//$total_meal_price=250*$total_no_of_meals;
				// if($_SESSION['insurance']=='yes')
				// {
				// 	$total_insurance_fee=100*$no_of_pass;
				// }
				// else
				// {
				// 	$total_insurance_fee=0;
				// }
				// if($_SESSION['priority_checkin']=='yes')
				// {
				// 	$total_priority_checkin_fee=200*$no_of_pass;
				// }
				// else
				// {
				// 	$total_priority_checkin_fee=0;
				// }
				// if($_SESSION['lounge_access']=='yes')
				// {
				// 	$total_lounge_access_fee=300*$no_of_pass;
				// }
				// else
				// {
				// 	$total_lounge_access_fee=0;
				// }
				$total_discount=0;
				$total_amount=$total_ticket_price;
				$_SESSION['total_amount']=$total_amount;

				echo "<table cellpadding=\"5\"	style='margin: auto'>";
				echo "<tr>";
				echo "<td class=\"fix_table\">Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td>";
				echo "<td class=\"fix_table\">&#x24; ".$total_ticket_price."</td>";
				echo "</tr>";
			
				// echo "<tr>";
				// echo "<td class=\"fix_table\">Meal Combo Charges:</td>";
				// echo "<td class=\"fix_table\">&#x20b9; ".$total_meal_price."</td>";
				// echo "</tr>";
				//
				// echo "<tr>";
				// echo "<td class=\"fix_table\">Priority Checkin Fees:</td>";
				// echo "<td class=\"fix_table\">&#x20b9; ".$total_priority_checkin_fee."</td>";
				// echo "</tr>";
				//
				// echo "<tr>";
				// echo "<td class=\"fix_table\">Lounge Access Fees:</td>";
				// echo "<td class=\"fix_table\">&#x20b9; ".$total_lounge_access_fee."</td>";
				// echo "</tr>";
				//
				// echo "<tr>";
				// echo "<td class=\"fix_table\">Insurance Fees:</td>";
				// echo "<td class=\"fix_table\">&#x20b9; ".$total_insurance_fee."</td>";
				// echo "</tr>";
				//
				// echo "<tr>";
				// echo "<td class=\"fix_table\">Discount:</td>";
				// echo "<td class=\"fix_table\">&#x20b9; ".$total_discount."</td>";
				// echo "</tr>";

				echo "</table>";

				echo "<hr style='margin:auto'>";
				echo "<table cellpadding=\"5\" style='margin: auto'>";
				echo "<tr>";
				echo "<td class=\"fix_table\"><strong>Total:</strong></td>";
				echo "<td class=\"fix_table\">&#x24; ".$total_amount."</td>";
				echo "</tr>";
				echo "</table>";
				echo "<hr style='margin-right:900px; margin:auto'>";
				echo "<br>";
				echo "<p style=\"margin-left:50px\">Your Payment/Transaction ID is <strong>".$payment_id.".</strong> Please note it down for future reference.</p>";
				echo "<br>";
			?>
			<table cellpadding="5" style='margin: auto'>
				<tr>
					<td class="fix_table"><strong>ENTER THE PAYMENT MODE:</strong></td>
				</tr>
				<tr>
					<td class="fix_table"><i class="fa fa-credit-card" aria-hidden="true"></i> Credit Card <input type="radio" name="payment_mode" value="credit card" checked></td>
					<td class="fix_table"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debit Card <input type="radio" name="payment_mode" value="debit card"></td>
					<!-- <td class="fix_table"><i class="fa fa-desktop" aria-hidden="true"></i> Net Banking <input type="radio" name="payment_mode" value="net banking"></td> -->
				</tr>
			</table>
			<div class="payment_details">
			<br>
			<dl style="margin:auto">

				<table>
				<!-- <div style="float:left;">
				<label for = "UName">Name</label>
				<td><input type="text" id="UName" name="u_name" required></td>
 				</div> -->
				<tr>
					<td>
						<div style="float:left;">
				<label for = "card_number">Card Number</label>
						<input id = "card_number"class="input" type="text" name="card_number" value="" required><br>
				</div>
			</td>
		<td>	<div class="well" >
			Please, type some card number above.
		</div>
		</td>
		<br>
		<!-- <div class = "hidden">
			<input type="text" id="cardType" name="card_type" value""><br>
		</div> -->
		
		</form>

	</div>
			<td style = "padding-left: 35px;" >
				<div style="float:right;">
		<label for = "s_code">Security Code</label>
				<input id = "s_code"class="input" type="text" name="s_code" value="" maxlength="4" size="1" required><br>
		</div>

			</td>
				</tr>

				<tr>
					<td>
					<div style="float:left;">
					<label for = "UName">Name on Card</label>
					<input type="text" id="UName" name="u_name" required><br>
	 				</div>

				</td>

				<td style="padding-left: 35px">
				<div style="float:right">
				<label for = "e_date">Card Expiration</label>
				<select name="month" id="ExpDateM" value = "MM" >
	 			<option value="01">01</option>
	 			<option value="02">02</option>
	 			<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
			 	<option value="12">12</option>
 </select>
 <br>
	<select name="Year" id="ExpDateY" value = "YY" >
	 <option value="21">2021</option>
	 <option value="02">2022</option>
	 <option value="03">2023</option>
	 <option value="04">2024</option>
	 <option value="05">2025</option>
	 <option value="06">2026</option>
	 <option value="07">2027</option>
	 <option value="08">2028</option>
	 <option value="09">2029</option>
	 <option value="10">2030</option>
	 <option value="11">2031</option>
	 <option value="12">2032</option>
</select>
				</div>

			</td>

				</tr>

				<tr>
					<td>
					<div >
					<label for = "sAddress">Shipping Address</label>
					<input type="text" id="s_Address" name="s_Address" required><br>
					</div>
				</td>
				</tr>
				<tr>
					<td>
					<div >
					<label for = "bAddress">Billing Address</label>
					<input type="text" id="b_Address" name="b_Address" required><br>
					</div>
				</td>
				</tr>
				<tr>
					<td>
					<div >
					<label for = "pNumber">Phone Number</label>
					<input type="text" id="pNumber" name="p_Number" maxlength="11" required><br>
					</div>
				</td>
				</tr>

			</table>
		

				<!-- <div class="form-group">
					<input class="input" type="text" placeholder="Type your card number">
				</div> -->



	<script src="dist/card-type.js"></script>
	<script>
		var input = document.querySelector('.input')
		var result = document.querySelector('.well')
		// var hidden = document.getElementById('hidden')

		input.addEventListener('change', onInputChange)
		input.addEventListener('input', onInputChange)

		function onInputChange (e) {
			var cards = CardType.cardType(e.target.value)
			result.innerHTML = JSON.stringify(cards)
			// hidden.value = JSON.stringify(cards)
		}
	</script>
	<input style='margin: auto'type="submit" value="PAY NOW" name="Pay_Now">

	</body>
</html>