<?php

// Database connection setup - you might want to create a separate file for this and include it here.
$host = 'localhost'; // Database host
$dbname = 'digitallibrary'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password

// Create a new database connection instance
$db = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}