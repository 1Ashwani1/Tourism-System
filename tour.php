<?php
	
	include("header.php");
	
	if (isset($_POST['upload'])) {

		$target="images/".basename($_FILES['image']['name']);

		$db=mysqli_connect("localhost","root","","tourism1");

		$image=$_FILES['image']['name'];
		$text=$_POST['text'];
		$city=$_POST['city'];
		$amount=$_POST['amount'];
		$month=$_POST['month'];

		$sql="INSERT INTO tour (image, text, city, amount, month) VALUES ('$image', '$text', '$city', '$amount', '$month')";
		mysqli_query($db,$sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			echo "<script>alert('Tour is successfully added')</script>";
		}
		else{
			echo "<script>alert('Tour is not successfully added')</script>";
		}

	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Uploading</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div id="right">
	

		<form method="post" action="tour.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
			<input type="file" name="image">
		</div>
		<div>
			<textarea name="text" cols="40" rows="4" placeholder="write about tour....."></textarea>
		</div>
		<div>
			<input type="text" name="city" placeholder="City">
		</div>
		<div>
			<input type="text" name="amount" placeholder="Amount">
		</div>
		<div>
			<input type="text" name="month" placeholder="Month">
		</div>
		<div>
			<input type="submit" name="upload" value="Upload Image">
		</div>

		<?php

		$db=mysqli_connect("localhost","root","","tourism1");
		$sql="SELECT * FROM tour";
		$result=mysqli_query($db,$sql);
		while ($row=mysqli_fetch_array($result)) {
			echo "<div id='img_div'>";
			echo "<img src='images/".$row['image']."'>";
			echo "<p>".$row['text']."</p>";
			echo "</div>";
		}

	?>

	</div>
</form>
</body>
</html>