<?php

class DataBase
{
    public $dbServername = "";
    public $dbUsername = "";
    public $dbPassword = "";
    public $dbName = "test";

    public function send($conn)
    {
        if($conn)
        echo 'connection successfully to database';

        $sql = "insert into users (Email,Username,Password) values ('{$_POST['Email']}','{$_POST['Username']}','{$_POST['password']}')";

        $query = mysqli_query($conn,$sql);

        if($query)
            echo 'data inserted succesfully';
    }
    public function getConnection()
    {
        $conn = mysqli_connect($this->dbServerName,$this->dbUsername,$this->dbPassword,$this->dbName);
        return $conn;
    }
    public function get($sql)
    {
        $result = mysqli_query($this->getConnection(),$sql);
        return $result;
    }


}
