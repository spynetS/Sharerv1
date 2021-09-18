<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('DataBase.php');
require_once('Utilitis.php');


$password1 = $_POST['password'];
$password2 = $_POST['password1'];

$db = new DataBase();
$sd = new utils();

if($password1===$password2&&isset($_POST['Username']))
{
    echo "filled";
    $EmailResult = $db->sqli()->query("SELECT * FROM  users WHERE Email ='{$_POST['Email']}'");
     $UsernameResult = $db->sqli()->query("SELECT * FROM  users WHERE Username ='{$_POST['Username']}'");
 
    if(mysqli_fetch_array($UsernameResult)['Username']!=$_POST['Username'] && mysqli_fetch_array($EmailResult)['Email']!=$_POST['Email'])
    {
    	echo "right";
        $s = $db->send($db->getConnection());
        $result = $db->sqli()->query("SELECT user FROM `users` WHERE Username='{$_POST['Username']}'");
        while($row = mysqli_fetch_array($result))
        {
            echo "\n".$row['user'];
            $db->sendSql(
                "CREATE TABLE {$row['user']}files (
                FileId int AUTO_INCREMENT,
                FileData LONGBLOB,
                TheFileName varchar(255),
                FileSize int(255),
                UploadDate datetime,
                PRIMARY KEY (FileId)
            );");
    
            $db->sqli()->query(
                "CREATE TABLE {$row['user']}friends (
                friendid int AUTO_INCREMENT,
                FriendUserid int(255),
                FriendRequest int(255),
                PRIMARY KEY (friendid)
            );");
        }
        
        $sd->setPage('/Sharer/html/index.php');    
    }
    else
    {
        echo 'allready exist bre';
        $sd->setPage('/Sharer/html/SignUp.php');    
    }
}
else
{
    echo "write something";
    //$sd->setPage('/Sharer/html/index.php');    
}

exit();
