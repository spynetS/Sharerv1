<?php
session_start();

include_once("DataBase.php");
require_once("User.php");

if(isset($_GET['filename']))
{
    echo "abow";
    $filename = $_GET['filename'];

    $db = new DataBase();
    $userid = getUserId($_SESSION['username']);
    $result = $db->sqli()->query("SELECT * FROM `{$userid}files` WHERE TheFileName='{$filename}'");
    while($row = $result->fetch_assoc())
    {
        $imgContent = addslashes(($row['FileData'])); 
        echo "INSERT INTO `{$userid}files`(`FileData`, `TheFileName`, `FileSize`, `UploadDate`) VALUES ('$imgContent','{$row['TheFileName']}','{$row['FileSize']}','{$row['UploadDate']}')";
        $result1 = $db->sqli()->query("INSERT INTO `{$userid}files`(`FileData`, `TheFileName`, `FileSize`, `UploadDate`) VALUES ('{$row['FileData']}','{$row['TheFileName']}','{$row['FileSize']}','{$row['UploadDate']}')");
    }

}
else{
echo "knas";
}