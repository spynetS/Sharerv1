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
      
      include('../PHP/DataBase.php');
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
      
      <div class="middle" style="width: 50%; display:inline-block;margin-top: 20px;" class="btn btn-primary" >  
      <nav class="nav nav-pills nav-fill">
        <a class="nav-link active" aria-current="page" href="#">Friends</a>
        <a class="nav-link" href="AddFriend.php">Add Friend</a>
        <a class="nav-link" href="FriendRequest.php">Requests</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Blocked</a>
      </nav>

        <div>
          <table name="table" class="table table-striped">
              <tbody name="tablebody">
              <?php
              //Search for the users friends
              include_once('../PHP/DataBase.php');
              require_once('../PHP/User.php');

              $dB = new DataBase();
              $userid = getUserId($_SESSION['username']);
              echo $userid;
              $userfriendsresult = $dB->sqli()->query("SELECT * FROM `{$userid}friends` WHERE FriendRequest=0");
              while($row = $userfriendsresult->fetch_assoc())
              {
                  echo '<tr><th scope="row">1</th>';
                  $result = $dB->sqli()->query("SELECT * FROM  `users` WHERE user={$row['FriendUserid']}");
                   while($user = $result->fetch_assoc())
                  {
                      $Myuser = new User();
                      $Myuser->setUsername($user['Username']);
                      echo "<td><img name='img' style='width: 40px; height: 40px;' src='{$Myuser->getUserProfilePicture()}' /></td> \n";
                      echo "<td>{$user['Username']}</td>\n";
                      echo '<form action="Send.php" method="POST" ><td><input type="submit" name="'.$user['Username'].'"class="btn btn-primary" ></button><button class="btn btn-danger" >Remove friend</button></td></tr></form>';
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
