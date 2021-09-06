<?php

class utils
{

    public function setPage($page)
    {
        echo "<script>window.location.href="."'"."{$page}"."'".";</script>";
    }
    public function getHashedPas($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    public function readLine(int $linenumber)
    {
        $myFile = "../Resorces/Private/dbConfig.txt";
        $lines = file($myFile);//file in to an array
        
        return explode(",",$lines[0])[$linenumber];
    }
}