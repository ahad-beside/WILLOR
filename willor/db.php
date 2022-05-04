<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "lms1";

//$conn = new mysqli($host, $user, $pass, $dbname) or die("Connect failed: %s\n". $conn -> error);

$conn =  mysqli_connect($host, $user, $pass, $dbname);

?>