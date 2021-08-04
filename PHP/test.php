<?php
            require_once('../PHP/DataBase.php');
            $dbb = new DataBase();                      
            // Get image data from database 

            $result = $dbb->sqli()->query("SELECT ProfilePicture FROM `users` WHERE Username='spy'"); 
            //
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                echo "data:image/jpg;charset=utf8;base64,".base64_encode($row['ProfilePicture']);
                $i++;
            }
            if($i<=0)
            echo "../Resorces/Images/HappyPeople.png";
            