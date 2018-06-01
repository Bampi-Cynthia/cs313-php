<?php


$password= $_POST['password'];
$email=$_POST['email'];
$password = password_hash ( $password , PASSWORD_BCRYPT )
echo "$password, $email";


?>
	