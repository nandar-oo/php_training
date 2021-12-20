<?php
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 5</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <?php
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    echo "<h2>Content of Text file</h2>";
    $myTxt = fopen("sample.txt", "r") or die("Unable to open file!");
    echo fread($myTxt, filesize("sample.txt"));
    fclose($myTxt);

    echo "<h2>Content of Excel file</h2>";
    $spreadsheet = $reader->load("sample.xlsx");
    $data = $spreadsheet->getSheet(0)->toArray();

    echo "<table><tr>";
    foreach ($data[0] as $item) {
      echo "<th>$item</th>";
    }
    echo "</tr>";
    unset($data[0]);
    foreach ($data as $item) {
      echo "<tr>";
      foreach ($item as $col) {
        echo "<td>$col</td>";
      }
      echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Content of CSV file</h2>";
    $myCsv = fopen("sample.csv", "r");
    $row = fgets($myCsv);
    $token = strtok($row, ",");
    echo "<table><tr>";
    while ($token == true) {
      echo "<th>$token</th>";
      $token = strtok(",");
    }
    echo "</tr>";
    $i = 0;
    while (!feof($myCsv)) {
      echo "<tr>";
      if ($i == 0) {
      } else {
        $row = fgets($myCsv);
        $token = strtok($row, ",");
        while ($token == true) {
          echo "<td>$token</td>";
          $token = strtok(",");
        }
      }
      echo "</tr>";
      $i++;
    }
    echo "</table>";
    fclose($myCsv);

    echo "<h2>Content of Doc file</h2>";
    $myDoc = fopen("sample.doc", "r") or die("Unable to open file!");
    echo fread($myDoc, filesize("sample.doc"));
    fclose($myDoc);
    ?>
  </div>
</body>

</html>