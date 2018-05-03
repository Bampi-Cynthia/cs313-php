<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8" />
    <meta name="autor" content="Cynthia Bampi">
    <title>CS 313 | Personal Homepage</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<div class="wrapper">
        <header>
            <nav id="nav">
                <ul>
                    <li><a href="https://pacific-caverns-35170.herokuapp.com/prove02%20-%20personalpage.php">Home </a></li>
                    <li><a href="https://pacific-caverns-35170.herokuapp.com/cs.php">Page I</a></li>
                
                </ul>
            </nav>
        </header>

	<title>Personal Homepage</title>
	<img class="photographer" src="IMG_5270.JPG" alt="photographer" />
	<h1> About me</h1>
	
	<p>Hello! I am a senior at BYU-Idaho, studying Web Design and Web Development. I love photograph and design. I will be ready to graduate in december 2018.

I am a mom of three beautiful kids, and married to my best friend for 10 years. We currently live in Utah, it is a beautiful place to live, explore and photograph.

Hopefully you will like my work!</p>

<?php
date_default_timezone_set("America/Denver");
echo "The time is " . date("h:i:sa");

?>
</body>
	</html>