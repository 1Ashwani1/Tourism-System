<?php
include("header.php");
?>

<html>
	<body>
		<div id="right">
		
		<form method="POST" action="uregistration.php">
			<table>
				<tr>
					<td colspan="4"><h1><marquee direction="right">Tourist Regitration Form</marquee></h1></td>
				</tr>
				<tr>
					<td colspan="4"><img src="images/user_add.jpg" height="170" width="250"></td>
				</tr>
					<td><label>User ID : </lable></td>
					<td><input type="text" name="ID" autocomplete="off"></td>
					<td><label>Password : </lable></td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td><label>Name : </lable></td>
					<td><input type="text" name="name" autocomplete="off"></td>
					<td><label>Mobile No. : </lable></td>
					<td><input type="text" name="mobile" autocomplete="off"></td>
				</tr>
				<tr>
					<td><label>Email ID: </lable></td>
					<td><input type="email" name="email" autocomplete="off"></td>
					<td><label>Address : </lable></td>
					<td><input type="text" name="address" autocomplete="off"></td>
				</tr>
				<tr>
					<td colspan="4"><input type="submit" name="login" value="Submit"></td>
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
				$add=$_POST['address'];

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
				if ($add=='') {
					echo "<script>alert('Enter Your Address')</script>";
				}
			else
				{
					$query="insert into user(id,password,name,mobile,email,address) values ('$Id','$pass','$name','$mobile','$email','$add')";

					if (mysql_query($query)) {
						echo "<script>alert('You are successfully registered')</script>";
						echo "<script>alert('Now you can login')</script>";
						echo "<script>window.open('user.php','_self')</script>";
					}
				}
			}
		?>
	</body>
</html>