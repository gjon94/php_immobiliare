<?php 



trait home_info{

    public function home_info($home_id){

        $sql = "SELECT * FROM homes WHERE homes.home_id = ?";

        if($statment = $this->connection->prepare($sql)){

            $statment->bind_param("i",$home_id);
            $statment->execute();
            $result = $statment->get_result();

            $statment->close();
            
            return $result = $result->fetch_all(MYSQLI_ASSOC);

            
            
            
            
            
        }else{
            echo "errorrrr";
            return false;
        }

    }
}






?>