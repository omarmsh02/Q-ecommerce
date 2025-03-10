<?php
require_once 'models/Model.php';
class Users extends Model
{

    public function __construct()
    {
        parent::__construct('users');

    }
}