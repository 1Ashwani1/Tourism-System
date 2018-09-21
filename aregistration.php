<?php
include("header.php");
?>

<html>
	<body>
		<div id="right">
		
		<form method="POST" action="aregistration.php">
			<table>
				<tr>
					<td colspan="3"><h1><marquee direction="right">Admin Regitration Form</marquee></h1></td>
				</tr>
				<tr>
					<td colspan="3"><img src="images/admin_add.png" height="170" width="250"></h1></td>
				</tr>
					<td><label>Admin ID</lable></td>
					<td>:</td>
					<td><input type="text" name="ID" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Password</lable></td>
					<td>:</td>
					<td><input type="password" name="password" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Name</lable></td>
					<td>:</td>
					<td><input type="text" name="name" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Mobile No.</lable></td>
					<td>:</td>
					<td><input type="text" name="mobile" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Email ID</lable></td>
					<td>:</td>
					<td><input type="email" name="email" autocomplete="off"></td>
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
				$Id=$_POST['ID'];
				$pass=$_POST['password'];
				$name=$_POST['name'];
				$mobile=$_POST['mobile'];
				$email=$_POST['email'];

				if ($Id=='') {
					echo "<script>alert('Enter Your User ID')</script>";
				}
				if ($pass=='') {
					echo "<script>alert('Enter Your Password')</script>";
				}
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
				{
 					 echo "<script>alert('Please Enter Valid Name !!!!')</script>"; 
 					 exit;
				} 
				 if(array_key_exists('mobile', $_POST))
  				{
   					if(!preg_match('/^[0-9]{10}$/', $_POST['mobile']))
    				{
      					echo "<script>alert('Please Enter Valid Mobile Number !!!!')</script>";
      					exit;
    				}
  				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				    echo "Invalid email format"; 
				    exit;
				}

				else
				{
					$query="insert into admin(id,password,admin_name,mobile,email) values ('$Id','$pass','$name','$mobile','$email')";

					if (mysql_query($query)) {
						echo "<script>alert('New Admin successfully registered')</script>";
						echo "<script>window.open('adminlogin.php','_self')</script>";
					}
				}
			}
		?>
	</body>
</html>