<?php

include("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
	<div id="right">
	<form method="post" action="yourBooking.php">
		<input type="text" name="booking" placeholder="userID">
		<input type="submit" name="search" value="Submit">

		<?php

			$con=mysql_connect("localhost","root","") or die(mysql_error());
			
			mysql_select_db('tourism1',$con) or die(mysql_error());

			if (isset($_POST['search'])) {


			$Search=$_POST['booking'];

			$query="SELECT * FROM `booking` WHERE (`user_id`) LIKE  '".$Search."'";

			$searh_result=mysql_query($query,$con);
			}

			echo "<div id=muser>";
			echo "<table border=1 cellspacing=0>
				<tr align=center>
					<th>User ID</th>
					<th>No. of Person</th>
					<th>Mobile</th>
					<th>Email ID</th>
				</tr>";
	
				while ($record=mysql_fetch_array($searh_result)){
					echo "<tr>";
					echo "<td>" . "<input type=text name=id value=" . $record['user_id'] . " </td>";
					echo "<td>" . "<input type=text name=name value=" . $record['person'] . " </td>";
					echo "<td>" . "<input type=text name=mobile value=" . $record['mobile'] . " </td>";
					echo "<td>" . "<input type=text name=email value=" . $record['email'] . " </td>";
					echo "</tr>";
					echo "</form>";
				}
		?>
	</form> 
	</div>
</body>
</html>