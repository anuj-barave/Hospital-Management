<?php
          include('connect.php');
          $Date = date('y/m/d');
          $result1=mysqli_query($conn,"SELECT count(*) AS value_sum1 FROM happointment WHERE A_Date='$Date' And D_ID='1' "); 
          $row1 = mysqli_fetch_assoc($result1); 
          $sum1 = $row1['value_sum1'];
           echo"sum1";echo$sum1;

        
          $result2=mysqli_query($conn,"SELECT count(*) AS value_sum2 FROM happointment WHERE A_Date='$Date' And D_ID='2' "); 
          $row2 = mysqli_fetch_assoc($result2); 
          $sum2 = $row2['value_sum2'];
          echo"sum2";echo$sum2;
        
     
          $result3=mysqli_query($conn,"SELECT count(*) AS value_sum3 FROM happointment WHERE A_Date='$Date' And D_ID='3' "); 
          $row3 = mysqli_fetch_assoc($result3); 
          $sum3 = $row3['value_sum3'];
          echo"sum3";echo$sum3;
         

        
          $result4=mysqli_query($conn,"SELECT count(*) AS value_sum4 FROM happointment WHERE A_Date='$Date' And D_ID='4' "); 
          $row4 = mysqli_fetch_assoc($result4); 
          $sum4 = $row4['value_sum4'];
          echo"sum4";echo$sum4;
        

          
          $result5=mysqli_query($conn,"SELECT count(*) AS value_sum5 FROM happointment WHERE A_Date='$Date' And D_ID='5' "); 
          $row5 = mysqli_fetch_assoc($result5); 
          $sum5 = $row5['value_sum5'];
          echo"sum1";echo$sum5;
         

?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["King's pawn (e4)", <?php echo$sum1;?>],
          ["Queen's pawn (d4)", <?php echo$sum2;?>],
          ["Knight to King 3 (Nf3)", <?php echo$sum3;?>],
          ["Queen's bishop pawn (c4)", <?php echo$sum4;?>],
          ['Other', <?php echo$sum5;?>]
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <div class="class1" id="top_x_div" style="width: 800px; height: 600px;"></div>
  </body>
</html>
