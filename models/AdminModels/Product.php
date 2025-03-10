<?php

require_once 'models/Model.php';
class Product extends Model
{

    public function __construct()
    {
        parent::__construct('products');

    }


}