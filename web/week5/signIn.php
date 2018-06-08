<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>
<body>

<form id="signIn" method="POST" action="signedIn.php">
	<label for="user">Username</label>
	<input type="text" name="user">
	<label for="password">Password:</label>
	<input type="password" name="password">
	<input type="button" name="signIn" value="Sign In">
</form>

<p><a href="signUp.php">Sign Up</a></p>


</body>
</html>