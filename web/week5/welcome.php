<?php

session_start();
if (!isset($_SESSION['user'])) {
	header('Location: signIn.php');
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Our Log In Page</title>
</head>
<body>

	<p>Welcome <?php echo htmlspecialchars($_SESSION['user']) ?></p>

</body>
</html>