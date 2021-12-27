<?php
require_once 'config.php';
$sql = "SELECT student_name, age FROM students;";
$result = $conn->query($sql);
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
$sql = "SELECT count(*) as total, age FROM students GROUP BY age;";

$result = $conn->query($sql);
$data2 = array();
foreach ($result as $row) {
  $data2[] = $row;
}
$conn->close();

echo "<script>var data=" . json_encode($data) . ";</script>";
echo "<script>var data2=" . json_encode($data2) . ";</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 9</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/libraries/chart.min.js"></script>
  <script src="js/libraries/jquery-3.6.0.min.js"></script>
  <script src="js/myChart.js"></script>
</head>

<body>
  <?php
    session_start();
    $status = $_SESSION["login_status"];
    if (!$status){
      header('location:../tutorial_10/index.php');
    }
  ?>
  <div id="container">
    <a href="../tutorial_08/index.php" class="btn">Back</a>
    <h1>Age of Students</h1>
    <canvas id="graphCanvas"></canvas>
  </div>
  <div id="container2">
    <h1>Number of Students By Age</h1>
    <canvas id="graphCanvas2"></canvas>
    <p>The pie chart shows number of students grouped by age</p><br>
  </div>
</body>

</html>