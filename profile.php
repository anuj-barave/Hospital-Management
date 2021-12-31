<?php
            session_start();
            include('connect.php');
            $id = $_SESSION['ID'];
            echo$id;

          $name = $_SESSION['username'];
 ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
              <!-- Favicons -->
            <link href="assets1/img/favicon.png" rel="icon">
            <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

            <!-- Vendor CSS Files -->
            <link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
            <link href="assets1/vendor/aos/aos.css" rel="stylesheet">
            <link href="assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
            <link href="assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
            <link href="assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

            <!-- Template Main CSS File -->
            <link href="assets1/css/style.css" rel="stylesheet">
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <style>
            .conta{
              height:240px;
              width:600px;
              border:5px solid black;
            }
            .prfile{
              margin:10px;
              text-decoration:none;
              list-style-type: none;
              
              width:400px;
              height:35px;
              padding:5px;
              font-weight:bold;
              font-size:1.2rem;
            
            }
            .prfile1{
              margin:10px;
              text-decoration:none;
              list-style-type: none;
              font-size:1.2rem;
              width:100px;
              height:35px;
              padding:5px;
              font-weight:bold;
            }
            body{
              background-color:#4caf504f;
            }
            </style>
          </head>
          <body>
          <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <style>#header{
        background-color: #ffffff;
      } </style>
      <a href="index.html" class="logo d-flex align-items-center">
     
        <span>HEALTH CARE</span>
        <h4>Hospitals</h4>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto " href="home1.php">Home</a></li>
        </ul>
        </nav>




    </div>

  </header><!-- End Header -->
              <br>
              <br>
         
<?php
         
      
                $sql = "SELECT * FROM hpatient where username = '$name'";
                $result = mysqli_query($conn,$sql);
               
?>
<br>
<section id="hero" class="hero d-flex  flex-column align-items-center">
<h2 data-aos="fade-up">My Info</h2>
  
<?php
  while($rows = mysqli_fetch_assoc($result))
{
  
?>
<div class="conta">
      <ol class="list-group list-group-horizontal">
      <li class="prfile1">Name</li>
      <li class="prfile">: <?php echo $rows['Name']; ?></li>
      </ol>
        </ul>
        </ul>
        <ul class="list-group list-group-horizontal">
      <li class="prfile1">Address</li>
      <li class="prfile">: <?php echo $rows['Address']; ?></li>

        </ul>
        <ul class="list-group list-group-horizontal">
      <li class="prfile1">username</li>
      <li class="prfile">: <?php echo $rows['username']; ?></li>

        </ul>
        </ul>
        <ul class="list-group list-group-horizontal">
      <li class="prfile1">Phno</li>
      <li class="prfile">: <?php echo $rows['Phno']; ?></li>

        </ul>
        </div>  

    <?php
}
?>
<?php
           
            include('connect.php');

          $name = $_SESSION['username'];
          $id = $_SESSION['ID'];
          echo$id;

            $sql = "SELECT * FROM `happointment` Where P_ID='$id'";
            $result = mysqli_query($conn,$sql)
?>
<br>

<h2 data-aos="fade-up">My Reservation</h2>
  <table>

  -<table class="table table-dark table-striped">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Doctor_id</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php
while($rows = mysqli_fetch_assoc($result))
{ 
  
?> 

<tbody class="table table-dark table-striped">
    <tr>
      <td><?php echo $rows['A_ID']; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $rows['D_ID']; ?></td>
      <td><?php echo $rows['A_Date']; ?></td>
      <td><?php echo $rows['A_time']; ?></td>
    
      <td>
      <form action='handlep.php' method='POST'>
          <button name='Prescribe' class='btn btm-sm btn-outline-danger'>Details</buttton>
          <input type='hidden' name='Item' value='<?php echo $rows['A_ID'];?>'>
      </form>
      </td>
      <td>
      <form action='reservehandle.php' method='POST'>
          <button name='Remove_Item' class='btn btm-sm btn-outline-danger'>REMOVE</buttton>
          <input type='hidden' name='Item' value='<?php echo $rows['A_ID'];?>'>
      </form>
      </td>
    </tr> 
    </tbody>
           
<?php
}
?>
</table>

</section>
</body>
</html>