<?php

//When loggin in we store ip adress from device in a table with username if user want to be remeberd
//and when we go to website we check the list for this ip adress and if it is found fe log in with right username
//when login out we remove the ip and username from table

//Here we search for the ipadress
include('DataBase.php');




