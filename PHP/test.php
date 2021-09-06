<?php
    
    	include_once('Utilitis.php');
    	
    	$json = file_get_contents("../Resorces/Private/dbConfig.json");
    	$data = json_decode($json, true);

        $dbServername = $data['servername'];
        $dbUsername = $data['username'];
        $dbPassword = $data['password'];
        $dbName = $data['name'];
    
    $sqli = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);
    $utils = new utils();
    echo $utils->getHashedPas("asd");
    $sqli->query(
        "CREATE TABLE {$_POST['Username']}1friends (
        friendid int AUTO_INCREMENT,
        FriendUserid int(255),
        FriendRequest int(255),
        PRIMARY KEY (friendid)
    );");
