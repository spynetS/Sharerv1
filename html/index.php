<?php

  //echo $_SERVER['REMOTE_ADDR'];

?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/index.css" />
    <title>Log in to sharer</title>
  </head>
  <body>
    <div class="leftPanel" >  
  
      <div class="loginPanel" >

        <h2 class="text" >Log in to Sharer</h2>
        <form class="form" action="../PHP/Login.php" method="POST" >
          <input name="username" type="text" placeholder="Enter Email/Username" class="form-control" >
          <div class="space" ></div>
          
          <input name="password" type="password" placeholder="Enter Password" class="form-control" >
          <div class="space" ></div>
          
          <div class="col">
            <div class="row" >
                <input type="submit" style="border-radius: 5px;" class="btn btn-primary" value="Login" onclick="login()" ></button>
            </div>
            <div class="space" ></div>
            
          </div>
      </form>
      
      <div class="row" > 
        <a class="linker" href="Signup.php" >SignUp</a> 
        <a class="linker" href="#">Forgot password?</a>
      </div>

    </div>  
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
