<?php

include_once('DataBase.php');

class User
{
    public $userid = 0;
    public $email = "";
    public $username = "";
    public function setUsername($username_)
    {
        $this->username = $username_;
    }
    public function getUserName()
    {
        
    }
    public function getUserProfilePicture()
    {
        $dbb = new DataBase();                      
        // Get image data from database 

        $result = $dbb->sqli()->query("SELECT ProfilePicture FROM  `users` WHERE Username='{$this->username}'"); 
         //
        while($row = $result->fetch_assoc())
        {
            if(empty($row['ProfilePicture']))
            {
                $img = "../Resorces/Images/UploadProfilepictureTemplate.png";
            }
            else
                $img = "data:image/jpg;charset=utf8;base64,".base64_encode($row['ProfilePicture']);
        }
        return $img;
    }

}
