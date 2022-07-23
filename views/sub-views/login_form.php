<form class="row g-3 flex-md-column" method="POST" action="./login.php">

<div class="col-12 col-md-6 mx-auto">
    <h5 class="text-danger"><?php echo $error_mess; ?></h5>
</div>
    <div class="col-12 col-md-6 mx-auto">
        <label for="email" class="form-label">email</label>
        <input type="text" name="email" class="form-control <?php echo $error_class; ?>" id="email" placeholder="Email"  required>
        
    </div>
    <div class="col-12 col-md-6 mx-auto">
        <label for="password" class="form-label">password</label>
        <input type="text" name="password" class="form-control <?php echo $error_class; ?>" id="password" placeholder="password" required>
       
    </div>
   
    <div class="col-10 col-md-6 mx-auto d-grid ">
        <button class="btn btn-primary " type="submit">invia</button>
    </div>
</form>