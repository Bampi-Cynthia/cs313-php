<?php
session_start();

	$username = $_POST['user'];
	$password = $_POST['password'];

	


	require('connect.php');
	$db = get_db();
    
    $query = 'SELECT password FROM users WHERE user = :user';

    			$statement = $db->prepare($query);
    			$statement->bindValue(':user', $user);
    			
    			$statement->execute();

   		$fetch_user = $statement->fetch();
   		

   		if (password_verify($password, $fetch_user['password'])) {
   			$_SESSION['user'] = $user;
   			header('Location: welcome.php');
   		}

   		else {
   			header('Location: signIn.php');
   		}

   
	?>