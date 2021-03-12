<?php
namespace App;

class Dashboard extends Controller{
    public function __construct($router){
        $this->router = $router;
    }

    public function home(){
        parent::render("dashboard");
    }
}