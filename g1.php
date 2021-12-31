            <?php
            include('connect.php');
          $result4 = mysqli_query($conn,"SELECT count(*) AS Price4 FROM happointment WHERE D_ID='1'"); 
            $row4 = mysqli_fetch_assoc($result4); 
            $sum4 = $row4['Price4'];
            echo$sum4;
            ?>
            <?php
          $result3 = mysqli_query($conn,"SELECT count(*) AS Price3 FROM happointment WHERE D_ID='2'"); 
            $row3 = mysqli_fetch_assoc($result3); 
            $sum3 = $row3['Price3'];
            ?>
            <?php
          $result2 = mysqli_query($conn,"SELECT count(*) AS Price2 FROM happointment WHERE D_ID='3'"); 
            $row2 = mysqli_fetch_assoc($result2); 
            $sum2 = $row2['Price2'];
            ?>
            <?php
          $result1 = mysqli_query($conn,"SELECT count(*) AS Price1 FROM happointment WHERE D_ID='4'"); 
            $row1 = mysqli_fetch_assoc($result1); 
            $sum1 = $row1['Price1'];
            ?>
            <?php
          $result = mysqli_query($conn,"SELECT count(*) AS Price FROM happointment WHERE D_ID='5'"); 
            $row = mysqli_fetch_assoc($result); 
            $sum = $row['Price'];
            ?>
            
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Specialist', 'Patient Category'],
         
          ['Dermatology',    <?php echo$sum?>],
          
          ['Pediatrician',      <?php echo$sum1?>],
          
          ['Neurology',  <?php echo$sum2?>],
         
          ['Cardiology', <?php echo$sum3?>],
          
          ['General',    <?php echo$sum4?>]
        ]);

        var options = {
          title: 'Monthly Patient Category'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

    <div id="piechart" class='class2' style="width: 600px; height: 400px;"></div>
  </body><?php
            include('connect.php');
            
            $yesterday1 = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-3,date("Y")));
    
            $result1 = mysqli_query($conn,"SELECT count(*) AS Price1 FROM happointment WHERE A_date='$yesterday1'"); 
            $row1 = mysqli_fetch_assoc($result1); 
            $sum1 = $row1['Price1'];
      

            $yesterday2 = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-2,date("Y")));
   
            $result2 = mysqli_query($conn,"SELECT count(*) AS Price2 FROM happointment WHERE A_date='$yesterday2'"); 
            $row2 = mysqli_fetch_assoc($result2); 
            $sum2 = $row2['Price2'];
      

            $yesterday3 = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
    
            $result3 = mysqli_query($conn,"SELECT count(*) AS Price3 FROM happointment WHERE A_date='$yesterday3'"); 
            $row3 = mysqli_fetch_assoc($result3); 
            $sum3 = $row3['Price3'];
     

            $yesterday4 = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d"),date("Y")));
        
            $result4 = mysqli_query($conn,"SELECT count(*) AS Price4 FROM happointment WHERE A_date='$yesterday4'"); 
            $row4 = mysqli_fetch_assoc($result4); 
            $sum4 = $row4['Price4'];
       

?>

<html>
  <head>
  <style>
  .class1{
    border:4px solid black;
    margin-bottom:10px;
    position:relative;
    bottom:435px;
  }
  .class11{
    border:4px solid black;
    margin-bottom:10px;
    position:relative;
    bottom:435px;
    left:50px;
  }
  .class2{
    border:4px solid black;
    margin-bottom:10px;
    position:relative;
    left:700px;
  }
  body{
    background-color:black;
      }
  </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Appointments'],
         
          ['Today',<?php echo$sum4 ?>],
          
          ['yesterday',<?php echo$sum3?>],
          ['2 days ago',<?php echo$sum2?>],
          ['3 days ago',<?php echo$sum1 ?>],
        ]);

        var options = {
          title: 'Appointments',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" class="class1" style="width: 600px; height: 400px"></div>
    <?php
          include('connect.php');
          $Date = date('y/m/d');
          $result1=mysqli_query($conn,"SELECT count(*) AS value_sum1 FROM happointment WHERE A_Date='$Date' And D_ID='1' "); 
          $row1 = mysqli_fetch_assoc($result1); 
          $sum1 = $row1['value_sum1'];
          

        
          $result2=mysqli_query($conn,"SELECT count(*) AS value_sum2 FROM happointment WHERE A_Date='$Date' And D_ID='2' "); 
          $row2 = mysqli_fetch_assoc($result2); 
          $sum2 = $row2['value_sum2'];
         
        
     
          $result3=mysqli_query($conn,"SELECT count(*) AS value_sum3 FROM happointment WHERE A_Date='$Date' And D_ID='3' "); 
          $row3 = mysqli_fetch_assoc($result3); 
          $sum3 = $row3['value_sum3'];
         
         

        
          $result4=mysqli_query($conn,"SELECT count(*) AS value_sum4 FROM happointment WHERE A_Date='$Date' And D_ID='4' "); 
          $row4 = mysqli_fetch_assoc($result4); 
          $sum4 = $row4['value_sum4'];
         
        

          
          $result5=mysqli_query($conn,"SELECT count(*) AS value_sum5 FROM happointment WHERE A_Date='$Date' And D_ID='5' "); 
          $row5 = mysqli_fetch_assoc($result5); 
          $sum5 = $row5['value_sum5'];
         
         

?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["General", <?php echo$sum1;?>],
          ["Cardiology", <?php echo$sum2;?>],
          ["Neurology", <?php echo$sum3;?>],
          ["Pediatrician", <?php echo$sum4;?>],
          ['Dermatology', <?php echo$sum5;?>]
        ]);

        var options = {
          width: 1200,
          legend: { position: 'none' },
          chart: {
            title: 'Appoitments by Doctor',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" class="class11" style="width: 1480px; height: 450px;"></div>
  </body>
  
</html>

</html>