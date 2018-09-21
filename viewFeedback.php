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
				
				$DeleteQuery="DELETE FROM feedback WHERE name='$_POST[hidden]'";
				mysql_query($DeleteQuery,$con);
			}


			$sql="SELECT * FROM feedback";
			$myData=mysql_query($sql,$con);

			echo "<div id=feedback>";
			echo "<table border=1 cellspacing=0>
				<tr>
					<th colspan=6><marquee direction=left><h1>Manage Your Feedback Here</marquee></h1></th>
				</tr>
				<tr>
					<th colspan=6><img src=images/view_feedback.jpg align=center height=100 width=200></th>
				</tr>
				<tr>
					<th>User ID</th>
					<th>User Name</th>
					<th>Feedback</th>
				</tr>";
	
				while ($record=mysql_fetch_array($myData)){
					echo "<form action=viewFeedback.php method=post>";
					echo "<tr>";
					echo "<td>" . "<input type=text name=name value=" . $record['name'] . " </td>";
					echo  "<td>"."<p>" . $record['feedback'] . " </p>"."</td>";
					echo "<td>" . "<input type=hidden name=hidden value=" . $record['name'] . " </td>";
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
