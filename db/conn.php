<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connect = mysqli_connect("localhost", "ipantry", "ipantry", "ipantry");
//die("Unable to connect to MySQL: " . mysqli_error());
if (mysqli_connect_errno())
    die("Failed to connect to MySQL: " . mysqli_connect_error());
