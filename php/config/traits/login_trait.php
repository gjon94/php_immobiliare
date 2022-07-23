<?php


trait login_trait{
    public function login_trait(){
     
      
        if($_SERVER["REQUEST_METHOD"]==="POST"){
       
          $email = $_POST['email'];
          $password = $_POST['password'];
          

          $sql = "SELECT * FROM users WHERE email = ?";

          if($statment = $this->connection->prepare($sql)){

            $statment->bind_param("s",$email);

            $statment->execute();
            $result = $statment->get_result();
            

            if($result->num_rows == 1){
              $result= $result->fetch_array(MYSQLI_ASSOC);
             
              if($result["password"] === $password){
                session_start();

                $_SESSION["logged"] = true;
                $_SESSION["name"] = $result["name"];
                $_SESSION["type_user"] = $result["type_user"];
                
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../home.php';
                header('Location: ' . $home_url);

              }else{
                return false;
              }


            }

            



          }else{
            return false;

          }



     }



    }
}


?>