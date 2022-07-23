<?php 

trait get_homes_by_city{

    
    public function get_homes_by_city($city_id){
        $sql = "SELECT * FROM homes WHERE homes.city_id = ?";

        if($statment = $this->connection->prepare($sql)){

            $statment->bind_param("i",$city_id);

            $statment->execute();
            $result = $statment->get_result();

            echo json_encode($result->fetch_all(MYSQLI_ASSOC));

            $statment->close();

        }else{
            echo "errore";
        }


    }
}






?>