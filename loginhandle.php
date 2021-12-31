<?php
{
    session_start();
    include("connect.php");
    $user=$_SESSION['username'];
    
     
    $result = mysqli_query($conn,"SELECT MAX(Loginid) as LID FROM logindetails where username = '$user'");
      
            if($result)
                {
                   
                    while($rows = mysqli_fetch_assoc($result))
                    {
                   
                   $id=$rows['LID'];  

                  }
                }
                $_SESSION['LID']  = $id;       
                

                $result1 = mysqli_query($conn,"SELECT ID FROM hpatient where username = '$user'");
      
                if($result1)
                    {
                       
                        while($row = mysqli_fetch_assoc($result1))
                        {
                       
                       $id=$row['ID'];  
    
                      }
                    }
                    $_SESSION['ID']  = $id;    
    echo$_SESSION['ID'];


    echo '<script type="text/javascript">
    location.replace("home1.php");
        </script>';

     
}