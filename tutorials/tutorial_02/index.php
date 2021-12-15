<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 02</title>
</head>

<body>
    <?php
    $n = 6;
    for ($row = 1; $row <= $n; $row++) {
        for ($col = 1; $col <= $n - $row; $col++) {
            echo "&nbsp;&nbsp;";
        }
        $num = (2 * $row) - 1;
        for ($k = 1; $k <= $num; $k++) {
            echo "*";
        }
        echo "<br>";
    }

    for ($row = $n - 1; $row >= 1; $row--) {
        for ($col = 1; $col <= $n - $row; $col++) {
            echo "&nbsp;&nbsp;";
        }
        $num = (2 * $row) - 1;
        for ($k = 1; $k <= $num; $k++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>
</body>

</html>