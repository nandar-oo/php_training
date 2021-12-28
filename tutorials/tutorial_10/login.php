<?php
$password = "root";
session_start();
if (isset($_SESSION["password"])) {
  $password = $_SESSION["password"];
}
$email = "user@gmail.com"; //default user

$user_email = $_POST["email"];
$user_password = $_POST["password"];
if ($email == $user_email && $password == $user_password) {
  $_SESSION["login_status"] = true;
  header('location:../tutorial_08/index.php');
} else {
  header('location:index.php?fail=1');
}
