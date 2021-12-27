<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 10</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="card">
    <h1>RESET PASSWORD</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="password" name="password" placeholder="New Password">
      <input type="password" name="confirm" placeholder="Confrim Password"><br>
      <input type="submit" value="Submit" name="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $new_pwd = $_POST["password"];
      $confirm_pwd = $_POST["confirm"];
      if ($new_pwd === $confirm_pwd) {
        session_start();
        $_SESSION["password"] = $new_pwd;
        header('location:index.php');
      }
    }
    ?>
  </div>

</body>

</html>