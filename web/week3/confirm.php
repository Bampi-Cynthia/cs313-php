<?php
	session_start();
	$_SESSION["street"] = $_POST["street"];
	$_SESSION["houseNum"] = $_POST["number"];
	$_SESSION["city"] = $_POST["city"];
	$_SESSION["state"] = $_POST["state"];
	$_SESSION["zip"] = $_POST["zipCode"];
?>

<html>
	<head>
		<title>Confirmation</title>
	</head>
	<body>
		<h2>Confirmation Page</h2>
		<?php
			echo "Thank you for your order,".$_SESSION["username"];
		?>
		<br>
		<?php
			echo "We will deliver the following items as soon as possible: ";
			$products = $_SESSION["cart"];
				foreach($products as $product){
					echo "<p>$product</p>";
				}
			echo "to your place: " . $_SESSION["street"] . ", " . $_SESSION["houseNum"] . ", " . $_SESSION["city"] . " " . $_SESSION["state"] . " " . $_SESSION["zipCode"];
		?>
		<h3>Thank you.</h3>
	</body>
</html>