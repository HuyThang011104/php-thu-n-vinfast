<?php 
class introduceModel extends model{
    public function getListCarASC(){
        $query = $this->getAllraw("SELECT * FROM car ORDER BY name ASC");
        return $query;
    }
}
