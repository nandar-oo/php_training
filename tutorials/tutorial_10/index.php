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
    <h1>LOGIN</h1>
    <form action="login.php" method="post">
      <?php
      if (isset($_GET["fail"])) {
        echo "<small class='error'>*Wrong password!</small><br>";
      }
      ?>
      <input type="email" name="email" id="email" placeholder="Enter your email" required>
      <input type="password" name="password" id="password" placeholder="Enter your password" required><br>
      <input type="submit" value="Login" name="login">
    </form>
    <a href="forget_pwd.php">Reset Password</a>
  </div>
</body>

</html>