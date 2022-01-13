<?php include "dbcon.php";?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"> 
		setTimeout("document.location = document.location", 3000);
	</script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'EjeX', 'EjeY','EjeZ'],
          <?php
          $query = "SELECT * FROM recibidos";
          $res = mysqli_query($conexion,$query);
          while($data=mysqli_fetch_array($res)){
              $year = $data['hora'];
              $sale = $data['ejex'];
              $expense = $data['ejey'];
              $EjeZ = $data['ejez'];
?>

['<?php echo $year;?>', <?php echo $sale;?>,<?php echo $expense;?>,<?php echo $EjeZ;?>],
              <?php
            }
          ?>
        ]);

        var options = {
          title: 'EjeX EjeY EjeZ',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1300px; height: 390px"></div>
  </body>
</html>

