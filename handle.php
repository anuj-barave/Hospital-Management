<?php
session_start();

$user=$_SESSION['username'];
$no = $_SESSION['ID'];

 include('connect.php');

      if(isset($_POST['done']))
    {
       
        $date = $_POST['date'];
        $Speciality = $_POST['exampleRadios'];
        

        $result = mysqli_query($conn,"SELECT D_ID FROM hdoctor where Speciality = '$Speciality'");
      
            if($result)
                {
                  
                    while($rows = mysqli_fetch_assoc($result))
                    {
                   
                   $id=$rows['D_ID'];  

                  }
                }
                $_SESSION['DID']  = $id;  

        $result1 = mysqli_query($conn,"SELECT COUNT(*) AS ct FROM happointment where A_Date = '$date' and D_ID='$id'");
        
        $row1 = mysqli_fetch_assoc($result1); 
        $sum = $row1['ct'];
       
        
        if($sum<20)
        {

          echo"in";
          $result22 = mysqli_query($conn,"SELECT count(*) as amin FROM happointment where A_Date = '$date' and  D_ID='$id' and status='1'");
          $rows = mysqli_fetch_assoc($result22); 
          $idc=$rows['amin'];

          if($idc>0)
          {
            $result23 = mysqli_query($conn,"SELECT min(A_ID) as aidmin FROM happointment where A_Date = '$date' and  D_ID='$id' and status='1'");
            $rows = mysqli_fetch_assoc($result23); 
            $idc1=$rows['aidmin'];
            
            $sql5 =" UPDATE happointment set `P_ID`='$no', `D_ID`=' $id', `A_Date`=' $date', `status`='0' where A_ID='$idc1'";

            $result5= mysqli_query($conn,$sql5);

            if($result5)
            echo"Inserted Successfully";

          }
          else
          {
              $result2 = mysqli_query($conn,"SELECT MAX(A_ID) AS maxid FROM happointment where A_Date = '$date' and  D_ID='$id'");
              if($result2)
              {
              
                
                  while($rows = mysqli_fetch_assoc($result2))
                  {
                
                $id1=$rows['maxid'];  

                }
              
              }
   
              $result3 = mysqli_query($conn,"SELECT A_time FROM happointment where A_ID = '$id1'");
              if($result3)
              {
                
                  while($rows = mysqli_fetch_assoc($result3))
                  {
                
                $id2=$rows['A_time'];  

                }
              
            
                if($sum<1)

                {$timefinal = "8:00:00";
                }
                else
                {
                  $selectedTime = $id2;
                  $endTime = strtotime("+25 minutes", strtotime($selectedTime));
                  $timefinal = date('h:i:s', $endTime);
                
                }
                  
              
          
              
              }
              $sql4 =" INSERT INTO `happointment`(`P_ID`, `D_ID`, `A_Date`, `A_time`) VALUES ('$no',' $id',' $date','$timefinal')";

                    $result4= mysqli_query($conn,$sql4);

                    if($result4)
                    echo"Inserted Successfully";
            }
            }
      }
        else
        {
          echo("Appointment Full Try Diffferent Day");

        }
        

      

                     echo '<script type="text/javascript">
          location.replace("profile.php");
               </script>';
         
        
    
   
  
  

?>