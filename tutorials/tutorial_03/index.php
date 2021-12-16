<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 03</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      Enter your date of birth:
      <input type="date" name="dob" id="dob" required>
      <input type="submit" value="Calculate age">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $dob = $_POST["dob"];
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today))->format('%y');
      echo 'Your age is ' . $diff;
    }
    ?>
  </div>
</body>

</html>