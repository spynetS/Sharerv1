<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("DataBase.php");

$db = new DataBase();
$db->construct();

$sql = 
"CREATE TABLE UsersAre (
user int AUTO_INCREMENT,
Email varchar(50),
Username varchar(20),
Password varchar(255),
LibrarySize int(11),
ProfilePicture longblob,
PRIMARY KEY (user));";

$conn = $db->getConnection();

$query = mysqli_query($conn,$sql);

echo "created";
