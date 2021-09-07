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
      <title>Friends</title>
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
               include_once('../PHP/DataBase.php');
               $db = new DataBase();
               $result = $db->get("SELECT profilepicture FROM  users WHERE Username='"."{$_SESSION['username']}"."'");
                
               echo '../Resorces/Images/HappyPeople2.png'
               
               ?>" alt="">
            <?php  echo $_SESSION['username']?>
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
      </div>
      <!-- From here  -->
      <div style="text-align: center;"  >
         <div class="middle  " style="width: 50%; height: 80px; display:inline-block;margin-top: 20px;" class="btn btn-primary" >
            <nav class="nav nav-pills nav-fill">
               <a class="nav-link" href="Friends.php">Friends</a>
               <a class="nav-link active" aria-current="page" href="#">Add Friend</a>
               <a class="nav-link" href="FriendRequest.php">Requests</a>
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Blocked</a>
            </nav>
         </div>
         <div class="middle" style="width: 50%; display:inline-block;margin-top: 20px;" class="btn btn-primary" >
            <div>
               <h5>Search for friends</h5>
               <form action="AddFriend.php" method="POST">
                  <input name="Search" type="text">
                  <input class="btn btn-primary" type="submit" value="Search" class="btn btn-primary" >
               </form>
               <table name="table" class="table table-striped">
                  <tbody name="tablebody">
                     <?php
                        //Search for the Users friends
                        include_once('../PHP/DataBase.php');
                        include_once('../PHP/User.php');
                        $dB = new DataBase();
                        $userfriendsresult = $dB->sqli()->query("SELECT * FROM  `users` WHERE 1");
                         while($row = $userfriendsresult->fetch_assoc())
                        {
                          if(!isset($_POST['Search']))
                          {
                            if(empty($_POST['Search']))
                            {
                              if($_SESSION['username']!=$row['Username'])
                              {
                                 echo "<form  action='AddFriend.php' method='POST'><tr>\n";
                                 echo '<th scope="row">1</th>';
                                 $Myuser = new User();
                                 $Myuser->setUsername($row['Username']);
                                 echo "<td><img name='img' style='width: 40px; height: 40px;' src='{$Myuser->getUserProfilePicture()}' /></td> \n";
                                 echo "<td><input type='text' class='indexInputHidden' readonly='readonly' name='friendusername' value='{$row['Username']}' ></td>\n";
                                 echo '<td><input class="btn btn-primary" type="submit" value="Add" >';
                                 echo "</tr>\n</form>";
                              }
                            }
                          }
                          else if (isset($_POST['Search']))
                          {
                            if(str_contains($row['Username'],$_POST['Search']))
                            {
                              echo "<form  action='AddFriend.php' method='POST'><tr>\n";
                                 echo '<th scope="row">1</th>';
                                 $Myuser = new User();
                                 $Myuser->setUsername($row['Username']);
                                 echo "<td><img name='img' style='width: 40px; height: 40px;' src='{$Myuser->getUserProfilePicture()}' /></td> \n";
                                 echo "<td><input type='text' class='indexInputHidden' readonly='readonly' name='friendusername' value='{$row['Username']}' ></td>\n";
                                 echo '<td><input class="btn btn-primary" type="submit" value="Add" >';
                                 echo "</tr>\n</form>";
                            }
                          }
                          else
                          {
                           echo "<form  action='AddFriend.php' method='POST'><tr>\n";
                                 echo '<th scope="row">1</th>';
                                 $Myuser = new User();
                                 $Myuser->setUsername($row['Username']);
                                 echo "<td><img name='img' style='width: 40px; height: 40px;' src='{$Myuser->getUserProfilePicture()}' /></td> \n";
                                 echo "<td><input type='text' class='indexInputHidden' readonly='readonly' name='friendusername' value='{$row['Username']}' ></td>\n";
                                 echo '<td><input class="btn btn-primary" type="submit" value="Add" >';
                                 echo "</tr>\n</form>";
                          }
                        }
                        addFriend();
                        function addFriend()
                        {
                           //We need to get the userid from the friendusername and save it to our userfriends
                           if(isset($_POST['friendusername']))
                           {
                              $dB = new DataBase();
                              $friendusername = $_POST['friendusername'];
                              $friendidres = $dB->sqli()->query("SELECT user FROM  `users` WHERE Username='{$friendusername}'");
                                 while($row = $friendidres->fetch_assoc())
                              {
                                 $friendid = $row['user'];
                              }
                              $friendidress = $dB->sqli()->query("SELECT user FROM  `users` WHERE Username='{$_SESSION['username']}'");
                                 while($row = $friendidress->fetch_assoc())
                              {
                                 $userid = $row['user'];
                              }
                              echo $userid;
                              $or = $dB->sqli()->query("INSERT INTO `{$friendusername}friends`(`FriendUserid`, `FriendRequest`) VALUES ('{$userid}','1')");
                              $r = $dB->sqli()->query("INSERT INTO `{$_SESSION['username']}friends`(`FriendUserid`, `FriendRequest`) VALUES ('{$friendid}','0')");

                           }
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- To here is the middle of the page -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
   </body>
</html>
