<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  include('libraries/phpqrcode/qrlib.php');
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
    
      ob_start("callback");

      // here DB request or some processing
      $codeText = $id;

      // end of processing here
      $debugLog = ob_get_contents();
      ob_end_clean();

      // outputs image directly into browser, as PNG stream
      QRcode::png($codeText,"C:/Apache24/htdocs/php_basic/tuto_qrcode/tutoqr.png",QR_ECLEVEL_H,15);
  
  }
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    Enter id of QR code:<br>
    <input type="text" name="id">
    <input type="submit" value="Generate">
  </form>
  <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo '<img src="tutoqr.png" />';
    }
    
  ?>
</body>

</html>