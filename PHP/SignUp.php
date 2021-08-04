<?php

include('DataBase.php');
require_once('Utilitis.php');


$password1 = $_POST['password'];
$password2 = $_POST['password1'];
$db = new DataBase;
$sd = new utils();

if($password1===$password2&&isset($_POST['Username']))
{
    $EmailResult = $db->get("SELECT * FROM Users WHERE Email ='{$_POST['Email']}'");
    $UsernameResult = $db->get("SELECT * FROM Users WHERE Username ='{$_POST['Username']}'");
    
    if(mysqli_fetch_array($UsernameResult)['Username']!=$_POST['Username'] && mysqli_fetch_array($EmailResult)['Email']!=$_POST['Email'])
    {
        $s = $db->send($db->getConnection());
        $db->sendSql(
            "CREATE TABLE {$_POST['Username']}Files (
            FileId int AUTO_INCREMENT,
            FileData LONGBLOB,
            TheFileName varchar(255),
            FileSize int(255),
            UploadDate datetime,
            PRIMARY KEY (FileId)
        );");
        $db->sqli()->query(
            "CREATE TABLE {$_POST['Username']}friends (
            friendid int AUTO_INCREMENT,
            FriendUserid int(255),
            FriendRequest int(255),
            PRIMARY KEY (friendid)
        );");
        //$sd->setPage('/sharer/html/index.html');    
    }
    else
    {
        echo 'allready exist bre';
       // $sd->setPage('/sharer/html/index.html');    
    }
}
else
{
    //$sd->setPage('/sharer/html/index.html');    
}

exit();