<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);
include('Utilitis.php');

class DataBase
{
    public $dbServername = "";
    public $dbUsername = "";
    public $dbPassword = "";
    public $dbName = "";
    public $ut;

    function __construct() {
       
        $this->construct();
       // echo $dbServername.$dbUsername.$dbPassword.$dbName;
    }   
    public function construct()
    {
        $json = file_get_contents("../Resorces/Private/dbConfig.json");

        $data = json_decode($json, true);

        $this->dbServername = $data['servername'];
        $this->dbUsername = $data['username'];
        $this->dbPassword = $data['password'];
        $this->dbName = $data['name'];
    }
    public function sqli()
    {
        $sqli = new mysqli($this->dbServername, $this->dbUsername, $this->dbPassword, $this->dbName);  
        if ($sqli->connect_error) {  
            die("Connection failed: " . $sqli->connect_error);  
        }
        return $sqli;
    }

    public function send($conn)
    {
        
        if($conn)
        echo 'connection successfully to database';
        $librarysize = 100000000;
        $sql = "insert into users (Email,Username,Password,LibrarySize,ProfilePicture) values ('{$_POST['Email']}','{$_POST['Username']}','".password_hash($_POST['password'], PASSWORD_DEFAULT)."','{$librarysize}','')";

        $query = mysqli_query($conn,$sql);

        if($query)
        return 'data inserted succesfully';
    }
    public function sendSql($sql)
    {
        $result = mysqli_query($this->getConnection(),$sql);
        return true;
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

    public function getArray($sql)
    {
        $result = mysqli_query($this->getConnection(),$sql);
        return mysqli_fetch_array($result);
    }
}
