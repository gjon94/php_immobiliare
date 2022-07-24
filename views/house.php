<?php




if (isset($_GET["house_id"])) {

   include_once(dirname(__FILE__) . "/../php/config/config_connection.php");


   //htmlspecialchars for csx attack   
   $query = htmlspecialchars($_GET["house_id"]);


   $result = $conn->home_info($query);

   if (!$result) {
      echo "non ci sono risultati";
      return;
   }

   $result = $result[0];
}
else{
   header("location: 404.php");
   exit;
}



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
   <?php include_once(dirname(__FILE__) . "/sub-views/nav_bar.php") ?>

   <main class="container">

      <div class="row">

      <!-- house title -->

      <div class="col-12">
         <div class="shadow  mb-5 bg-body rounded p-3">
            <h4>Villa in vendita a <?php echo $result["address"]; ?></h4>
            <hr class="border border-secondary border opacity-50">
            <h4>€ <?php echo $result["price"] ?></h4>
         </div>
      </div>

         <!--- house info -->
         <div class="col-8">
            <!-- house info >> carousel -->

            <div id="carouselExampleIndicators" class="carousel slide shadow  mb-5 bg-body rounded" data-bs-ride="true">
               <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
               </div>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="https://images-1.casa.it/655x483/listing/b218de8cb1fc2f6d5456ce60c6ee3179" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                     <img src="https://images-1.casa.it/655x483/listing/b218de8cb1fc2f6d5456ce60c6ee3179" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                     <img src="https://images-1.casa.it/655x483/listing/b218de8cb1fc2f6d5456ce60c6ee3179" class="d-block w-100" alt="...">
                  </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
               </button>
            </div>

            <!-- house info >> description -->
            <div class="shadow p-3 mb-5 bg-body rounded">
               <h3>Descrizione</h3>
               <p class="fs-6">
                  <?php echo $result["description"]; ?>
               </p>
            </div>

         </div>



         <!-- form contact --->
         <div class="col" >
            <form action=<?php echo "./../php/functions/send_email_for_house.php" ?> class="shadow p-3 mb-5 bg-body rounded" method="POST">
               <input type="text" name="house_id" id="house_id" value="<?php echo $result["home_id"]  ?>">
               
               <div class="mb-3">
                  <label for="floatingSelect">Works with selects</label>
                  <select name="select_value" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                     <option value="0" selected>Richiesta contattatto</option>
                     <option value="1">Maggiori info</option>
                     <option value="2">Richiesta appuntamento</option>
                     
                  </select>
                  
               </div>




               <div class=" mb-3">
                  <label class="form-label" for="floatingTextarea">Comments</label>
                  <textarea style="height: 130px;" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
               </div>

               <div class="mb-3">
                  <label for="name" class="form-label">Nome</label>
                  <input type="text" name="name" class="form-control" id="name">

               </div>

               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email </label>
                  <input type="email" name="email" class="form-control" id="email">

               </div>

               <div class="mb-3">
                  <label for="phone" class="form-label">telefono</label>
                  <input name="phone" type="tel" class="form-control" id="phone">

               </div>


               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>

      </div>

   </main>

   <?php var_dump($result); ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>