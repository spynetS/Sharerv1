<?php
  session_start();

?>

<!doctype html>
<html lang="en">
  <head >

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Library.css" />
    <link rel="stylesheet" href="../css/MainUi.css" />
    <script type="text/javascript" src="../js/SidebarNavigate.js"></script>

    <script rel="js" href="../js/sendImg.js" ></script>
    <title>Library</title>
  </head>
  <body>
    <script>
          function showMenu()
          {
            var sidebar = document.getElementById("Menu");
              if(sidebar.style.width=="0px")
              {
                sidebar.style.marginLeft = "0px";
                sidebar.style.width = "200px";
              }
              else
              {
                sidebar.style.width = "0px";
                sidebar.style.marginLeft = "-300px";
              }
          }
      </script>

    <div class="header" ></div>
    
    <div id="Menu" onmouseleave="showMenu()" class="sidebar col" >
    
    <div class="row" style="text-align: right; margin-right: 20px; margin-top: 100px; " >
      <a onmousedown="navigate(this);" id="Home" class="sidebarText" style="margin-top: 20px;" >Home</a><hr>
        <a onmousedown="navigate(this);" id="Upload" class="sidebarText" style="margin-top: 20px;" >Upload</a><hr>
        <a onmousedown="navigate(this);" id="Send" class="sidebarText" style="margin-top: 20px;" >Send</a><hr>
        <a onmousedown="navigate(this);" id="Library" class="sidebarText" style="margin-top: 20px;" >Library</a><hr>
        <a onmousedown="navigate(this);" id="Friends" class="sidebarText" style="margin-top: 20px;" >Friends</a>
        <a onmousedown="navigate(this);" id="index" class="sidebarText" style="margin-top: 20px; bottom: 120px; position: absolute; " >Logout</a><hr>
        <script>
          //Set the selected page in menu
          //document.getElementById(window.location.pathname);
          var url = window.location.pathname;
          var array = url.split('/');
    
          var lastsegment = array[array.length-1];
          var el = document.getElementById(lastsegment.split('.')[0]);
          el.style.color = "rgba(75, 144, 194, 1)";
        </script>
      </div>        
      <footer style="position: absolute;" class="footer" style="bottom: 0;">
      <img style="width:50px;height: 50px;" src="<?php
      
      include('../PHP/DataBase.php');
      $db = new DataBase();
      $result = $db->get("SELECT profilepicture FROM  users WHERE Username='"."{$_SESSION['username']}"."'");
 
      echo '../Resorces/Images/HappyPeople2.png'
      
      ?>" alt="">
      <?php  echo $_SESSION['username']?>
      </footer>
    </div>
    <img onclick="showMenu()" onmouseenter="showMenu()" class="HamburgerButton" src="../Resorces/Icons/icons8-menu-384-blue.png" alt="">

    <div style=" text-align: center; " >
      
      <div class="topbar" >
          
            <div>
              <img class="UpperLogo" src="../Resorces/Images/Logo.png" alt="">
            </div>
      
            </div>
        
        <div class="middle" >
          <table name="table" class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">Index</th>
                      <th scope="col">Image</th>
                      <th scope="col">Filename</th>
                      <th scope="col">Size (mb)</th>
                      <th scope="col">Upload date</th>

                    </tr>
                  </thead>
                  <tbody name="tablebody">
                    <?php
                      //require_once '../PHP/dbConfig.php'; 
                      require_once('../PHP/DataBase.php');
                      $dbb = new DataBase();                      
                      // Get image data from database 

                      $result = $dbb->sqli()->query("SELECT * FROM `{$_SESSION['username']}files` WHERE 1"); 

                    ?>
                      
                      <?php if($result->num_rows > 0){ ?> 
                          <div class="gallery"> 
                          
                          <?php while($row = $result->fetch_assoc()){ ?> 
                            <tr>    
                              <form action="../PHP/DownloadImg.php" method="post" >
                                <th scope="row"><input type="text" class="indexInputHidden" readonly="readonly" name="id" value="<?php echo $row['FileId'];?>" ></th>
                                <td><img name="img" style="width: 40px; height: 40px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['FileData']); ?>" /></td>
                                <td><?php echo $row['TheFileName']; ?></td>
                                <td><?php echo $row['FileSize']/1000000; ?></td>
                                <td><?php echo $row['UploadDate']; ?></td>
                                <td><input type="Submit" value="Download" class="btn btn-primary" ><button class="btn btn-primary" >Send</button><button class="btn btn-danger" >Delete</button></td>
                                <td></td>
                              </form>

                              </tr>

                                  <?php } ?> 
                          </div> 
                      <?php }else{ ?> 
                          <p class="status error">Image(s) not found...</p> 
                      <?php }
                    
                    ?>
                     
                     
                  </tbody>            
                </table>

        </div>

      </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
  
  </body>
 
</html>
