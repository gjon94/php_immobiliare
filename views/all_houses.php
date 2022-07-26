<?php



include_once(dirname(__FILE__) . "/../php/config/config_connection.php");

$query = htmlspecialchars($_GET["province_code"]);

$result = $conn->get_homes_by_province($query);



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
   
    <header> <?php include_once(dirname(__FILE__) . "/sub-views/nav_bar.php") ?></header>

    <main class="container">
        <div class="container">


            <!---->

            <?php
            if ($result) {

                for ($i = 0; $i < count($result); $i++) {
                    # code...
            ?>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img style="object-fit: cover;" src="https://thumbs.dreamstime.com/z/evening-view-modern-house-swimming-pool-133999986.jpg" class="img-fluid rounded-start h-100 w-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text"><?= $result[$i]["description"]; ?></p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>


            <?php }
            } else {
                echo "non ci sono risultati per $query";
            } ?>
            <!---->



        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>