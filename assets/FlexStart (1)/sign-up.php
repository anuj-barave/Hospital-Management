
<?php
    
  include('connect.php');


      if(isset($_POST['LOGIN']))
    {
      $Fullname = $_POST['Fullname'];
      $username= $_POST['username'];
      $Phone= $_POST['Phone'];
      $Email= $_POST['Email'];
      $Password= $_POST['Password'];
      $cpassword =$_POST['cpassword'];
       $code = rand(999999, 111111);


            if($_POST['Password'] == $_POST['cpassword'])      
              {
                $sql ="INSERT INTO userdetails (Fullname ,username,Phone,Email,Password,code) VALUES ('$Fullname','$username','$Phone','$Email','$Password','$code');";

               $query= mysqli_query($conn,$sql);
              }
              else
              {
                echo '<script type="text/javascript">alert("Incorrect Password !")</script>';  
              }
              

              if($query)
              {
                echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';  
              }
              else
              {

              echo '<script type="text/javascript">alert("This User Already exists.. Please try another credentials!")</script>';
              }
    
          

        
}
  
  