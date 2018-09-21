<?php

include("header.php");

if (isset($_POST['search'])) {

	$valueToSearch=$_POST['valueToSearch'];
	$query="SELECT * FROM `tour` WHERE CONCAT(`city`, `amount`, `month`) LIKE  '%".$valueToSearch."%'";
	$searh_result=filterTable($query);

}
else{

	$query="SELECT * FROM `tour`";
	$searh_result=filterTable($query);
}

function filterTable($query)
{

	$connect=mysqli_connect("localhost", "root", "", "tourism1");
	$filter_resutlt=mysqli_query($connect, $query);
	return $filter_resutlt;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div id="right">
	<form method="post" action="search.php">
		<input type="text" name="valueToSearch" placeholder="Your Amount/City/Month" autocomplete="off">
		<input type="submit" name="search" value="Search">

		<?php

			while ($row=mysqli_fetch_array($searh_result)) {
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