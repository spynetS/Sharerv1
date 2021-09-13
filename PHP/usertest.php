<?php

include_once("DataBase.php");

function getUserId($username)
{
    $dbb = new DataBase();
    $result = $dbb->sqli()->query("SELECT user FROM  `users` WHERE Username='{$username}'"); 
    //
    while($row = $result->fetch_assoc())
    {
        $userid = $row['user'];
    }
    return $userid;
}