<?php

session_start();


header('Location: index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check Out</title>
    </head>
    <body>
        <?php
                echo "Hello, " . $_SESSION['username']. "Please type in your address";
        ?>
        <form action='conform.php' method='post'>
                Street Name:<br>
			<input type="text" name="street" placeholder="ex)700 north 200 east"><br>
			House Number:<br>
			<input type="text" name="number" placeholder="ex)#B8"><br>
			City:<br>
			<input type="text" name="city" placeholder="Salt Lake City"><br>
			State:<br>
			<input type="text" name="state" placeholder="UT"><br>
			Zip Code:<br>
			<input type="text" name="zipCode" placeholder="84014"><br>
			
			<input type="submit" value="Order">
			<input type="submit" value="go back">
		</form>
	</body>
</html>