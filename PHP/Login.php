<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('DataBase.php');
require_once('Utilitis.php');
$db = new DataBase();

session_start();

$ut = new utils();


$UserNameEmail = $_POST['username'];
$password = $_POST['password'];

$EmailResult = $db->get("SELECT * FROM  users WHERE Email ='{$_POST['username']}'");
$UsernameResult = $db->get("SELECT * FROM  users WHERE Username ='{$_POST['username']}'");
$password1 = "";
$username = "";
$email = "";


function login()
{
    if(isset($_POST['remember_me'])){
        setcookie("remember_me",$_POST['username'],time() + (86400 * 30),"/");
    }
    $_SESSION['username'] = $_POST['username'];
    $dont_login = true;
    $sd = new utils();
    $sd->setPage('/Sharer/html/Home.php');
}


//if user login in with email
while($row = mysqli_fetch_array($EmailResult))
{
   $password1=$row['Password'];
   $email = $row['Email'];

}
//if user loged in with username
while($row = mysqli_fetch_array($UsernameResult))
{
   $password1=$row['Password'];
   $username = $row['Username'];
}
//checks if email is correct with the password passed in
if(($email==$UserNameEmail&&password_verify($password,$password1)))
{
    login();
}
//checks if username is correct with the password passed in

else if($username==$UserNameEmail&&password_verify($password,$password1))
{
    login();
}
else{
	echo "Wrong password or username/email!";
}