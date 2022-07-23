<?php
$error_mess = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once(dirname(__FILE__) . "/../php/config/config_connection.php");

  //return false if login failed else this function header to home.php
  if (!$conn->login_trait()) {
    ///css error
    $error_class = "is-invalid";
    $error_mess = "credenziali sbagliate";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
  <?php include_once(dirname(__FILE__) ."/sub-views/nav_bar.php") ?>
  
  <main class="container">
    <?php include_once(dirname(__FILE__) . "/sub-views/login_form.php"); ?>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>