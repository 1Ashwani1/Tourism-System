<?php
include("header.php");
?>

<html>
	<body>
		<div id="right">
		
		<form method="POST" action="Booking.php">
			<table>
				<tr>
					<td colspan="4"><h1><marquee direction="left">Book Your Tour Here</marquee></h1></td>
				</tr>
					<td><label>User ID : </lable></td>
					<td><input type="text" name="ID" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Number of Persons : </lable></td>
					<td><input type="text" name="num" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Mobile : </lable></td>
					<td><input type="text" name="mobile" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Email ID : </lable></td>
					<td><input type="email" name="email" autocomplete="off"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="login" value="Book"></td>
				</tr>

			</table>
		</form>
		</div>

		<?php
			$con=mysql_connect("localhost","root","") or die(mysql_error());
			$db=mysql_select_db('tourism1',$con) or die(mysql_error());
			if(isset($_POST['login']))
			{
				$Id=$_POST['ID'];
				$number=$_POST['num'];
				$mobile=$_POST['mobile'];
				$email=$_POST['email'];

				if ($Id=='') {
					echo "<script>alert('Enter Your User ID')</script>";
				}
				if ($number=='') {
					echo "<script>alert('Enter Your Username')</script>";
				}
				if ($mobile=='') {
					echo "<script>alert('Enter Your Mobile No.')</script>";
				}
				if ($email=='') {
					echo "<script>alert('Enter Your Email ID')</script>";
				}

			else
				{
					$query="insert into booking(user_id,person,mobile,email) values ('$Id','$number','$mobile','$email')";

					if (mysql_query($query)) {
						echo "<script>alert('Your booking is successfully done')</script>";
						echo "<script>window.open('tours.php','_self')</script>";
					}
				}
			}
		?>
	</body>
</html>