<?php

session_start();

include('DataBase.php');
require_once('Utilitis.php');

$db = new DataBase(); 
$statusMsg = " some wrong";      
$FileSize; 

CanUpload(0);

function CanUpload($filesize)
{
    $dbbb = new DataBase(); 
	echo $_SESSION['username'];
    $returnvalue = false;
    $usersize = mysqli_fetch_array($dbbb->sqli()->query("SELECT LibrarySize FROM users WHERE Username='{$_SESSION['username']}'"))['LibrarySize'];
    $files = ($dbbb->sqli()->query("SELECT FileSize FROM `{$_SESSION['username']}files` WHERE 1 "));
    $filesOccupation= 0;
    if($files){
	    while($row = mysqli_fetch_array($files))
	    {
		$filesOccupation+= $row['FileSize'];
	    }
    }
    echo $filesOccupation;

    if(($filesOccupation+$filesize)<$usersize)
    {
-       $returnvalue = true;
    }
    else
        echo "File is too large to upload. No space left!";

    return $returnvalue;
}

if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $FileSize = basename($_FILES["image"]["size"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    if(CanUpload($FileSize)==true)
    { 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
        $FileSize = $FileSize;
        // Insert image content into database 
      
        $insert = $db->sqli()->query("INSERT INTO `{$_SESSION['username']}files`(`FileData`, `TheFileName`,`FileSize`,`UploadDate`) VALUES ('$imgContent','{$fileName}','{$FileSize}',Now())"); 
         
        if($insert){ 
            $status = 'success'; 
            //echo $insert; 
            echo "File uploaded successfully."; 
        }else{ 
            echo "File upload failed, please try again."; 
        }  
    }
    else
        echo "cant";
}
$d = new utils();
//$d->setPage("/sharer/html/Upload.php");
