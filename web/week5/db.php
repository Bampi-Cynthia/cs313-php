<?php
$url = getenv('DATABASE_URL');
$options = parse_url($url);
list($host, $port, $user, $pass, $database) = $options;
$database = ltrim($database, '/');
$dsn = "pgsql:host={$host};port={$port};dbname={$database}";
$db = new PDO($dsn, $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);