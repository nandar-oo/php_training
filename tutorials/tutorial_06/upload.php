<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["folder"] = $_POST["folder"];
}
$target_dir = $_POST["folder"];

$target_file = $target_dir . "/" . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$message = "";

if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if ($check !== false) {
    $message .= "File is an image - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    $message .= "File is not an image.<br>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $message .= "Your file already exists.";
  $uploadOk = 0;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  $message .= "Only JPG, JPEG, PNG and GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $message .= "Sorry, your file was not uploaded.";
  header('location:index.php?status=0&message=' . $message);
} else {
  //create folder
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }
  move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
  $message .= "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded in <i>" . $target_dir . "</i> folder.";
  header('location:index.php?status=1&message=' . $message);
}
