<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Virtual Restaurant- Index</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <style>#header{
        background-color: #ffffff;
      } </style>
      <a href="index.html" class="logo d-flex align-items-center">
     <img src="" alt="" >
        <span>VR</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html  ">Home</a></li>
          <li><a class="nav-link scrollto" href="">Reservation</a></li>
          <li><a class="nav-link scrollto" href="">Order</a></li>
          <li><a class="nav-link scrollto" href="">Contact</a></li>
          <li><a class="nav-link scrollto" href="about.html"> About Us</a></li>
          

          <li class="dropdown"><a href="#"><span>Menu </span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
              <li><a href="#"> Starter</a>
                  <li><a href="#">Veg </a></li>
                  <li><a href="#">Non veg</a></li>
                 
              </li>
            
            </ul>
          </li> 
          
          
        </ul>
       
      </nav><!-- .navbar -->


    </div>

  </header><!-- End Header -->
 <section id="hero" class="hero d-flex align-items-center">
  <table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
</tr>
<?php
include('connect.php');

$sql = "SELECT  Fullname,username FROM userdetails ";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{

      while($row = $result->fetch_assoc()) 
      {
        echo "</td><td>" . $row["Fullname"] . "</td><td>". $row["username"]. "</td></tr>";
      }
  
    
    echo "</table>";
} 

else 
{
   echo "0 results";
 }

?>
</table>
 </section>









  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
       
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
             
              <span>VR</span>
            </a>
            <p>This Project Ddesigned By Group 15 .</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Reservation</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Parcel Order</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Customer servieces</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Quality Food</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
           
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
     
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Group 15</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  

</body>

</html>



