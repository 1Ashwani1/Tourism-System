<?php

include("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div id="right">
	<form>

		<?php

			$db=mysqli_connect("localhost","root","","tourism1");
			$sql="SELECT * FROM `tour` WHERE CONCAT(`month`)LIKE '%February%' ";
			$result=mysqli_query($db,$sql);

			while ($row=mysqli_fetch_array($result)) {
				echo "<div id='img_div'>";
				echo "<img src='images/".$row['image']."'>";
				echo "<p>".$row['text']."</p>";
				echo "</div>";
				echo "<button type=button onclick=location.href='Booking.php'> Book Now</button>";
			}
		?>
	</form> 
	</div>
</body>
</html>