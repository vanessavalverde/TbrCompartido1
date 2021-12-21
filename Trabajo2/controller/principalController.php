<?php

class principalController{
    
    private $model;
    
    public function __CONSTRUCT(){
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/principal.php';
    }
}