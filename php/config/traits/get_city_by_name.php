<?php

trait get_city_by_name{

    ///-->FETCH CITY NAME
    public function get_city_by_name($query_parameter){

        $sql = "SELECT * FROM cities WHERE cities.name LIKE ?";

        if($statment = $this->connection->prepare($sql)){
            
            $statment ->bind_param("s", $query_parameter);

            $query_parameter.="%";

            $statment->execute();

            
            $result = $statment->get_result();


             echo json_encode($result->fetch_all(MYSQLI_ASSOC));

             $statment->close();
        }else{
            echo "erroreeeee";
        }
       
    }

    

}

?>