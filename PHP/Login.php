<?php

include('DataBase.php');
include('Utilitis.php');
$db = new DataBase();

session_start();

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
echo $username;
if(($email==$UserNameEmail&&$password1==$password))
{
    echo "succses";
    $result = $db->get("SELECT * FROM Users WHERE Email ='{$_POST['username']}'");
    
    $_SESSION['username'] = mysqli_fetch_array($result)['Username'];
    $sd = new utils();
    $sd->setPage('/sharer/html/home.php');
}
else if($username==$UserNameEmail&&$password1==$password)
{
    $_SESSION['username'] = $_POST['username'];
    $sd = new utils();
    $sd->setPage('/sharer/html/home.php');
}
else
echo "some wrong";



