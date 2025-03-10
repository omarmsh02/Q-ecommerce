<?php

require_once 'models/Model.php';
class Order extends Model
{

    public function __construct()
    {
        parent::__construct('orders');

    }
    public function getlastorder(){
        $query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}