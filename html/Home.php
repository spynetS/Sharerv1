<?php
  session_start();

?>

<!doctype html>
<html lang="en">
  <head >
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Home.css" />
    <link rel="stylesheet" href="../css/MainUi.css" />
    <script type="text/javascript" src="../js/SidebarNavigate.js"></script>

    <title>Home</title>
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
        
    <!-- Sidebar  -->

    <div id="Menu" onmouseleave="showMenu()" class="sidebar col" >
      <div class="row" style="text-align: right; margin-right: 20px; margin-top: 100px; " >
      <a onmousedown="navigate(this);" id="home" class="sidebarText" style="margin-top: 20px;" >Home</a><hr>
        <a onmousedown="navigate(this);" id="Upload" class="sidebarText" style="margin-top: 20px;" >Upload</a><hr>
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
      <link rel="stylesheet" href="../css/profile.css">
        <div style="display: table" >
          <div style="display:table-cell;">
          <input type="file"><img class="profile-header-img" src="<?php
             require_once('../PHP/DataBase.php');
             $dbb = new DataBase();                      
             // Get image data from database 
 
             $result = $dbb->sqli()->query("SELECT ProfilePicture FROM `Users` WHERE Username='{$_SESSION['username']}'"); 
             //
             while($row = $result->fetch_assoc())
             {
               if(empty($row['ProfilePicture']))
               {
                echo "../Resorces/Images/UploadProfilepictureTemplate.png";
               }
               else
                 echo "data:image/jpg;charset=utf8;base64,".base64_encode($row['ProfilePicture']);
             }
            
            ?>" alt=""></img>
          </div> 
          <h3 style="display:table-cell; margin-left: 10px;" ><?php  echo $_SESSION['username']?></h2>

        </div>  
      </footer>
    </div>
    <img onclick="showMenu()" onmouseenter="showMenu()" class="HamburgerButton" src="../Resorces/Icons/icons8-menu-384-blue.png" alt="">

    <!-- Top  -->

    <div style=" text-align: center; " >
      <div class="topbar" >
          
            <div>
              <img class="UpperLogo" src="../Resorces/Images/Logo.png" alt="">
            </div>
    </div>

    <!-- From here  -->

    <div class="middle" >
      <h1>Send to your friends now!</h1>
      </div>
    </div>

    <div style=" text-align: center; height: 1000px;" ></div>
    </div>

    <!-- To here is the middle of the page -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
  
  </body>
 
</html>
