<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 4</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  session_start();
  $_SESSION["name"] = $_POST["name"];
  $_SESSION["password"] = $_POST["password"];
  ?>
  <div class="card">
    <h1>Welcome <?php echo $_POST["name"]; ?></h1>
    <a href="logout.php"><button>Logout</button></a>
  </div>

</body>

</html>