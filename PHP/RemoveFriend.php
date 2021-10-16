<?php

session_start();
include_once('User.php');
include_once('DataBase.php');
include_once('Utilitis.php');

if(isset($_POST['removefriend']))
{
    $userid = getUserId($_SESSION['username']);
   
    $frienduserid = getUserId($_POST['friendusername']);
    $db = new DataBase();
    $result = $db->sqli()->query("DELETE FROM `{$userid}friends` WHERE FriendUserid='{$frienduserid}'");
    $result = $db->sqli()->query("DELETE FROM `{$frienduserid}friends` WHERE FriendUserid='{$userid}'");
    $d = new utils();
    $d->setPage("/Sharer/html/Friends.php");

}
else
{
    $d = new utils();
    $d->setPage("/Sharer/html/Send.php?friend={$_POST['friendusername']}");

}