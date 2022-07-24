<?php 

trait province_list{
    public function province_list(){
        $sql = "SELECT * FROM provinces";
        $result = $this->connection->query($sql);

       return $result;

    }
}




?>