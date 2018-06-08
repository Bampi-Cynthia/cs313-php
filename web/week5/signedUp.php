<?php
	$username = $_POST['user'];
	$password = $_POST['password'];

	$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	header('Location: signIn.php');

	require('connect.php');
	$db = get_db();
    
    $query = 'INSERT INTO users (user, password)
    			VALUES (:user, :password)';

    			$statement = $db->prepare($query);
    			$statement->bindValue(':user', $user);
    			$statement->bindValue(':password', $passwordHash);
    			$statement->execute();

   		


	?>