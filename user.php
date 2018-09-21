<?php
include("header.php");
?>

<html>
	<body>

		<div id="right">
		
		<form method="POST" action="user.php">
			<table>
				<tr>
					<td colspan="2"><h1><marquee direction="left">Tourist Login Page</marquee></h1></td>
				</tr>
				<tr>
					<td colspan="2"><img src="images/user.png" height="170" width="250"></td>
				</tr>
					<td><label>User ID</lable></td>
					<td>:</td>
					<td><input type="text" name="ID" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Name</lable></td>
					<td>:</td>
					<td><input type="text" name="name" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Password</lable></td>
					<td>:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="login" value="Login"></td>
				</tr>
				<tr>
					<td colspan="3"><a href="uregistration.php">New Registration Here</a></td>
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
					$Name=$_POST['name'];
					$pass=$_POST['password'];

					if ($Id=='') {
						echo "<script>alert('Enter User ID')</script>";

					}
					if ($Name=='') {
						echo "<script>alert('Enter User Name')</script>";
						
					}
					if ($pass=='') {
						echo "<script>alert('Enter Your Password')</script>";
					}

				else
				{
					$query="SELECT * FROM `user`  where id='$Id' AND name='$Name' AND password='$pass'";
					$run=(mysql_query($query)) or die(mysql_error());

					if (mysql_num_rows($run)>0) {
						echo "<script>window.open('userlogin.php','_self')</script>";
					}
					else
					{
						echo "<script>alert('Please Enter Valid UserID, Name And Password')</script>";
					}
				}
			}
		?>
	</body>
</html>
