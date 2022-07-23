<?php 

 class Crud{

     //variables
   public  $host;
   public  $user;
   public  $password_db;
   public  $db;
   public $connection;


   function __construct($host, $user, $password_db, $db)
   {
    $this->host = $host;
    $this->user = $user;
    $this->password_db = $password_db;
    $this->db = $db;

    //start connection
    $this->start_connection();
   }

   private function start_connection(){
      //initialize connection to db
    
      try {
         $this->connection =new mysqli($this->host, $this->user, $this->password_db, $this->db);
        

    } catch (mysqli_sql_exception $e) {
       echo json_encode($e->getMessage());
       echo "connessione al db fallita";
       die;
    }
   }

}






?>