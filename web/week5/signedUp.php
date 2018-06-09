<?php

// Get the username and the password out of the form

	$username = $_POST['username'];
	$password = $_POST['password'];
// hash the password

	$hash = $password_hash($password, PASSWORD_DEFAULT);

// Ensure you have a PDO connection to the database somehow
$db = new PDO($dsn, $user, $pass);

// Prepare a query to insert the data
$stmt = $db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');



// Bind values to the query

$stmt->bindValue('Admin', $username, PDO::PARAM_STR);

$stmt->bindValue('1234#', $hash, PDO::PARAM_STR);



// Execute and redirect OR display error information

try {

  $stmt->execute();

  header('Location: index.php');

} catch (PDOException $e) {

  echo $e->getMessage();

  exit;

}

	header('Location: signIn.php');

	require('connect.php');
	$db = get_db();
    
    $query = 'INSERT INTO users (user, password)
    			VALUES (:user, :password)';

    			$statement = $db->prepare($query);
    			$statement->bindValue(':username', $user);
    			$statement->bindValue(':password', $passwordHash);
    			$statement->execute();

   		


	?>