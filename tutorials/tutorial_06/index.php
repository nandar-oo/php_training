<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 06</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  session_start();
  $folder = "";

  if (isset($_SESSION["folder"]) || isset($_SESSION["photo"])) {
    $folder = $_SESSION["folder"];
    session_unset();
  }
  ?>
  <div class="card">
    <h1>Image Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label>Choose Image:</label>
      <input type="file" name="photo" id="photo" required>
      <input type="text" name="folder" id="folder" placeholder="Folder" value="<?php echo $folder; ?>" required><br>
      <input type="submit" value="Save" name="submit">
    </form>
    <?php
    if (isset($_GET["status"])) {
      if ($_GET["status"] == 0) {
        echo "<div class='error'>" . $_GET["message"] . "</div>";
      } elseif ($_GET["status"] == 1) {
        echo "<div class='success'>" . $_GET["message"] . "</div>";
      }
    }
    ?>
  </div>
</body>

</html>