<?php

session_start();
include_once 'connect.php';

if(isset($_POST['Remove_Item']))
{
$item = $_POST['Remove_Item'];
$itemname = $_POST['Item'];
$id = $_SESSION['ID'];
echo$itemname;

        $sql ="UPDATE happointment set status='1' WHERE A_ID='$itemname'";
       
       
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">alert("Record Deleted")</script>';  
          }
        else {
            echo '<script type="text/javascript">alert("Error Occured to Delete the Record")</script>';  
          }
          echo '<script type="text/javascript">
          location.replace("home1.php");
           </script>';        
}
        else
        {
          echo '<script type="text/javascript">alert("Incorrect Password !")</script>';  
        }    
    

?>