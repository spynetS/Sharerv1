<?php

include('DataBase.php');


$password1 = $_POST['password'];
$password2 = $_POST['password1'];
$db = new DataBase;
    
if($password1===$password2)
{
    $EmailResult = $db->get("SELECT * FROM Users WHERE Email ='{$_POST['Email']}'");
    $UsernameResult = $db->get("SELECT * FROM Users WHERE Username ='{$_POST['Username']}'");
    
    if(mysqli_fetch_array($UsernameResult)['Username']!=$_POST['Username'] && mysqli_fetch_array($EmailResult)['Email']!=$_POST['Email'])
    {
        $db->send($db->getConnection());
        header("Location: '.$uri.'/Sharer/html/index.html");
    }
    else
    {
        echo 'allready exist bre';
        header("Location: '.$uri.'/Sharer/html/signup.html");
    }
}
else
{
    header("Location: '.$uri.'/sharer/html/signup.html");
}

