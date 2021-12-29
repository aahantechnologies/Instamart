<?php
// Database configuration
$dbHost     = "aahantechnologies.com";
$dbUsername = "raadh5xq";
$dbPassword = "Random1234!@#$$";
$dbName     = "raadh5xq_ramukimandi";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
