<?php
include("header.php");
?>
<html>
	<body>

		<div id="right">
		
		<form method="POST" action="feedback.php">
			<table>
				<tr>
					<td colspan="3"><marquee direction="left"><img src="images/feedback.jpg" height="170" width="585"></marquee></td>
				</tr>
				<tr>
					<td><label>Name</lable></td>
					<td>:</td>
					<td><input type="text" name="name" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Feedback</lable></td>
					<td>:</td>
					<td><textarea name="feedback" rows="10" cols="50"></textarea></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="login" value="Submit"></td>
				</tr>
			</table>
		</form>
		</div>

		<?php
		
			$con=mysql_connect("localhost","root","") or die(mysql_error());
			$db=mysql_select_db('tourism1',$con) or die(mysql_error());

			if(isset($_POST['login']))
			{
				$name=$_POST['name'];
				$feed=$_POST['feedback'];


				if ($name=='') {
					echo "<script>alert('Enter Your Username')</script>";
				}

				if ($feed=='') {
					echo "<script>alert('Enter Your Feedback')</script>";
				}

			else
				{
					$query="insert into feedback(name,feedback) values ('$name','$feed')";

					if (mysql_query($query)) {
						echo "<script>alert('Your feedback is submit. Thank You !!!!!! ')</script>";
						echo "<script>window.open('userlogin.php','_self')</script>";
					}
				}
			}
		?>

	</body>
</html>