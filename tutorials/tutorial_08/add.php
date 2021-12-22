<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 8</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  require_once 'config.php';
  $major_err = "";
  $name = "";
  $age = null;
  $email = "";
  $phone = null;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $major = $_POST["major"];
    if ($major == "0") {
      $major_err = "*Please choose major!";
    } else {
      $stmt = $conn->prepare("INSERT INTO students (student_name,age,email,phone_number,major) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sisis", $n, $a, $e, $p, $m);
      $n = $name;
      $a = $age;
      $e = $email;
      $p = $phone;
      $m = $major;
      $stmt->execute();
      header("location:index.php");
    }
  }
  ?>
  <div class="card">
    <h1>Student Information</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter your name" required>
      <input type="number" name="age" id="age" value="<?php echo $age; ?>" placeholder="Enter your age" required>
      <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
      <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="Enter your phone number: eg. 09xxxxxxxxx" required>
      <select name="major" id="major">
        <option value="0">Choose major</option>
        <option value="1">CS</option>
        <option value="2">CT</option>
      </select>
      <p class="error"><?php echo $major_err; ?></p><br>
      <a href="index.php" class="btn">Cancel</a>
      <input type="submit" value="Add" name="submit">
    </form>
  </div>

</body>

</html>