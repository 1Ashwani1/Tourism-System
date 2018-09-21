<?php
include("header.php");
?>
<html>
	<body>

		<div id="right">
		
		<form method="POST" action="admin.php">
			<table>
				<tr>
					<td colspan="3"><h1><marquee direction="left">Admin Login Page</marquee></h1></td>
				</tr>
				<tr>
					<td colspan="3"><img src="images/admin.png" height="170" width="250"></td>
				</tr>
				<tr>
					<td><label>Admin ID</lable></td>
					<td>:</td>
					<td><input type="text" name="aid" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Name</lable></td>
					<td>:</td>
					<td><input type="text" name="name" autocomplete="off" t></td>
				</tr>
				<tr>
					<td><label>Password</lable></td>
					<td>:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="login" value="Let Me In"></td>
				</tr>
			</table>
		</form>
		</div>
			<?php
				$con=mysql_connect("localhost","root","") or die(mysql_error());
				$db=mysql_select_db('tourism1',$con) or die(mysql_error());
				if(isset($_POST['login']))
				{
					$Id=$_POST['aid'];
					$Name=$_POST['name'];
					$pass=$_POST['password'];

					if ($Id=='') {
						echo "<script>alert('Enter Admin ID')</script>";

					}
					if ($Name=='') {
						echo "<script>alert('Enter Admin Name')</script>";
						
					}
					if ($pass=='') {
						echo "<script>alert('Enter Your Password')</script>";
					}

				else
				{
					$query="SELECT * FROM `admin`  where id='$Id' AND admin_name='$Name' AND password='$pass'";
					$run=(mysql_query($query)) or die(mysql_error());

					if (mysql_num_rows($run)>0) {
						echo "<script>window.open('adminlogin.php','_self')</script>";
					}
					else
					{
						echo "<script>alert('Please Enter Valid AdminID, Name And Password')</script>";
					}
				}
				}
			?>
	</body>
</html>
