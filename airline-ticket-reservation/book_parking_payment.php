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
		a{
			font-size:25px;
		}
		*{
				text-align:center;
		}
		html{
			  background: url(slide5.jpg) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
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
    			margin: 0px 357px
			}
			table,tr,td{
				margin:auto;
			}
			td{
				background-color:#929199;
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
		<h3> WE ACCEPT </h3>
		<img src="creditcard.jpg" style="width:400px;height:60px;">
		<form action="parking_payment_details_form_handler.php" method="post">
			<h2>ENTER THE PAYMENT DETAILS</h2>
			<h3 style="margin:auto"><u>Payment Summary</u></h3>
			<?php
				$parking_no=$_POST['select_parking'];
				$payment_id=rand(100000000,999999999);
				$pnr=$_SESSION['pnr'];
				$_SESSION['payment_id']=$payment_id;
				$payment_date=date('Y-m-d'); 
				$_SESSION['payment_date']=$payment_date;
				$_SESSION['select_parking'] = $parking_no;
				$days_no = $_POST['no_of_days'];

				require_once('Database Connection file/mysqli_connect.php');
				
					$query="SELECT price FROM parking_details where spot_no=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"s",$parking_no);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				
				
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				$total_ticket_price=$ticket_price *$days_no;
				
				
				$total_amount=$total_ticket_price;
				$_SESSION['total_amount']=$total_amount;

				echo "<table cellpadding=\"5\"	style='margin: auto'>";
				echo "<tr>";
				echo "<td class=\"fix_table\">Parking Fee:</td>";
				echo "<td class=\"fix_table\">&#x24; ".$total_ticket_price."</td>";
				echo "</tr>";

				echo "</table>";

				echo "<hr style='margin-right:900px; margin:auto'>";
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
	<input style='margin: auto'type="submit" value="PAY NOW" name="Pay_Now">
		
		</form>
<table cellpadding="5" style='margin: auto'>
				<tr>
					<caption>ENTER THE PAYMENT MODE:</caption>
				</tr>
				<tr>
					<td class="fix_table"><i class="fa fa-credit-card" aria-hidden="true"></i> Credit Card <input type="radio" name="payment_mode" value="credit card" checked></td>
					<td class="fix_table"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debit Card <input type="radio" name="payment_mode" value="debit card"></td>
				</tr>
			</table>
			<div class="payment_details">
			<br>
			<dl style="margin:auto">

				<table>
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
		</form>

	</div>
			<td style = "padding-left: 35px;" >
				<div style="float:right;">
		<label for = "s_code">Security Code</label>
				<input id = "s_code"class="input" type="password" name="s_code" value="" maxlength="4" size="1" required><br>
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

				<td style="display:inline-block">
				<div style="float:right">
				<label for = "e_date">Card Expiration</label>
				<br>
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
					<tr></tr>
				<tr>
					<td>
					<div >
					<label for = "sAddress">Shipping Address</label>
					<input type="text" id="s_Address" name="s_Address" required><br>
					</div>
				</td>
				</tr>
				<tr></tr>
				<tr>
					<td>
					<div >
					<label for = "bAddress">Billing Address</label>
					<input type="text" id="b_Address" name="b_Address" required><br>
					</div>
				</td>
				</tr>
				<tr></tr>
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
	<br>
	

	</body>
</html>