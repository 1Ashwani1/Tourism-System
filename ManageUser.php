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
				
				$DeleteQuery="DELETE FROM user WHERE id='$_POST[hidden]'";
				mysql_query($DeleteQuery,$con);
			}


			$sql="SELECT * FROM user";
			$myData=mysql_query($sql,$con);

			echo "<div id=muser>";
			echo "<table border=1 cellspacing=0>
				<tr>
					<th colspan=6><h1><marquee direction=left>Manage Your User Here</marquee></h1></th>
				</tr>
				<tr>
					<th colspan=6><img src=images/manage_user.jpg align=center height=170 width=300></th>
				</tr>
				<tr align=center>
					<th>ID</th>
					<th>Password</th>
					<th>User Name</th>
					<th>Mobile</th>
					<th>Email ID</th>
					<th>Address</th>
				</tr>";
	
				while ($record=mysql_fetch_array($myData)){
					echo "<form action=ManageUser.php method=post>";
					echo "<tr>";
					echo "<td>" . "<input type=text name=id value=" . $record['id'] . " </td>";
					echo "<td>" . "<input type=text name=password value=" . $record['password'] ." </td>";
					echo "<td>" . "<input type=text name=name value=" . $record['name'] . " </td>";
					echo "<td>" . "<input type=text name=mobile value=" . $record['mobile'] . " </td>";
					echo "<td>" . "<input type=text name=email value=" . $record['email'] . " </td>";
					echo "<td>" . "<input type=text name=address value=" . $record['address'] . " </td>";
					echo "<td>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
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


