<?php

session_start();
include_once(dirname(__FILE__)."/php/config/config_connection.php");
$result = $conn->province_list();



?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

  <?php include_once(dirname(__FILE__) . "/views/sub-views/nav_bar.php") ?>
  <main class="container">
    <h1>home</h1>

    <!-- ///form ridirect province hoese -->
    <form action="">
      <div class="mb-3">
        <label for="floatingSelect">Works with selects</label>
        <select name="select_value" class="form-select" id="floatingSelect" aria-label="Floating label select example" 
        onchange="this.options[this.selectedIndex].value && (window.location = './views/all_houses.php?province_code='+this.options[this.selectedIndex].value);">
          <option value="">Seleziona</option>
          <?php 
          while($row = $result->fetch_assoc()) {
            echo "<option value=$row[province_code]>$row[name]</option>";
          }
          ?>
        </select>

        
      </div>

    </form>

  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>