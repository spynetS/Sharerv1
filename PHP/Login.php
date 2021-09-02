<?php

include('DataBase.php');
require_once('Utilitis.php');
$db = new DataBase();

session_start();

$ut = new utils();

$UserNameEmail = $_POST['username'];
$password = $_POST['password'];

$EmailResult = $db->get("SELECT * FROM Users WHERE Email ='{$_POST['username']}'");
$UsernameResult = $db->get("SELECT * FROM Users WHERE Username ='{$_POST['username']}'");
$password1 = "";
$username = "";
$email = "";
while($row = mysqli_fetch_array($EmailResult))
{
   $password1=$row['Password'];
   $email = $row['Email'];

}
while($row = mysqli_fetch_array($UsernameResult))
{
   $password1=$row['Password'];
   $username = $row['Username'];
}
if(($email==$UserNameEmail&&password_verify($password,$password1)))
{
    $result = $db->get("SELECT * FROM Users WHERE Email ='{$_POST['username']}'");
    
    $_SESSION['username'] = mysqli_fetch_array($result)['Username'];
    rememberme($result);
    $ut->setPage('/sharer/html/home.php');
    //Store the ipadress in table
   


}
else if($username==$UserNameEmail&&password_verify($password,$password1))
{
    $result = $db->get("SELECT * FROM Users WHERE Username ='{$_POST['username']}'");
    $_SESSION['username'] = $_POST['username'];
    rememberme($result);
    $sd = new utils();
    $sd->setPage('/sharer/html/home.php');
}
else
echo "some wrong";

function rememberme($result)
{
    //To do check if the user already is rememberd first

    //this is the code that saves the information to the table!
    $db = new DataBase();
    $connected_device = $_SERVER['REMOTE_ADDR'];
    $userid = mysqli_fetch_array($result)['user'];
    $d = $db->sqli()->query("INSERT INTO `autologin`(`Ip-adress`, `userid`) VALUES ('{$connected_device}','{$userid}')");
}

