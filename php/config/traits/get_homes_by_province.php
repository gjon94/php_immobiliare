<?php

trait get_homes_by_province{

public function get_homes_by_province($province_code){
    
    $sql = " SELECT homes.city_id, cities.province_code, provinces.province_code, provinces.name
    FROM homes
    INNER JOIN cities
    ON homes.city_id = cities.city_id
    INNER JOIN provinces
    ON cities.province_code = provinces.province_code
    HAVING provinces.province_code = ?";

   if($statment = $this->connection->prepare($sql)){

    $statment->bind_param("s",$province_code);

    
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