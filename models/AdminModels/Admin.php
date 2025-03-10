<?php

require_once 'models/Model.php';
class Admin extends Model
{

    public function __construct()
    {
        parent::__construct('admins');

    }


}