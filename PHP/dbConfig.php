<?php  
// Database configuration  
$json = file_get_contents("../Resorces/Private/dbConfig.json");

$data = json_decode($json, true);

$dbHost     = $data['servername'];  
$dbUsername = $data['username'];  
$dbPassword = $data['password'];
$dbName     = $data['name'];  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}