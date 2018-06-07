<<<<<<< HEAD
<?php
$url = getenv('DATABASE_URL');
$options = parse_url($url);
$host = $options['host'];
$port = $options['port'];
$user = $options['user'];
$pass = $options['pass'];
$database = ltrim($options['path'], '/');
$dsn = "pgsql:host={$host};port={$port};dbname={$database}";
$db = new PDO($dsn, $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======
<?php
$url = getenv('DATABASE_URL');
$options = parse_url($url);
$host = $options['host'];
$port = $options['port'];
$user = $options['user'];
$pass = $options['pass'];
$database = ltrim($options['path'], '/');
$dsn = "pgsql:host={$host};port={$port};dbname={$database}";
$db = new PDO($dsn, $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> 49a80b2f2adae315ac4d08a66776ba3830fb6db6
