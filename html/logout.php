<?php
include_once("../PHP/Utilitis.php");
//echo $_COOKIE['remember_me'];
setcookie('remember_me', "", time() - 3600,"/");
$sd = new utils();
$sd->setPage('/Sharer/html/index.php');