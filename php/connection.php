<?php
//database configuration
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "rocket_cv";
$port = 3306;

// Create connection
$mysql_conn = new mysqli($servername, $username, $password,$database,$port);

// Check connection
if ($mysql_conn->connect_error) {
  die("Connection failed: " . $mysql_conn->connect_error);
}