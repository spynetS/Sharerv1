<?php

session_start();

include('DataBase.php');
require_once('Utilitis.php');

$db = new DataBase(); 
$statusMsg = " some wrong";      
$FileSize = 10; 
if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
     
        // Insert image content into database 
        $insert = $db->sendSql("INSERT INTO `{$_SESSION['username']}files`(`FileId`, `FileData`, `TheFileName`,`FileSize`,`UploadDate`) VALUES ('[value-1]','$imgContent','{$fileName}','{$FileSize}',Now())"); 
         
        if($insert){ 
            $status = 'success'; 
            $statusMsg = "File uploaded successfully."; 
        }else{ 
            $statusMsg = "File upload failed, please try again."; 
        }  
}
$d = new utils();
$d->setPage("/sharer/html/Upload.html");
