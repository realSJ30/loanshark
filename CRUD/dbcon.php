<?php
//opens new connection to the database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample_db";

// Create connection
$dbconn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
} 
//echo connected_na_ko;
?>