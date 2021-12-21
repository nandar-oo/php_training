<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 07</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  $userInput = "";
  session_start();
  if (isset($_SESSION["userInput"])) {
    $userInput = $_SESSION["userInput"];
    session_unset();
  }
  ?>
  <div class="card">
    <h1>QR Code Generator</h1>
    <form action="qrcode.php" method="post">
      <label>Enter your data :</label>
      <input type="text" name="userInput" id="userInput" value="<?= $userInput; ?>" required><br>
      <input type="submit" value="Generate" name="generate">
    </form>
    <?php
    if (isset($_GET["status"])) {
      echo '<img src="tutoqr.png" />';
    }
    ?>
  </div>
</body>

</html>