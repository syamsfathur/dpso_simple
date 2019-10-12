<?php
include 'koneksi.php';
// $cp_chart = $_POST['cp'];
$fitness_pso = $partikel_pso = "";

if ($cp_to_chart == 0) {
  $fitness_pso = "fitness_pso_0";
  $partikel_pso = "partikel_pso_0";
} elseif ($cp_to_chart == 1) {
  $fitness_pso = "fitness_pso_6";
  $partikel_pso = "partikel_pso_1";
} elseif ($cp_to_chart == 2) {
  $fitness_pso = "fitness_pso_7";
  $partikel_pso = "partikel_pso_2";
} elseif ($cp_to_chart == 3) {
  $fitness_pso = "fitness_pso_8";
  $partikel_pso = "partikel_pso_3";
}
?>

<html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    }).then(function() {
      var data = google.visualization.arrayToDataTable([
        ['iterasi_ke', 'id_partikel', 'fitness'],
        <?php
        $select_pbest_data = "SELECT id_partikel, iterasi_ke, $fitness_pso FROM $partikel_pso WHERE kode='pbest' ORDER BY iterasi_ke";
        $q_select_pbest_data = mysqli_query($koneksi, $select_pbest_data);
        while ($data = mysqli_fetch_array($q_select_pbest_data)) {
          $iterasi = $data['iterasi_ke'];
          // if($iterasi == 0){
          echo "[" . $data['iterasi_ke'] . "," . $data['id_partikel'] . "," . $data[$fitness_pso] . "],";
          // }else{
          //   echo "["
          //     .$data['iterasi_ke']."0".","
          //     .$data['id_partikel'].","
          //     .$data[$fitness_pso].","
          //   ."],";
          // }
        }
        ?>
      ]);

      var view = new google.visualization.DataView(data);

      var aggColumns = [];
      var viewColumns = [{
        calc: function(dt, row) {
          return dt.getValue(row, 0);
        },
        label: data.getColumnLabel(0),
        type: 'number'
      }];

      data.getDistinctValues(1).forEach(function(id_partikel, index) {
        viewColumns.push({
          calc: function(dt, row) {
            if (dt.getValue(row, 1) === id_partikel) {
              return dt.getValue(row, 2);
            }
            return null;
          },
          label: id_partikel,
          type: 'number'
        });

        aggColumns.push({
          aggregation: google.visualization.data.sum,
          column: index + 1,
          label: 'Particle ' + id_partikel,
          type: 'number'
        });
      });

      view.setColumns(viewColumns);

      var aggData = google.visualization.data.group(
        view,
        [0],
        aggColumns
      );

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
      chart.draw(aggData, {
        title: "",
        hAxis: {
          title: 'Iteration',
          format: '',
          ticks: view.getDistinctValues(0),
          titleTextStyle: {
            color: '#000',
            fontSize: 15,
            fontName: 'Arial',
            bold: true,
            italic: false
          }
        },
        vAxis: {
          title: 'Fitness Value',
          titleTextStyle: {
            color: '#000',
            fontSize: 15,
            fontName: 'Arial',
            bold: true,
            italic: false
          }
        },
      });
    });
  </script>
</head>

<body>
  <div id="curve_chart" style="width: 900px; height: 900px"></div>
</body>

</html>