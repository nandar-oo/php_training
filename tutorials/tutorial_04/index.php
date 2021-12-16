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
  <div class="card">
    <h1 class="login">Login</h1>
    <?php 
      if (isset($_GET["fail"])){
        echo "<small style='color:red;'>*Invalid email or password!</small>";
      }
    ?>
    <form action="home.php" method="post">
      <table>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" id="email" required></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password" required></td>
        </tr>
      </table>         
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>