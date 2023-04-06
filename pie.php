<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());}

$sql = "SELECT * FROM pizza";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array(
        array('Pizza', 'Slices')
    );

    while($row = $result->fetch_assoc()) {
        $data[] = array('치즈', (int)$row['치즈']);
        $data[] = array('파인애플', (int)$row['파인애플']);
        $data[] = array('페퍼로니', (int)$row['페퍼로니']);
        $data[] = array('고구마', (int)$row['고구마']);
        $data[] = array('포테이토', (int)$row['포테이토']);
    }

    $jsonData = json_encode($data);

    // 파이차트
    echo '<html>
            <head>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load("current", {"packages":["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable(' . $jsonData . ');

                  var options = {
                    title: "Pizza",
                    pieHole: 0.4,
                  };

                  var chart = new google.visualization.PieChart(document.getElementById("piechart"));
                  chart.draw(data, options);
                  
                  //차트 페이지 새로고침
                  setInterval(function() {
                    location.reload();
                  }, 10000);
                }
              </script>
            </head>
            <body>
              <div id="piechart" style="width: 900px; height: 500px;"></div>
            </body>
          </html>';

} else {
    echo "0 results";
}


$conn->close();
?>
