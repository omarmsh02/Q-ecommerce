<?php
require_once 'models/Model.php';

Class Order_Item extends Model{
    public function __construct()
    {
        parent::__construct('order_items');
    }
}
?>