  
<?php
	session_start();
?>
<html>
	<head>
		<title>Submit Payment Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Pay_Now']))
			{
				$no_of_pass=$_SESSION['no_of_pass'];
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$pnr=$_SESSION['pnr'];
				$payment_id=$_SESSION['payment_id'];
				$total_amount=$_SESSION['total_amount'];
				$payment_date=$_SESSION['payment_date'];
				$payment_mode=$_POST['payment_mode'];
				$card_number=$_POST['card_number'];
				$card_name=$_POST['u_name'];
				$billing_address=$_POST['b_Address'];
				$shipping_address=$_POST['s_Address'];
				$phone_number=$_POST['p_Number'];
				$security_code=$_POST['s_code'];
				$Exp_month=$_POST['month'];
				$Exp_year=$_POST['Year'];
				// $card_type=$_POST['card_type'];
				require_once('Database Connection file/mysqli_connect.php');
				if($class=='economy')
				{
					$query="UPDATE Flight_Details SET seats_economy=seats_economy-? WHERE flight_no=? AND departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					$affected_rows_1=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_1.'<br>';
					mysqli_stmt_close($stmt);
				}
				else if($class=='business')
				{
					$query="UPDATE Flight_Details SET seats_business=seats_business-? WHERE flight_no=? AND departure_date=?";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					$affected_rows_1=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_1.'<br>';
					mysqli_stmt_close($stmt);
				}
				// mysqli_stmt_bind_result($stmt,$cnt);
				// mysqli_stmt_fetch($stmt);
				// echo $cnt;
				/*
				$response=@mysqli_query($dbc,$query);
				*/
				if($affected_rows_1==1)
				{
					echo "Successfully Updated Seats<br>";

					$query="INSERT INTO Payment_Details (payment_id,pnr,payment_date,payment_amount,payment_mode,card_name,card_number,billing_address,phone_number, shipping_address, security_code) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"sssissssisi",$payment_id,$pnr,$payment_date,$total_amount,$payment_mode,$card_name, $card_number, $billing_address,$phone_number,$shipping_address, $security_code);
					mysqli_stmt_execute($stmt);
					$affected_rows_2=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_2.'<br>';
					mysqli_stmt_close($stmt);
					if($affected_rows_2==1)
					{
						echo "Successfully Updated Payment Details<br>";
						header('location:ticket_success.php');
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
					}
				}
				else
				{
					echo "Submit Error";
					echo mysqli_error();
				}
				mysqli_close($dbc);
			}
			else
			{
				echo "Payment request not received";
			}
		?>
	</body>
</html>