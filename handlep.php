<?php
    
  include('connect.php');
  session_start();

  if(isset($_POST['Prescribe']))
  {
  $aid= $_POST['Item'];
  }

 
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
<br><br>

</div>

</header><!-- End Header -->
    <br>


<?php
 
  include('connect.php');



  $sql = "SELECT * FROM `hprescription` where AID='$aid'";
  $result = mysqli_query($conn,$sql)
?>
<br>

<h2 data-aos="fade-up">Appointments</h2>
<table>

-<table class="table table-dark table-striped">
<thead>
<tr>
<th scope="col">Symptoms</th>
<th scope="col">Diagnose</th>
<th scope="col">Medications</th>
<th scope="col">Instructions</th>

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
<td><?php echo $rows['Symptoms']; ?></td>
<td><?php echo $rows['Diagnosis']; ?></td>
<td><?php echo $rows['Medications']; ?></td>
<td><?php echo $rows['Instruction']; ?></td>
<td>
</tr> 
</tbody>
 
<?php
}
?>
</table>

</section>
</body>
</html>