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
         function changeName(name)
         {
             document.getElementById("FriendChooser").value =name;
         }
         
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
      <div id="Menu" class="sidebar col" >
         <div class="row" style="text-align: right; margin-right: 20px; margin-top: 100px; " >
            <a onmousedown="navigate(this);" id="Home" class="sidebarText" style="margin-top: 20px;" >Home</a>
            <hr>
            <a onmousedown="navigate(this);" id="Upload" class="sidebarText" style="margin-top: 20px;" >Upload</a>
            <hr>
            <a onmousedown="navigate(this);" id="Library" class="sidebarText" style="margin-top: 20px;" >Library</a>
            <hr>
            <a onmousedown="navigate(this);" id="Friends" class="sidebarText" style="margin-top: 20px;" >Friends</a>
            <a onmousedown="navigate(this);" id="index" class="sidebarText" style="margin-top: 20px; bottom: 120px; position: absolute; " >Logout</a>
            <hr>
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
            <img style="width:50px;height: 50px;" src="../Resorces/Images/HappyPeople2.png" alt="">
         </footer>
      </div>
      <img onclick="showMenu()" class="HamburgerButton" src="../Resorces/Icons/icons8-menu-384-blue.png" alt="">
      <div style=" text-align: center; " >
         <div class="topbar">
            <div>
               <img class="UpperLogo" src="../Resorces/Images/Logo.png" alt="">
            </div>
         </div>
         <div class="middle" >
            <form action="../PHP/SendFiles.php" enctype="multipart/form-data" method="POST">
               <div class="dropdown" style="margin: 10px;" >
                  <h2>Send to</h2>
                  <button value="SelectFriend" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <input id="FriendChooser" name="chooser" type="text" style="background: rgb(0,0,0,0); border:none; color: white;" value="Select friend" readonly></button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <?php
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);
                        include_once('../PHP/DataBase.php');
                        require_once('../PHP/User.php');
                        
                        $dB = new DataBase();   
                        $userfriendsresult = $dB->sqli()->query("SELECT * FROM `{$_SESSION['username']}friends` WHERE FriendRequest=0");
                        while($row = $userfriendsresult->fetch_assoc())
                        {
                          $result = $dB->sqli()->query("SELECT * FROM  `users` WHERE user={$row['FriendUserid']}");
                        
                          while($user = $result->fetch_assoc())
                          {
                            $Myuser = new User();
                            $Myuser->setUsername($user['Username']);
                            echo '<li><a onclick="changeName(this.innerHTML);"  class="dropdown-item" href="#">';
                            echo $user['Username'];
                            echo '</a></li>';
                            echo "\n";          
                            if(array_key_exists($user['Username'], $_POST))
                            {
                              echo '<script>',
                              'changeName("'.$user['Username'].'");',
                              '</script>'
                              ;
                            }
                          }
                        }
                        
                        ?>
                  </ul>
               </div>
               <h2>Select file</h2>
               <input type="file" name="image" class="btn-primary" >
               <div style="height: 10px;" ></div>
               <input style="margin: 10px;"  type="submit" name="submit" class="btn btn-primary" value="Send">
            </form>
         </div>
      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
   </body>
</html>