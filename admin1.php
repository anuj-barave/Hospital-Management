<?php
            session_start();
            include('connect.php');
           
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
            .btn {
    display: inline-block;
    vertical-align: baseline;
    padding: 16px 28px;
    border-color: transparent;
    border-radius: 8px;
    font-family: "Nunito", sans-serif;
    font-weight: 650;
    text-decoration: none;
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    -webkit-transition: all 200ms ease-in;
    transition: all 200ms ease-in
}

.btn_primary {
    border: none;
    background-image: -webkit-linear-gradient(248.16deg, #4DD4FF -32.14%, #A041FF 113.57%);
    background-image: linear-gradient(201.84deg, #4DD4FF -32.14%, #A041FF 113.57%);
    color: #ffffff
}

.btn_primary:hover {
    color: #ffffff;
    opacity: 0.8;
    -webkit-box-shadow: 0 0 20px 7px rgba(151, 156, 255, 0.44);
    box-shadow: 0 0 20px 7px rgba(151, 156, 255, 0.44)
}

.btn--full {
    min-width: 250px;
    padding: 15px 42px;
    font-size: 20px;
    color: #ffffff;
    line-height: 1.4;
    text-transform: none;
    -webkit-transition: all 200ms ease-in;
    transition: all 200ms ease-in
}
#btnp{
  position:relative;
  left:300px;
  top:5px;
}
#h21{
  margin-top:50px;
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
      <form action="g1.php">
      <button class="btn btn_primary"id="btnp" type="submit" name="LOGIN">Reports</button>
      </form>
      <br><br>




    </div>

  </header><!-- End Header -->
              <br>
         

<?php
           
            include('connect.php');

          

            $sql = "SELECT * FROM `happointment`";
            $result = mysqli_query($conn,$sql)
?>
<br>

<h2 data-aos="fade-up" id="h21">Appointments</h2>
  <table>

  -<table class="table table-dark table-striped">
  <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Patient_id</th>
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
      <td><?php echo $rows['P_ID']; ?></td>
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