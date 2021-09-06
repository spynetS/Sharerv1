<?php 
// Include the database configuration file  
include('DataBase.php');

$dbb = new DataBase();
// Get image data from database 
session_start();
$result = $db->get("SELECT FileData FROM `{$_SESSION['username']}files` WHERE 1"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['FileData']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>