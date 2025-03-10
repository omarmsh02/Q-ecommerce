<?php

require_once 'models/Model.php';
class Home extends Model
{

    public function __construct()
    {
        parent::__construct('products');

    }


}