<?php
include("header.php");
?>

<html>
	<body>
		<div id="right">
		<?php

			$con=mysql_connect("localhost","root","") or die(mysql_error());
			
			mysql_select_db('tourism1',$con) or die(mysql_error());

			if (isset($_POST['delete'])) {
				
				$DeleteQuery="DELETE FROM booking WHERE user_id='$_POST[hidden]'";
				mysql_query($DeleteQuery,$con);
			}


			$sql="SELECT * FROM booking";
			$myData=mysql_query($sql,$con);

			echo "<div id=muser>";
			echo "<table border=1 cellspacing=0>
				<tr>
					<th colspan=6><marquee direction=left><h1>Manage Your Booking Here</marquee></h1></th>
				</tr>
				<tr>
					<th colspan=6><img src=images/manage_bookings.png align=center height=100 width=580></th>
				</tr>
				<tr align=center>
					<th>User ID</th>
					<th>No. of Person</th>
					<th>Mobile</th>
					<th>Email ID</th>
				</tr>";
	
				while ($record=mysql_fetch_array($myData)){
					echo "<form action=viewBooking.php method=post>";
					echo "<tr>";
					echo "<td>" . "<input type=text name=id value=" . $record['user_id'] . " </td>";
					echo "<td>" . "<input type=text name=name value=" . $record['person'] . " </td>";
					echo "<td>" . "<input type=text name=mobile value=" . $record['mobile'] . " </td>";
					echo "<td>" . "<input type=text name=email value=" . $record['email'] . " </td>";
					echo "<td>" . "<input type=hidden name=hidden value=" . $record['user_id'] . " </td>";
					echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
					echo "</tr>";
					echo "</form>";
				}

			echo "</table>";
			echo "</div>";
			mysql_close();
		?>
		</div>
	</body>
</html>


